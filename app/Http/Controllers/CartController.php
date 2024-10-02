<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Categories;
use App\Models\Gender;
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

    public function update(Request $request, $productId)
    {
        $quantity = $request->input('quantity');
        $size = $request->input('size');
        $color = $request->input('color');
        if ($quantity < 1) {
            return redirect()->route('cart.index')->with('error', 'Quantity must be at least 1.');
        }
        $cart = session()->get('cart', []);
        $cartKey = $productId . '-' . $size . '-' . $color;
        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
        } else {
            return redirect()->route('cart.index')->with('error', 'Cart item not found.');
        }
    }



 public function index()
 {
     $cartItems = [];
     $genders = Gender::all();
     $categoriesByGender = [];

     foreach ($genders as $gender) {
         $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
     }

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

     return view('cart', compact('cartItems', 'genders', 'categoriesByGender'));
 }


    public function removeFromCart(Request $request, $productId)
    {

        $product = $request->input('product_id');
        $quantity = $request->input('quantity');
        $size = $request->input('size');
        $color = $request->input('color');

        $cart = session()->get('cart', []);

        $cartKey = $productId . '-' . $size . '-' . $color;

             if (isset($cart[$cartKey])) {

            unset($cart[$cartKey]);
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product removed from cart!');
        }

        return redirect()->back()->with('error', 'Product not found in cart!');
    }
}



