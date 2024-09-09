<?php
header("X-Robots-Tag:index, follow");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
@if ($category)
    <title>{{ $category->title }}</title>
    <link rel="canonical" href="https://www.premiumleatherstyle.com/{{ Str::slug($category->slug) }}">
    <meta name="description" content="{{ $category->meta_description }}">
    <meta name="keywords" content="{{ $category->meta_keyword }}">
    <meta name="author" content="john">
    <meta name="robots" content="index, follow">
@else
    <title>Category Not Found</title>
    <meta name="description" content="Category not found on Premium Leather Style.">
    <meta name="robots" content="noindex, nofollow">
@endif


<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
<style>

.conain {
    background-position: center;
    background-size: cover;
    height: 200px;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url("{{ asset("images/banner.jpg") }}");
}
.text-product {
    font-weight: 700;
    text-decoration: none;
    font-size: 15px;
    display: block;
    margin-bottom: 5px;
}


</style>

</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>

    <div class="conain">
        <h1 class="shop-text">{{ $category->title }}</h1>
    </div>
<br>
<div class="container">
    <h1 class="text-center">{{ $category->title }}</h1>
    <div class="row">
        @if ($products->isEmpty())
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Sorry!</h4>
                <p>No products available at the moment. Please check back later.</p>
                <hr>
                <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
            </div>
        @else
            @foreach ($products as $product)
                <div class="col-6 col-md-2 mb-4"> <!-- Use col-6 for mobile and col-md-2 for desktop -->
                    <div class="card mb-4 shadow h-100">
                        <div class="card-img-top" style="height: 150px; overflow: hidden;">
                            <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}">
                            @php
                                $images = json_decode($product->productimage);
                            @endphp
                            @if(is_array($images) && !empty($images))
                                <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid rounded-top" style="height: 100%; width: 100%; object-fit: cover;">
                            @else
                                <img src="{{ asset('front/assets/images/no-image-found.jpg') }}" alt="No Image" class="img-fluid rounded-circle" style="height: 100%; width: 100%; object-fit: cover;">
                            @endif
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between text-center" style="background: none; border: none;">
                            <span class="text-product ">{{ $product->name }}</span>
                            <br>
                            <div>
                                <b>${{ number_format($product->price, 2) }} USD</b>
                                <span class="text-muted me-2">
                                    <del>${{ number_format($product->offprice, 2) }} USD</del>
                                </span>
                            </div>
                            <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark btn-sm mt-auto">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>




<br>
<footer>
    @include('components.footer')
</footer>
</body>
</html>
