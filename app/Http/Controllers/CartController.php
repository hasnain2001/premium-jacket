<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        $size = $request->input('size');
        $color = $request->input('color');
        $quantity = $request->input('quantity');

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

        return redirect()->back()->with('success', 'Product added to cart!');
    }
    public function remove(Request $request, $productId)
{
    $size = $request->input('size');
    $color = $request->input('color');

    $cart = session()->get('cart', []);
    $cartKey = $productId . '-' . $size . '-' . $color;

    // Check if the item exists in the cart
    if (isset($cart[$cartKey])) {
        unset($cart[$cartKey]); // Remove the item from the cart
        session()->put('cart', $cart); // Update the session
        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    return redirect()->back()->with('error', 'Product not found in cart!');
}


public function update(Request $request, $productId)
{
    // Validate the quantity input
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

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

    return redirect()->back()->with('success', 'Cart updated successfully!');
}




 public function index()
 {
     $cartItems = [];
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

     return view('cart', compact('cartItems', ));
 }


   
}



