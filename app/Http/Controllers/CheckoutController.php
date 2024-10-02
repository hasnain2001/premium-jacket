<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Categories;


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

    if (auth()->check()) {
        // Logged-in user: Fetch cart items from the database
        $cartItems = Cart::where('user_id', auth()->id())->get();
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
    $total = $subtotal; // Add taxes/shipping if necessary

    return view('checkout', compact('cartItems', 'subtotal', 'total', 'genders', 'categoriesByGender'));
}

public function store(Request $request)
{
    // Log request data
    Log::info('Checkout Request Data: ', $request->all());

    // Check if items field is empty or null
    if (empty($request->items) || count($request->items) === 0) {
        return back()->withErrors(['error' => 'Please add some products to your cart before proceeding with checkout.']);
    }

    // Validate incoming request data
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
        'shipping_option' => 'required|string|in:free',
        'payment_option' => 'required|string|in:credit_card,paypal',
        'items' => 'required|array',
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.price' => 'required|numeric',
        'items.*.quantity' => 'required|integer|min:1',
    ]);

    // Begin transaction for order processing
    DB::beginTransaction();
    try {
        // Calculate total amount
        $totalAmount = collect($request->items)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // Create the Order
        $order = Order::create([
            'user_id' => auth()->id(),
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
            'payment_option' => $request->payment_option,
        ]);

        // Create Order Items and update product quantity
        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            // Update product quantity in the products table
            $product = Product::find($item['product_id']);
            if ($product) {
                if ($product->quantity < $item['quantity']) {
                    throw new \Exception('Insufficient quantity for product: ' . $product->name);
                }

                $product->decrement('quantity', $item['quantity']);
            }
        }

        // Commit the transaction
        DB::commit();

        return redirect()->route('checkout.success', ['order_number' => $order->order_number]);

    } catch (\Exception $e) {
        // Rollback the transaction on error
        DB::rollback();
        Log::error('Order Processing Error: ' . $e->getMessage());
        Log::error($e->getTraceAsString()); // Log the stack trace for debugging
        return back()->withErrors(['error' => 'There was an error processing your order: ' . $e->getMessage()]);
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
