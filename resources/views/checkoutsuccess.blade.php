    @extends('welcome')

    @section('main-content')
        <div class="container my-5">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-center py-4">
                    <h1 class="card-title text-white">Order Confirmation</h1>
                    <p class="lead mb-0">Thank you for your order!</p>
                    <p class="mb-0">Your order has been placed successfully.</p>
                </div>

                <div class="card-body">
                    <div class="text-center my-4">
                        <h3 class="text-primary">Order Number: {{$order->order_number}}</h3>
                    </div>

                    <h3 class="mb-4">Order Summary</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="thead-dark">
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
                                                <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-thumbnail" style="width: 80px; height: auto;">
                                            @else
                                                <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-thumbnail" style="width: 80px; height: auto;">
                                            @endif
                                        </td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ number_format($item->price, 2) }}</td>
                                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                @endforeach

                                <tr class="table-light">
                                    <td colspan="4"><strong>Total Amount:</strong></td>
                                    <td><strong>${{ number_format($order->total_amount, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="my-5">
                        <h4 class="mb-3 text-start">Shipping Details</h4>
                        <div class="card">
                            <div class="card-body bg-light p-4 text-start">
                                <h5 class="card-title mb-4 text-primary text-start">
                                    <i class="fas fa-shipping-fast"></i> Shipping Details
                                </h5>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <strong><i class="fas fa-user"></i> Name:</strong>
                                            {{ $order->first_name }} {{ $order->last_name }}
                                        </p>
                                        <p class="mb-2">
                                            <strong><i class="fas fa-map-marker-alt"></i> Address:</strong>
                                            {{ $order->address }}
                                        </p>
                                        <p class="mb-2">
                                            <strong><i class="fas fa-city"></i> City:</strong>
                                            {{ $order->city }}, {{ $order->state }} {{ $order->zip }}
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <strong><i class="fas fa-globe"></i> Country:</strong>
                                            {{ $order->country }}
                                        </p>
                                        <p class="mb-2">
                                            <strong><i class="fas fa-phone"></i> Phone:</strong>
                                            {{ $order->phone }}
                                        </p>
                                        <p class="mb-2">
                                            <strong><i class="fas fa-envelope"></i> Email:</strong>
                                            {{ $order->email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="text-center">
                        <a href="{{ route('product') }}" class="btn btn-lg btn-primary">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
