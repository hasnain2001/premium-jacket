@extends('admin.layouts.guest')
@section('datatable-title')
    Order: {{ $order->order_number }}
@endsection
@section('main-content')
    <div class="container ">
        <div class="text-center mb-2">
            <h1 class="display-5 fw-bold">Order Details</h1>
            <h4 class="text-muted">Order Number: {{ $order->order_number }}</h4>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm border-0 rounded-3">
                    <div class="card-header bg-primary text-white text-center py-2">
                        <h4 class="card-title mb-0">Customer Information</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
                        <p><strong>Email:</strong> {{ $order->email }}</p>
                        <p><strong>Phone:</strong> {{ $order->phone }}</p>
                        <h6 class="text-secondary mt-3"><strong>Shipping Option:</strong> {{ $order->shipping_option }}</h6>
                    </div>
                </div>
            </div>
        
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm border-0 rounded-3">
                    <div class="card-header bg-primary text-white text-center py-2">
                        <h4 class="card-title mb-0">Shipping Details</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Address:</strong> {{ $order->address }}</p>
                        <p><strong>City:</strong> {{ $order->city }}</p>
                        <p><strong>State:</strong> {{ $order->state }}</p>
                        <p><strong>Postal Code:</strong> {{ $order->zip }}</p>
                        <p><strong>Country:</strong> {{ $order->country }}</p>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-primary text-white text-center py-1">
                <h4 class="card-title mb-0">Order Summary</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Item Image</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        @php
                                            $images = json_decode($item->product->productimage);
                                        @endphp
                                        @if(is_array($images) && !empty($images))
                                            <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid rounded-circle border shadow-sm" style="width: 60px; height: 60px;">
                                        @else
                                            <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-fluid rounded-circle border shadow-sm" style="width: 60px; height: 60px;">
                                        @endif
                                    </td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                            <tr class="table-active">
                                <td colspan="4" class="text-end"><strong>Total Amount:</strong></td>
                                <td><strong>${{ number_format($order->total_amount, 2) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center ">
            <a href="{{ route('admin.order') }}" class="btn btn-outline-primary btn-lg px-5">
                <i class="fas fa-arrow-left me-2"></i>Back to Orders List
            </a>
        </div>
        <br>  <br>  <br>
    </div>
 
@endsection
