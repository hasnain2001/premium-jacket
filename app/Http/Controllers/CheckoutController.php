<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Categories;
use Stripe;
use Stripe\Charge;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class CheckoutController extends Controller
{


public function index()
{
    $cartItems = [];
    $genders = Gender::all();
    $categoriesByGender = [];

    // Fetch categories by gender
    foreach ($genders as $gender) {
        $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
    }

    if (Auth::check()) {
        // Logged-in user: Fetch cart items from the database
        $cartItems = Cart::where('user_id', Auth::id())->get();
    } else {
        // Guest user: Fetch cart items from the session
        $cartSession = session()->get('cart', []);
        foreach ($cartSession as $cartData) {
            $product = Product::find($cartData['product_id']); // Fetch product details
            if ($product) {
                $cartItems[] = (object)[
                    'product' => $product,
                                     'quantity' => $cartData['quantity'],
                    'size' => $cartData['size'],
                    'color' => $cartData['color'],
                ];
            }
        }
    }

    // Calculate subtotal and total
    $subtotal = collect($cartItems)->sum(function($cartItem) {
        return $cartItem->product->price * $cartItem->quantity;
    });
    $total = $subtotal;

    return view('checkout', compact('cartItems', 'subtotal', 'total', 'genders', 'categoriesByGender'));
}



public function store(Request $request)
{

   
    Log::info('Checkout Request Data: ', $request->all());

    $request->validate([
        'email' => 'required|email',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'zip' => 'required|string',
        'phone' => 'required|string|max:15',
        'country' => 'required|string',
        'items' => 'required|array',
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.price' => 'required|numeric',
        'items.*.quantity' => 'required|integer|min:1',
    ]);

    DB::beginTransaction();

    try {
        $totalAmount = collect($request->items)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $paymentOption = $request->payment_method;

        $order = Order::create([
            'order_number' => uniqid('Order-'),
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'phone' => $request->phone,
            'country' => $request->country,
            'shipping_option' => $request->shipping_option,
            'payment_option' => $paymentOption,
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            $product = Product::find($item['product_id']);
            if ($product && $product->quantity >= $item['quantity']) {
                $product->decrement('quantity', $item['quantity']);
            } else {
                throw new \Exception('Insufficient quantity for product: ' . $product->name);
            }
        }
        if ($paymentOption === 'paypal') {
            return $this->processPayPalPayment($order, $totalAmount);
        } elseif ($paymentOption === 'stripe') {
            return $this->processStripePayment($request, $order, $totalAmount, $request->stripeToken);

        }
       

        DB::commit();
        $this->clearCart($request);
        return redirect()->route('checkout.success', ['order_number' => $order->order_number])
            ->with('message', 'Your order has been processed successfully.');

    } catch (\Exception $e) {
        DB::rollback();
        Log::error('Order Processing Error: ' . $e->getMessage());
        $order->update(['payment_option' => 'pending']);
        return back()->withErrors(['error' => 'There was an error processing your order: ' . $e->getMessage()]);
    }
}

// Separate method for PayPal payment processing
public function processPayPalPayment($order, $totalAmount)
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->getAccessToken();

    $orderData = [
        "intent" => "CAPTURE",
        "purchase_units" => [
            [
                "amount" => [
                    "currency_code" => "USD",
                    "value" => $totalAmount,
                ],
                "description" => "Order #" . $order->order_number,
            ]
        ],
        "application_context" => [
            "return_url" => route('checkout'),
            "cancel_url" => route('checkout.cancel')
        ]
    ];

    try {
        $response = $provider->createOrder($orderData);

        if (isset($response['links'][1]['href'])) {
            return redirect($response['links'][1]['href']);
        }

        throw new \Exception('Error creating PayPal order.');

    } catch (\Exception $e) {
        Log::error('PayPal Payment Error: ' . $e->getMessage());
        $order->update(['payment_option' => 'pending']);
        return back()->withErrors(['error' => 'Payment error: ' . $e->getMessage()]);
    }
}

public function processStripePayment($order, $totalAmount, $stripeToken)
{
    try {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = \Stripe\Charge::create([
            "amount" => 100 * 100,
            'currency' => 'usd',
            'description' => "Order #" . $order->order_number,
            'source' => $stripeToken, // Ensure this is valid
        ]);

        // If the charge is successful
        Session::flash('success', 'Payment successful!');
        return redirect()->route('checkout.success', ['order_number' => $order->order_number])
            ->with('success', 'Payment successful!');

    } catch (\Stripe\Exception\CardException $e) {
        // Handle card errors
        Log::error('Stripe Card Exception: ' . $e->getMessage());
        Session::flash('error', 'Card error: ' . $e->getMessage());
        return redirect()->route('checkout')->with('error', 'Payment failed: ' . $e->getMessage());

    } catch (\Exception $e) {
        // Handle other errors
        Log::error('Stripe Exception: ' . $e->getMessage());
        Session::flash('error', 'Payment processing failed: ' . $e->getMessage());
        return redirect()->route('checkout')->with('error', 'Payment processing failed: ' . $e->getMessage());
    }
}






   private function clearCart(Request $request)
   {
       // Check if the user is authenticated
       if (Auth::check()) {
           // Clear cart items from the database for logged-in users
           Cart::where('user_id', Auth::id())->delete();
       } else {
           // Clear session cart for guest users
           if (session()->has('cart')) {
               session()->forget('cart'); // Remove the cart from the session
               Log::info('Session cart cleared for guest user.'); // Log for debugging
           } else {
               Log::info('No session cart found for guest user.'); // Log if cart was already empty
           }
       }
   }
   
   


public function showSuccess($order_number)
{
    // Retrieve the order using the order_number
    $order = Order::where('order_number', $order_number)->firstOrFail();

    // Pass the order to the view
    return view('checkoutsuccess', compact('order'));
}

public function checkout(Request $request)
{
    $status = $request->query('status');
    
    if ($status === 'success') {
        session()->flash('message', 'Payment was successful!');
    } elseif ($status === 'cancel') {
        session()->flash('message', 'Payment was canceled.');
    }

    return view('payment'); 
}



}
