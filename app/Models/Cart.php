<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $table = 'carts';


    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'size',
        'color',
    ];



    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
    public function product() {
        return $this->belongsTo(Product::class); // Ensure this is set up correctly
    }
}
