<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    
public function order()
{
    // Retrieve all orders from the database, ordering by latest created first
    $orders = Order::orderBy('created_at', 'desc')->get();

    // Pass the orders to the view
    return view('admin.order.index', compact('orders'));
}

public function orderDetail($order_number)
{
    // Find the order by its order number
    $order = Order::where('order_number', $order_number)->firstOrFail();

    // Pass the order to the view
    return view('admin.order.order-detail', compact('order'));
}

}
