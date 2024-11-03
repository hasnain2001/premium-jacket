<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Gender;
use App\Models\Categories;
use App\Models\Cashier\User;
use App\Models\Cart; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


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


   
// Share cart count with all views using the Navbar component
  // Share cart count with all views using the Navbar component
  View::composer('components.navbar', function ($view) {
    $cartCount = 0;

    if (Auth::check()) {
        // If user is authenticated, get the cart count from the database
        $cartCount = Cart::where('user_id', Auth::id())->count();
    } else {
        // If user is not authenticated, get the cart count from the session
        $cartCount = session()->has('cart') ? count(session('cart')) : 0;
    }

    $view->with('cartCount', $cartCount);
});
      // Share the variables with all views
      view()->share('genders', $genders);
      view()->share('categoriesByGender', $categoriesByGender);

}


}
