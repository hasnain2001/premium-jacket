<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        .small-img {
            width: 100%;
            cursor: pointer;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
        }

        .small-img:hover {
            transform: scale(1.1);
        }

        .main-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-size-container {
            margin-top: 10px;
            display: none;
        }

        /* Custom styles for specific elements */
        .nav-logo {
    font-size: 44px; /* Adjust as needed */
    font-weight: 300;
    color: white;
    text-decoration: none;
}
nav {
    background-color: black;
    height: auto;
}
.text {
    color: white;
}

.conain{
            background-position: center;
            background-image: url('{{ asset('images/banner.jpg') }}');
         height:200px;
        }
        .shop-text{
            text-align: center;
            color: rgb(255, 255, 255);
            padding-top: 5%;
        }


</style>
@livewireStyles
</head>
<body>


    <nav>
        @include('components.navbar')
    </nav>

    <div class="conain">

        <h1 class="shop-text">Shop</h1>
    </div>
<br>
<div class="container">
  <h1 class="card bg-dark text-white text-center py-2">{{$product->name}}</h1>
    <!-- Alerts for Success and Error -->
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




    <!-- Product Section -->
    <div class="row">
        <div class="col-lg-6">
            @if ($product)
                <div class="card">
                    <div class="card-body">
                        <!-- Product Images -->
                        <div class="row">
                            <div class="col-4">
                                <div class="small-images">
                                    @php
                                        $images = json_decode($product->productimage, true);
                                    @endphp
                                    @if (is_array($images) && count($images) > 0)
                                        @foreach ($images as $key => $image)
                                            <img class="productimage img-fluid small-img" src="{{ asset($image) }}" data-index="{{ $key }}" onclick="changeImage(this)">
                                        @endforeach
                                    @else
                                      <img src="{{ asset('images/No-image-available.jpg') }}" alt="" srcset="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="main-image">
                                    @if (is_array($images) && count($images) > 0)
                                        <img src="{{ asset($images[0]) }}" alt="{{ $product->name }}" class="productimage img-fluid" id="mainImage">
                                    @else
                                        <img src="default-image.jpg" alt="No Image" class="img-fluid" id="mainImage">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-center mt-4">No product found.</p>
            @endif
        </div>
        <div class="col-lg-6">
            @if ($product)
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $product->name }}</h2>
                        <h6 class="text-danger text-uppercase">
                            {{ number_format((($product->offprice - $product->price) / $product->offprice) * 100, 2) }}% Off
                            (Save ${{ number_format($product->offprice - $product->price, 2) }} USD)
                        </h6>
                        <h4 class="mb-4">
                            Price:
                            <b>${{ number_format($product->price, 2) }} USD</b>
                            <span class="text-muted me-2">
                                <del>${{ number_format($product->offprice, 2) }} USD</del>
                            </span>

                        </h4>

                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add to Wishlist</button>
                        </form>

                     <!-- Add to Cart Button -->
                     <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>



                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="container">
    <h6 class="mt-4 mb-3">Description</h6>
    <div class="card">
        <div class="card-body mb-6">
            <p class="card-text">{{ $product->description }}</p>
        </div>
    </div>
</div>


<br><br><br><br>

<footer>
    @include('components.footer')
</footer>
@livewireScripts
<!-- Bootstrap JS and Custom Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Function to toggle custom size input
    function toggleCustomSize(select) {
        const customSizeContainer = document.getElementById('customSizeContainer');
        if (select.value === 'custom') {
            customSizeContainer.style.display = 'block';
        } else {
            customSizeContainer.style.display = 'none';
        }
    }

    // Function to show custom color input
    function showCustomColorInput(select) {
        const customColorInput = document.getElementById('custom_color');
        if (select.value === 'custom') {
            customColorInput.style.display = 'block';
            customColorInput.setAttribute('name', 'color');
        } else {
            customColorInput.style.display = 'none';
            customColorInput.removeAttribute('name');
        }
    }

    // Function to change main image when clicking on small images
    function changeImage(smallImg) {
        const mainImage = document.getElementById('mainImage');
        mainImage.src = smallImg.src;
    }
</script>

</body>
</html>
