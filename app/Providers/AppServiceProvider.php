<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Gender;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Cashier\User;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Session;
use App\Models\Cashier\Subscription;
use App\Models\Cashier\SubscriptionItem;

class AppServiceProvider extends ServiceProvider
{
  // ...

  public function boot(): void
  {
      // Get all genders
      $genders = Gender::all();

      // Prepare categories by gender
      $categoriesByGender = [];
      foreach ($genders as $gender) {
          $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
      }

      // Get the cart count (assuming cart is stored in session)
      $cartCount = session()->has('cart') ? count(session('cart')) : 0;

      // Get the cart items from session
      $cartSession = session()->get('cart', []);
      $cartItems = []; // Prepare cart items array
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

      // Share the variables with all views
      view()->share('genders', $genders);
      view()->share('categoriesByGender', $categoriesByGender);
      view()->share('cartCount', $cartCount);
      view()->share('cartItems', $cartItems); // Share cart items with all views
      Cashier::calculateTaxes();
      Cashier::useSubscriptionModel(Subscription::class);
      Cashier::useSubscriptionItemModel(SubscriptionItem::class);
  }
}
