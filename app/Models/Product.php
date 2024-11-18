<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        "name",
        "slug",
        "description",
        "productimage",
        "price",
        "offprice",
        "sizes",
        "top_product",
        "quantity",
        "categories",
        'title',
        'meta_tag',
        'meta_keyword',
        'meta_description',
    ];

    public function wishlistedBy()
    {
        return $this->belongsToMany(User::class, 'wishlists')->withTimestamps();
    }
}
