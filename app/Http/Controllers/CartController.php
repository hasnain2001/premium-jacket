<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart; 
class CartController extends Controller
{
  
    public function add(Request $request, $productId)
    {
        $size = $request->input('size');
        $color = $request->input('color');
        $quantity = $request->input('quantity');
    
        // Check if user is logged in
        if (Auth::check()) {
            // Get the logged-in user's ID
            $userId = Auth::id();
    
            // Try to find the cart item for this user, product, size, and color
            $cartItem = Cart::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->where('size', $size)
                            ->where('color', $color)
                            ->first();
    
            if ($cartItem) {
                // If item exists in the cart, update the quantity
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                // Otherwise, create a new cart item
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'size' => $size,
                    'color' => $color,
                ]);
            }
        } else {
            // If user is not logged in, add item to session cart
            $cart = session()->get('cart', []);
            $cartKey = $productId . '-' . $size . '-' . $color;
    
            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity'] += $quantity;
            } else {
                $cart[$cartKey] = [
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'size' => $size,
                    'color' => $color,
                ];
            }
    
            session()->put('cart', $cart);
        }
    
        return redirect()->back()->with('success', 'Product added to cart!');
    }
    
    public function remove(Request $request, $productId)
    {
        $size = $request->input('size');
        $color = $request->input('color');
    
        if (Auth::check()) {
            // User is authenticated, remove item from the database cart
            $cartItem = Cart::where([
                ['user_id', Auth::id()],
                ['product_id', $productId],
                ['size', $size],
                ['color', $color]
            ])->first();
    
            if ($cartItem) {
                $cartItem->delete();
                return redirect()->back()->with('success', 'Product removed from your cart!');
            }
    
        } else {
            // User is a guest, remove item from session cart
            $cart = session()->get('cart', []);
            $cartKey = $productId . '-' . $size . '-' . $color;
    
            if (isset($cart[$cartKey])) {
                unset($cart[$cartKey]);
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Product removed from your cart!');
            }
        }
    
        // If the item was not found, show an error message
        return redirect()->back()->with('error', 'Product not found in your cart!');
    }




    public function update(Request $request, $productId)
    {
        // Validate the quantity input
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
    
        if (Auth::check()) {
            // If the user is logged in, update the cart in the database
            
            $user = Auth::user();
    
            // Find the cart item for this user and product
            $cartItem = $user->cart()->where('product_id', $productId)->first();
    
            if ($cartItem) {
                // Update the quantity in the database
                $cartItem->quantity = $request->input('quantity');
                $cartItem->save();
            }
    
        } else {
            // If the user is not logged in, update the cart in the session
    
            // Get the current cart from the session
            $cart = session()->get('cart', []);
    
            // Loop through the cart items to find the one to update
            foreach ($cart as $key => $item) {
                if ($item['product_id'] == $productId) {
                    // Update the quantity
                    $cart[$key]['quantity'] = $request->input('quantity');
                    break; // Exit the loop once the item is found
                }
            }
    
            // Save the updated cart back to the session
            session()->put('cart', $cart);
        }
    
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
    





public function index()
{
    $cartItems = [];

    if (Auth::check()) {
        // Get cart items from the database for the logged-in user
        $userId = Auth::id();
        $cartData = Cart::where('user_id', $userId)->get();

        foreach ($cartData as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $cartItems[] = (object)[
                    'product' => $product,
                    'quantity' => $item->quantity,
                    'size' => $item->size,
                    'color' => $item->color,
                ];
            }
        }
    } else {
        // Get cart items from the session for guest users
        $cartSession = session()->get('cart', []);
        foreach ($cartSession as $cartData) {
            $product = Product::find($cartData['product_id']);
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

    return view('cart', compact('cartItems'));
}


   
}



