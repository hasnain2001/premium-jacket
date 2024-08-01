<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cart</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <nav>
        @include('components.navbar')
    </nav>

    <br>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="container">
        <h1>Your Cart</h1>
        @if($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalQuantity = 0;
                        $totalPrice = 0;
                    @endphp

                    @foreach($cartItems as $item)
                        @php
                            $itemTotal = $item->product->price * $item->quantity;
                            $totalQuantity += $item->quantity;
                            $totalPrice += $itemTotal;
                        @endphp

                        <tr>
                            <td>
                                @php
                                    $images = json_decode($item->product->productimage);
                                @endphp
                                @if(is_array($images) && !empty($images))
                                    <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid shadow product" style="height: 100px;">
                                @else
                                    <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-fluid stores shadow rounded-circle">
                                @endif
                            </td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->product->price, 2) }}</td>
                            <td>${{ number_format($itemTotal, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Total</th>
                        <th>{{ $totalQuantity }}</th>
                        <th></th>
                        <th>${{ number_format($totalPrice, 2) }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            {{-- <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a> --}}
        @endif
    </div>
    <footer>
        @include('components.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
