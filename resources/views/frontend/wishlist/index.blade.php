<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WishList</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <style>
        .wishlist-item {
            margin-bottom: 20px;
        }
        .product-img {
            height: 200px;
            width: auto;
            object-fit: cover;
        }
        .btn-remove {
            margin-left: 10px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<nav>
   @include('components.navbar')
</nav>
<div class="container mt-5">
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

    <h1 class="mb-4">Your Wishlist</h1>

    @if($wishlist->isEmpty())
    <div class="alert alert-warning text-center">
        <h4 class="alert-heading">Your Wishlist  is Empty</h4>
        <p>It looks like you haven't added anything to your Wishlist yet. Start shopping to fill it up!</p>
        <hr>
        <p class="mb-0">Explore our products and find something you love.</p>
    </div>
    @else
        <div class="row">
            @foreach($wishlist as $product)
                <div class="col-md-4 wishlist-item">
                    <div class="card">
                        @php
                            $images = json_decode($product->productimage);
                        @endphp
                        @if(is_array($images) && !empty($images))
                            <img src="{{ asset($images[0]) }}" alt="Product Image" class="card-img-top product-img">
                        @else
                            <img src="{{ asset('front/assets/images/no-image-found.jpg') }}" alt="No Image" class="card-img-top product-img">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <span class="text-dark">{{ $product->price }}</span>
                            <span class="">Stock:{{ $product->quantity }}</span>
                            <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark mt-auto">View Details</a>
                            <form action="{{ route('wishlist.remove', $product->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-remove">Remove from Wishlist</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<footer>
    @include('components.footer')
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
