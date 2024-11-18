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
public function destroy($id) {
    // Find the order by its ID
    $order = Order::find($id);
    
    if ($order) {
        // Delete associated order items
        $order->orderItems()->delete();  // This deletes all related order items
        
        // Now delete the order itself
        $order->delete();
        
        return redirect()->back()->with('success', 'Order and Order Items Deleted Successfully');
    } else {
        return redirect()->back()->with('error', 'Order not found');
    }
}


}
