<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Gender;
use App\Models\Categories;
use App\Models\Cashier\User;
use Laravel\Cashier\Cashier;
use App\Models\Cashier\Subscription;
use App\Models\Cashier\SubscriptionItem;
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
View::composer('components.navbar', function ($view) {
    $cartCount = session()->has('cart') ? count(session('cart')) : 0;
    $view->with('cartCount', $cartCount);
});
      // Share the variables with all views
      view()->share('genders', $genders);
      view()->share('categoriesByGender', $categoriesByGender);

      Cashier::calculateTaxes();
      Cashier::useCustomerModel(User::class);
    Cashier::calculateTaxes();
    Cashier::useSubscriptionModel(Subscription::class);
    Cashier::useSubscriptionItemModel(SubscriptionItem::class);
}


}
