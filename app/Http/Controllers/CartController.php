<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Gender;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        $user = auth()->user();

        // Check if the product is already in the cart
        $cart = Cart::where('user_id', $user->id)
                    ->where('product_id', $productId)
                    ->first();

        if ($cart) {
            // If the product is already in the cart, increase the quantity
            $cart->quantity += 1;
            $cart->save();
        } else {
            // If the product is not in the cart, create a new cart entry
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function index()
    {
        $user = auth()->user();
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();
        $genders = Gender::all();

        return view('cart', compact('cartItems','genders'));
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
