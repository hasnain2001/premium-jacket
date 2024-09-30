<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Gender;
use App\Models\Product;
use App\Models\Categories;

class CheckoutController extends Controller
{
 // app/Http/Controllers/CheckoutController.php

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
        DB::beginTransaction();
        try {
            // Create Order
            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => uniqid('Order-'),
                'total_amount' => $request->total,
                'status' => 'pending'
            ]);

            // Add Order Items
            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }

            DB::commit();

            // Redirect to Success Page
            return redirect()->route('checkout.success');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'There was an error processing your order']);
        }
    }
    public function success(Request $request)
    {
        // Assuming order data is available in the session
        $order = session('order'); // You could also fetch it from the database using the order_number

        if (!$order) {
            // If no order is found in session, redirect to the product page
            return redirect()->route('product')->with('error', 'No order found. Please try again.');
        }

        // Calculate total order price
        $orderTotal = 0;
        foreach ($order['items'] as $item) {
            $orderTotal += $item['quantity'] * $item['price'];
        }

        // Redirect to the order page and pass order details
        return redirect()->route('order.show', ['order_number' => $order['order_number']]);
    }


}
