@extends('admin.layouts.guest')
@section('datatable-title')
    Order
@endsection

@section('main-content')
<div class="container mt-5">

    @if(session('success'))
    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-ban"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <b>{{ session('success') }}</b>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h1 class="text-center mb-4">Orders List</h1>

    <div class="table-responsive">
        <table id="datatable-buttons" class="table table-hover dt-responsive nowrap w-100">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th>Order Number</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Payment</th>
                    <th>Created At</th>
                    <th>Actions</th>
                    <th>delete</th>
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
                        <td>
                            <form action="{{ route('admin.order.delete', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?')">
                                @csrf
                                @method('DELETE') <!-- This will make the request a DELETE request -->
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill shadow-sm">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
