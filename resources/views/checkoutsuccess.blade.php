@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-success text-center">
            <h1>Thank You for Your Purchase!</h1>
            <p>Your order has been placed successfully.</p>
            <hr>

            <h4>Order Number: {{ session('order_number') }}</h4>

            <p>
                A confirmation email has been sent to you. You can track your order in your account.
            </p>

            <!-- Display a summary of the order -->
            <h5>Order Summary</h5>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('order_items') as $item)
                        <tr>
                            <td>{{ $item['product_name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total Amount</th>
                        <th>${{ number_format(session('order_total'), 2) }}</th>
                    </tr>
                </tfoot>
            </table>

            {{-- <a href="{{ route('product') }}" class="btn btn-primary mt-4">Continue Shopping</a>
            <a href="{{ route('user.orders') }}" class="btn btn-success mt-4">View My Orders</a> --}}
        </div>
    </div>
@endsection
