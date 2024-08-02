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

<div class="container mt-4">
    <h1>Your Cart</h1>
    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Color</th>
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
                                <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid shadow" style="height: 100px;">
                            @else
                                <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-fluid shadow rounded-circle" style="height: 100px;">
                            @endif
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->product_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('Put') 
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->quantity }}" class="form-control d-inline" style="width: 80px;">
                        </td>
                        <td>
                            <select name="size" class="form-select" aria-label="Select size" required>
                                <option value="S" {{ old('size', $item->size) == 'S' ? 'selected' : '' }}>S (US 4-6)</option>
                                <option value="M" {{ old('size', $item->size) == 'M' ? 'selected' : '' }}>M (US 8-10)</option>
                                <option value="L" {{ old('size', $item->size) == 'L' ? 'selected' : '' }}>L (US 12-14)</option>
                                <option value="XL" {{ old('size', $item->size) == 'XL' ? 'selected' : '' }}>XL (US 16-18)</option>
                                <option value="2XL" {{ old('size', $item->size) == '2XL' ? 'selected' : '' }}>2XL</option>
                                <option value="3XL" {{ old('size', $item->size) == '3XL' ? 'selected' : '' }}>3XL</option>
                                <option value="4XL" {{ old('size', $item->size) == '4XL' ? 'selected' : '' }}>4XL</option>
                                <option value="5XL" {{ old('size', $item->size) == '5XL' ? 'selected' : '' }}>5XL</option>
                            </select>
                            <input type="hidden" name="color" value="{{ $item->color }}">
                       
                        </td>
                        <td>{{ $item->color }}</td>
                        <td>${{ number_format($item->product->price, 2) }}</td>
                        <td>${{ number_format($itemTotal, 2) }}</td>
                        <td>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                        </form>
                            
                            <form action="{{ route('cart.remove', $item->product_id) }}" method="POST">
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
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    @endif
</div>


    <footer>
        @include('components.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
