<?php

namespace App\Livewire\Frontend;
use Livewire\Component;
class WishList extends Component
{
    public function render()
    {

        $wishlist =WishList::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wish-list',['wishlist' => $wishlist]);
    }
}
