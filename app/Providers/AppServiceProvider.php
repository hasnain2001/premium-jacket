<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Gender;
use App\Models\Categories;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Get all genders
        $genders = Gender::all();

        // Prepare categories by gender
        $categoriesByGender = [];
        foreach ($genders as $gender) {
            $categoriesByGender[$gender->slug] = Categories::where('gender', $gender->slug)->get();
        }

        // Share the variables with all views
        view()->share('genders', $genders);
        view()->share('categoriesByGender', $categoriesByGender);
    }
}
