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

    // Validate request data
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
        // 'payment_option' => 'required|string|in:paypal,stripe', // Add required payment_method validation
    ]);

    DB::beginTransaction();

    try {
        // Calculate total amount
        $totalAmount = collect($request->items)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // Set the payment option based on the selected method
        $paymentOption = $request->payment_method;

        // Create the Order
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
            'payment_option' => $paymentOption, // Save the selected payment option
        ]);

        // Create Order Items and update product quantities
        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            // Decrement the product quantity
            $product = Product::find($item['product_id']);
            if ($product && $product->quantity >= $item['quantity']) {
                $product->decrement('quantity', $item['quantity']);
            } else {
                throw new \Exception('Insufficient quantity for product: ' . $product->name);
            }
        }

        if ($paymentOption === 'paypal') {
            $this->clearCart($request);
            DB::commit();
            return $this->processPayPalPayment($order, $totalAmount);
        } elseif ($paymentOption === 'stripe') {
            $this->clearCart($request);
            DB::commit();
            return $this->processStripePayment($order, $totalAmount, $request->stripeToken);
        }

        DB::commit();
        $this->clearCart($request);
        return redirect()->route('checkout.success', ['order_number' => $order->order_number])
            ->with('message', 'Your order has been processed successfully.');

    } catch (\Exception $e) {
        DB::rollback();
        Log::error('Order Processing Error: ' . $e->getMessage());
        return back()->withErrors(['error' => 'There was an error processing your order: ' . $e->getMessage()]);
    }
}


   // Separate method for PayPal payment processing
   public function processPayPalPayment($order, $totalAmount)
   {

            // Initialize the PayPal client
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
        
            // Set up the order data
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
                    "return_url" => route('payment.success'),
                    "cancel_url" => route('payment.cancel')
                ]
            ];
        
            // Create the order
            $response = $provider->createOrder($orderData);
        
            // Redirect the user to PayPal if the order is created successfully
            if (isset($response['links'][1]['href'])) {
                return redirect($response['links'][1]['href']);
            }
        
            // Handle error if any
            return redirect()->back()->with('error', 'Something went wrong.');
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
               "return_url" => route('checkout.success', ['order_number' => $order->order_number]),
               "cancel_url" => route('checkout.cancel'),
           ]
       ];

       $response = $provider->createOrder($orderData);

       if (isset($response['links'][1]['href'])) {
           return redirect($response['links'][1]['href']);
       }

       throw new \Exception('Error creating PayPal order.');
   }

   // Separate method for Stripe payment processing
   public function processStripePayment($order, $totalAmount, $stripeToken)
   {
       Stripe\Stripe::setApiKey(env('STRIPE_KEY'));

       $charge = Stripe\Charge::create([
           "amount" => $totalAmount * 100, 
           "currency" => "usd",
           "source" => $stripeToken,
           "description" => "Order #" . $order->order_number,
       ]);

       if (!$charge || $charge->status !== 'succeeded') {
           throw new \Exception('Error processing Stripe payment.');
       }

       return redirect()->route('checkout.success', ['order_number' => $order->order_number]);
   }
   private function clearCart(Request $request)
   {
       // Check if the user is authenticated
       if (Auth::check()) {
           // Clear cart items from the database for logged-in users
           Cart::where('user_id', auth()->id())->delete();
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



public function order()
{
    // Retrieve all orders from the database, ordering by latest created first
    $orders = Order::orderBy('created_at', 'desc')->get();

    // Pass the orders to the view
    return view('admin.order.index', compact('orders'));
}

public function orderDetail($order_number)
{
    // Find the order by its order number
    $order = Order::where('order_number', $order_number)->firstOrFail();

    // Pass the order to the view
    return view('admin.order.order-detail', compact('order'));
}


}
