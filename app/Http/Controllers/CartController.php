<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\Gender;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        $user = auth()->user();
        $size = $request->input('size');
        $color = $request->input('color');
    
        $cart = Cart::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->where('size', $size)
                    ->where('color', $color)
                    ->first();
    
        if ($cart) {
            $cart->quantity += $request->input('quantity');
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $request->input('quantity'),
                'size' => $size,
                'color' => $color,
            ]);
        }
    
        return redirect()->back()->with('success', 'Product added to cart!');
    }
    

    public function update(Request $request, $productId)
    {
        $user = auth()->user();
        $quantity = $request->input('quantity');
        $size = $request->input('size');
        $color = $request->input('color');
        
        // Validate quantity
        if ($quantity < 1) {
            return redirect()->route('cart.index')->with('error', 'Quantity must be at least 1.');
        }
    
        // Find the cart item
        $cart = Cart::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->where('size', $size)
                    ->where('color', $color)
                    ->first();
    
       
        Log::info('Updating cart item:', [
            'user_id' => $user->id,
            'product_id' => $productId,
            'size' => $size,
            'color' => $color,
            'quantity' => $quantity,
            'cart' => $cart
        ]);
    
        // Update cart item
        if ($cart) {
            $cart->quantity = $quantity;
            $cart->save();
            return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
        } else {
            // Handle case where cart item is not found
            return redirect()->route('cart.index')->with('error', 'Cart item not found.');
        }
    }
    

    public function index()
    {
        $user = auth()->user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
        $genders = Gender::all();

        return view('cart', compact('cartItems', 'genders'));
    }

    public function removeFromCart($productId)
    {
        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('product_id', $productId)
                        ->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

}
