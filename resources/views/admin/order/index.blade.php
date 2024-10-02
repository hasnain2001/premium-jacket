@extends('admin.layouts.guest')
@section('datatable-title')
    Order
@endsection
@section('main-content')
<div class="container">
    <h1>Orders List</h1>

    <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>Order Number</th>
                <th>Customer Name</th>
                <th>Total Amount</th>
                <th>Status</th>
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
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.order-detail', $order->order_number) }}" class="btn btn-primary">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
