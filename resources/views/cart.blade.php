<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 2.5rem;
            color: #690500;
        }
        .product-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: box-shadow 0.3s;
        }
        .product-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .summary-card, .subtotal, .cart-total {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            color: #690500;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .total-price, .cart-total, .subtotal {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #ebccca;
            color: #fff;
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.3s;
        }
        .btn-custom:hover {
            background-color: #500400;
            transform: translateY(-2px);
        }
        .btn-continue-shopping {
            background-color: #b81f1f;
            color: #fff;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .btn-continue-shopping:hover {
            background-color: #a51818;
        }
        .alert {
            border: none;
            border-radius: 10px;
            color: #690500;
            font-weight: bold;
        }
        .product-card img {
            border-radius: 5px;
            width: 80px;
            height: auto;
            margin-right: 20px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }
        .update-container {
        display: flexbox;
        align-items: center;
    }
    .update {
        width: 70px;
        flex-shrink: 0;
    }
   
        /* Mobile Adjustments */
        @media (max-width: 576px) {
            h1 {
                font-size: 2rem;
            }
            .product-card {
                padding: 15px;
            }
            .product-card img {
                width: 60px;
                margin-right: 15px;
            }
            /* Stack elements vertically on small screens */
            .product-card .d-flex {
                flex-direction: column;
                align-items: center;
            }
            .product-card .d-flex .update, .product-card .d-flex button {
                width: 100%;
                margin-top: 5px;
            }
            .summary-card {
                padding: 15px;
            }
            .btn-custom, .btn-continue-shopping {
                font-size: 0.9rem;
                width: 100%;
                margin-top: 10px;
            }
         
           
            @media (max-width: 576px) {
        .update {
            width: 60px;
        }
 
    }
        }
    </style>
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>
    <div class="container my-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h1 class="text-center mb-4">Shopping Bag </h1>

        <div class="row">
            <div class="col-12 col-md-8 mb-4">
                @if((is_object($cartItems) && $cartItems->isEmpty()) || (is_array($cartItems) && empty($cartItems)))
                    <div class="alert alert-warning text-center">
                        <h4 class="alert-heading">Your Cart is Empty</h4>
                        <p>It looks like you haven't added anything to your cart yet. Start shopping to fill it up!</p>
                        <hr>
                        <p class="mb-0">Explore our products and find something you love.</p>
                        <div class="d-grid gap-2">
                        <a href="{{route('product')}}" class="btn btn-danger btn-sm"> Add  Product  In Cart</a>
                        </div>
                    </div>
                @else
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
                        <div class="product-card">
                            <div class="d-flex align-items-center">
                                @php $images = json_decode($item->product->productimage); @endphp
                                <img src="{{ asset(is_array($images) && !empty($images) ? $images[0] : 'images/No-image-available.jpg') }}" alt="Product Image" class="img-fluid img-thumbnail">
                                <div class="w-100">
                                    <p class=" text-center">{{ $item->product->name }}</p>
                                    <form action="{{ route('cart.update', ['product' => $item->product]) }}" method="POST" class="d-flex flex-column">
                                        @csrf
                                        @method('PATCH')
                                        <div class="update-container">
                                            <input type="number" name="quantity" class="update me-2" value="{{ old('quantity', $item->quantity) }}" min="1" max="{{ $item->product->quantity }}" required>
                                            <button type="submit" class="btn btn-cart btn-primary  mt-2">
                                                <i class="fas fa-sync-alt"></i> Update
                                            </button>
                                        </div>
                                    </form>
                                    <strong class="text-muted mt-2">{{ $item->color }} | {{ $item->size }}</strong>
                                </div>
                                <div class="ms-auto text-end">
                                    <p class="mb-1">${{ number_format($item->product->price, 2) }}</p>
                                    <span class="total-price">${{ number_format($itemTotal, 2) }}</span>
                                </div>
                                <form action="{{ route('cart.remove', ['product' => $item->product]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="size" value="{{ $item->size }}">
                                    <input type="hidden" name="color" value="{{ $item->color }}">
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this Cart Item?')" class="btn btn-danger btn-cart ms-2">
                                        <i class="fas fa-trash-alt"></i> 
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Summary Section -->
            <div class="col-12 col-md-4">
                <div class="summary-card text-center shadow">
                    <div class="subtotal mb-3">
                        <p>Subtotal ({{ $totalQuantity ?? 0 }} items):</p>
                        <h5>${{ number_format($totalPrice ?? 0, 2) }}</h5>
                    </div>
                    <div class="cart-total mb-3">
                        <h5>Total: ${{ number_format($totalPrice ?? 0, 2) }}</h5>
                    </div>
                    @if(!empty($cartItems))
                        <a href="{{ route('checkout') }}" class="btn btn-dark btn-custom w-100 mb-2">Proceed to Checkout</a>
                    @else
                        <div class="alert alert-danger text-center">Please add products to proceed to checkout.</div>
                    @endif
                    <a href="{{route('product')}}" class="btn btn-danger btn-continue-shopping w-100">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>

    <footer>
        @include('components.footer')
    </footer>
</body>
</html>
