<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $genders;
    public $categoriesByGender;
    public $cartCount; // Add this property

    public function __construct($genders = [], $categoriesByGender = [], $cartCount = 0) // Add cartCount to the constructor
    {
        $this->genders = $genders;
        $this->categoriesByGender = $categoriesByGender;
        $this->cartCount = $cartCount; // Initialize cartCount
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar', [
            'genders' => $this->genders,
            'categoriesByGender' => $this->categoriesByGender,
            'cartCount' => $this->cartCount, // Pass cartCount to the view
        ]);
    }
}
