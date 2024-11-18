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
    'email',       
    'first_name',
    'last_name',
    'address',
    'city',   
    'state',    
    'zip',  
    'phone',   
    'country', 
    'shipping_option', 
    'payment_option'  ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
// Order.php (Order Model)
public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}


}
