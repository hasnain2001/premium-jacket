@extends('admin.layouts.guest')
@section('datatable-title')
    Order: {{ $order->order_number }}
@endsection
@section('main-content')
    <div class="container">
        <h1>Order Details</h1>

        <h3>Order Number: {{ $order->order_number }}</h3>

        <h4>Customer Information</h4>
        <p>
            Name: {{ $order->first_name }} {{ $order->last_name }}<br>
            Email: {{ $order->email }}<br>
            Phone: {{ $order->phone }}
        </p>

        <h4>Shipping Details</h4>
        <p>
            {{ $order->address }}<br>
            {{ $order->city }}, {{ $order->state }} {{ $order->zip }}<br>
            {{ $order->country }}
        </p>

        <h4>Order Summary</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
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
                                <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid img-thumbnail" style="width: 80px; height: auto;">
                            @else
                                <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-fluid img-thumbnail" style="width: 80px; height: auto;">
                            @endif
                        </td>
                        <td>{{ $item->product->name }}</td> <!-- Assuming you have a product relationship -->
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="4"><strong>Total Amount:</strong></td>
                    <td><strong>${{ number_format($order->total_amount, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('admin.order') }}" class="btn btn-secondary">Back to Orders List</a>
    </div>
@endsection
