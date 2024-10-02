<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'status',
        'email',         // Add this field
        'first_name',    // Add this field
        'last_name',     // Add this field
        'address',       // Add this field
        'city',          // Add this field
        'state',         // Add this field
        'zip',           // Add this field
        'phone',         // Add this field
        'country',       // Add this field
        'shipping_option', // Add this field
        'payment_option'  // Add this field
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


}
