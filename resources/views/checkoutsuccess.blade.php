    @extends('welcome')

    @section('main-content')


@if($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> Please fix the following issues:
        <ul class="mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="container my-5">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-center py-4">
                    <h1 class="card-title text-white">Order Confirmation</h1>
                    <p class="lead mb-0">Thank you for your order!</p>
                    <p class="mb-0">Your order has been placed successfully.</p>
                    <div class='form-row row'>
                        @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle" style="margin-right: 10px;"></i>
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
                    </div>
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
                                    <th>
                                        size
                                    </th>
                                    <th>color</th>
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
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->color }}</td>
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
                                            <strong><i class="fas fa-map-marker-alt "></i> Address:</strong>
                                            {{ $order->address }}
                                        </p>
                                        <p class="mb-2">
                                            <strong><i class="fas fa-city"></i> City:{{ $order->city }}</strong>

                                        </p>
                                        <p class="mb-2">
                                            <strong>
                                                <i class="fas fa-map-marker-alt me-2"></i> State: 
                                            </strong> 
                                            {{ $order->state }}
                                        </p>
                                        
                                        <p class="mb-2">
                                            <strong>
                                                <i class="fas fa-envelope me-2"></i> Postal Code: 
                                            </strong> 
                                            {{ $order->zip }}
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
                        <a href="{{ route('product') }}" class="btn btn-sm" style="background-color: #990c0c; color:aliceblue;">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
