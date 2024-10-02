<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $genders;
    public $categoriesByGender;
    public $cartCount;
    public $cartItems;


    public function __construct($genders = [], $categoriesByGender = [], $cartCount = 0, $cartItems = [])
    {
        $this->genders = $genders;
        $this->categoriesByGender = $categoriesByGender;
        $this->cartCount = $cartCount;
        $this->cartItems = $cartItems;
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar', [
            'genders' => $this->genders,
            'categoriesByGender' => $this->categoriesByGender,
            'cartCount' => $this->cartCount,
            'cartItems' => $this->cartItems, 
        ]);
    }
}
