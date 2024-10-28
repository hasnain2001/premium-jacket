@extends('admin.layouts.guest')
@section('datatable-title')
    Order
@endsection
@section('main-content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Orders List</h1>

    <div class="table-responsive">
        <table id="datatable-buttons" class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th>Order Number</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Payment</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                        <td>{{ $order->payment_option }}</td>
                        <td>{{ $order->created_at->setTimezone('Asia/Karachi')->format('d M Y, h:i A') }}</td>
                        <td>
                            <a href="{{ route('admin.order-detail', $order->order_number) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
