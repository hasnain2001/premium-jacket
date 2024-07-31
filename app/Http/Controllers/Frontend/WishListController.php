<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Gender;
use Illuminate\Support\Facades\Auth;


class WishListController extends Controller
{
    public function addToWishlist($productId)
    {
        $user = Auth::user();
        $user->wishlist()->attach($productId);

        return back()->with('success', 'Product added to wishlist!');
    }

    public function removeFromWishlist($productId)
    {
        $user = Auth::user();
        $user->wishlist()->detach($productId);

        return back()->with('success', 'Product removed from wishlist!');
    }

    public function showWishlist()
    {
        $wishlist = Auth::user()->wishlist;
        $genders = Gender::all();
        return view('frontend.wishlist.index', compact('wishlist','genders'));
    }
}
