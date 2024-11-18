<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price' ,'size','color'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // OrderItem.php (OrderItem Model)
public function order()
{
    return $this->belongsTo(Order::class);
}

}
