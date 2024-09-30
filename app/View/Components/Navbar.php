<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Gender;  // Make sure to import your Gender model
use App\Models\Categories; // Make sure to import your Categories model

class Navbar extends Component
{
    public $genders;
    public $categoriesByGender;

    /**
     * Create a new component instance.
     */
    public function __construct($genders, $categoriesByGender)
    {
        $this->genders = $genders;
        $this->categoriesByGender = $categoriesByGender;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', [
            'genders' => $this->genders,
            'categoriesByGender' => $this->categoriesByGender,
        ]);
    }
}
