<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'carts';

    // Specify the fillable attributes to allow mass assignment
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // Disable timestamps if not using created_at and updated_at fields
    public $timestamps = true;

    /**
     * Get the user that owns the cart item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product associated with the cart item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
