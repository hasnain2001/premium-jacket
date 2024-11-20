<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Premium Leather Jackets | Stylish & Durable Outerwear | Product</title>

    <meta name="description" content="Explore a wide range of premium leather jackets for men and women. Shop stylish, durable outerwear and elevate your fashion with top-quality designs.">
    <meta name="keywords" content="leather jackets, premium jackets, men's jackets, women's jackets, stylish outerwear, durable jackets, fashion, leatherwear">
    <meta name="author" content="Premium Leather Style">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.premiumleatherstyle.com/product">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: #000;
            padding: 1rem;
        }

        .nav-logo {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
        }

        .conain {
            background-image: url('{{ asset('images/banner.jpg') }}');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .shop-text {
            font-size: 3rem;
            font-weight: bold;
            color: #f1c876;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .img-product {   
    display: block;
    margin: 0 auto;
    max-width: 100%;
    max-height: 150px;
    object-fit: cover;
    object-position: center;
    border-radius: 5px;
    background: none; /* Ensure no background is applied */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Add shadow for emphasis */
    border: 1px solid rgba(0, 0, 0, 0.1); /* Optional border for clarity */
    mix-blend-mode:multiply;
 
}
.card-header{
    background-color: #0056b3;
}


        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .breadcrumb-item a {
            font-weight: 500;
            color: #007bff;
        }

        .breadcrumb-item a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .btn-dark {
            background-color: #343a40;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-dark:hover {
            background-color: #23272b;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="conain">
        <h1 class="shop-text">Shop</h1>
    </div>

    <header class="bg-light py-3 px-4 rounded shadow-sm" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/" class="text-decoration-none text-primary">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('product') }}" class="text-decoration-none text-primary">
                    <i class="fas fa-shopping-cart"></i> Shop
                </a>
            </li>
        </ol>
    </header>

    <div class="container my-4">
        <p class="h5 text-center font-weight-bold">Total Products: <span>{{ $products->total() }}</span></p>
        <div class="row">
            @if ($products->isEmpty())
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        <h4>Sorry!</h4>
                        <p>No products available at the moment. Please check back later.</p>
                    </div>
                </div>
            @else
                @foreach ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <div class="card-header p-0">
                                <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}">
                                    @php
                                        $images = json_decode($product->productimage);
                                    @endphp
                                    @if (is_array($images) && !empty($images))
                                        <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-product">
                                    @else
                                        <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-product">
                                    @endif
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column justify-content-center align-items-center text-center">
                                    <span class="fw-bold mb-1 text-truncate" style="max-width: 100%;">{{ ucwords($product->name) }}</span>
                                    <b>${{ number_format($product->price, 2) }} </b>
                                    @if($product->offprice)
                                        <span class="text-muted me-2">
                                            <del>${{ number_format($product->offprice, 2) }}</del>
                                        </span>
                                    @endif
                                  
                                </div>
                                <div class="d-grid gap-2">
                                <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark mt-auto">View Product</a>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

  {{ $products->links('vendor.pagination.custom') }}
    <footer>
        @include('components.footer')
    </footer>
</body>
</html>
