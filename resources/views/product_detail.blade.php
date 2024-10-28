<?php
header("X-Robots-Tag:index, follow");?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->title }}</title>
    <link rel="canonical" href="https://www.premiumleatherstyle.com/product/{{ Str::slug($product->slug) }}">
         <meta name="description" content="{!! $product->meta_description !!}">

  <meta name="keywords" content="{!! $product->meta_keyword !!}">
    <meta name="author" content="john">
  <meta name="robots" content="index, follow">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .nav-logo {
            font-size: 44px;
            font-weight: 300;
            color: white;
            text-decoration: none;
        }
        nav {
            background-color: black;
        }
        .conain {
            background-position: center;
            background-image: url('{{ asset('images/banner.jpg') }}');
            background-size: cover;
            height: 200px;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .shop-text {
            font-size: 2.5rem;
            font-weight: bold;
        }
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
        .card-title {
            font-size: 1.5rem;
        }
        .card-body {
            padding: 1.5rem;
        }

.image-selector {
    display: flex;
    gap: 10px; /* Adjust as needed */
}

.product-color {
    width: 50px; /* Adjust as needed */
    height: 50px; /* Adjust as needed */
    cursor: pointer;
    border: 2px solid transparent; /* Default border */
    border-radius: 5px; /* Optional: rounded corners */
    transition: border-color 0.3s ease;
}

.product-color:hover {
    border-color: #888; /* Optional: hover effect */
}

.product-color.active {
    border-color: #007bff; /* Active selection border color */
}

.feature-icons {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 20px;
    background-color: #f8f9fa; /* Light background */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.feature-icon {
    text-align: center;
    flex: 1;
}

.feature-icon i {
    font-size: 2rem; /* Larger icon size */
    color: black;
    margin-bottom: 10px; /* Spacing below the icon */
    transition: color 0.3s ease; /* Smooth color transition */
}

.feature-icon span {
    display: block;
    font-size: 1.1rem; /* Slightly larger text */
    color: #333; /* Text color */
    font-weight: bold; /* Bold text */
}

.feature-icon:hover i {
    color: #0056b3; /* Darker icon color on hover */
}

.text-danger {
    color: #dc3545; /* Red color */
}

.text-warning {
    color: #ffc107; /* Yellow color */
}

.btn-cart {
    background-color: #951d1d;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 20%;
    box-shadow: 0 4px 6px rgb(192, 11, 11);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-cart:hover {
    background-color: brown;
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}

.modal-content {
    border-radius: 10px;
    overflow: hidden;
}

.modal-header {
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
}

.modal-body {
    padding: 2rem;
}

.badge {
    font-size: 1.2rem;
    padding: 0.5rem 1rem;
    margin-bottom: 1rem;
}

.img-fluid {
    max-width: 100%;
    height: auto;
    transition: transform 0.2s;
}



.btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 20px;
    padding: 0.5rem 2rem;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

                                    .product-color {
                                        width: 50px;
                                        height: 50px;
                                        cursor: pointer;
                                        border: 2px solid transparent;
                                        border-radius: 50%;
                                    }

                                    .product-color.active {
                                        border: 2px solid black;
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

    <div class="container mt-4">
        <h1 class="card bg-dark text-white text-center py-2 mb-4">{{$product->name}}</h1>

        <!-- Alerts for Success and Error -->
        @if (session('success'))
            <div class="alert alert-success">

               {{ $product->name }} :{{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Product Section -->
        <div class="row">
            <div class="col-lg-6 mb-4">
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
                                            <img src="{{ asset('images/No-image-available.jpg') }}" alt="" class="img-fluid">
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
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="text-dark text-uppercase">
           {{ number_format((($product->offprice - $product->price) / $product->offprice) * 100, 2) }}% Off
                                    (Save ${{ number_format($product->offprice - $product->price, 2) }} USD)
                                </span>
                                <span class="text-right">
                                    <i class="fas fa-shipping-fast"></i> Estimated delivery Time In 10 Days
                                </span>
                            </div>

                            <h4 class="mb-4">
                                Price:
                                <b>${{ number_format($product->price, 2) }} USD</b>
                                <span class="text-muted me-2">
                                    <del>${{ number_format($product->offprice, 2) }} USD</del>
                                </span>
                            </h4>

                            <h4 class="mb-4
                                @if ($product->quantity == 0)
                                    text-danger
                                @elseif ($product->quantity < 10)
                                    text-warning
                                @endif
                            ">
                                @if ($product->quantity == 0)
                                    Out of Stock
                                @else
                                    Stock: {{ $product->quantity }}
                                @endif
                            </h4>

                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">
                                    Size Guide
                                </button>
                                <div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="sizeGuideModalLabel">Size Guide</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 text-center">
                                                    <span class="badge bg-secondary">Inches</span>
                                                    <img id="inchesImage" src="{{ asset('images/size-guide-inches.png') }}" alt="Size Guide Inches" class="img-fluid rounded shadow-sm">
                                                </div>
                                                <div class="text-center" style="display: none;" id="cmSection">
                                                    <span class="badge bg-secondary">CM</span>
                                                    <img id="cmImage" src="{{ asset('images/size-guide-cm.png') }}" alt="Size Guide CM" class="img-fluid rounded shadow-sm">
                                                </div>
                                                <div class="text-center mt-4">
                                                    <button type="button" class="btn btn-primary" onclick="toggleImage()">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <br>
                                <h5 class="">Colors</h5>
                                <hr>
                                <div class="image-selector">
                                    <!-- Color options as images -->
                                    <img src="{{ asset('images/black.jfif') }}" class="product-color active" alt="black" data-color="black" onclick="selectColor('black')">
                                    <img src="{{ asset('images/brown.png') }}" class="product-color" alt="brown" data-color="brown" onclick="selectColor('brown')">

                                    <!-- Hidden input to store the selected color value -->
                                    <input type="hidden" id="selected-color" name="color" value="black">
                                </div>

                                <script>
                                    // Function to select color when an image is clicked
                                    function selectColor(color) {
                                        // Set the hidden input's value to the selected color
                                        document.getElementById('selected-color').value = color;

                                        // Remove 'active' class from all images
                                        var colorImages = document.querySelectorAll('.product-color');
                                        colorImages.forEach(function(img) {
                                            img.classList.remove('active');
                                        });

                                        // Add 'active' class to the clicked image
                                        document.querySelector('img[data-color="' + color + '"]').classList.add('active');
                                    }
                                </script>



                                <hr>
                                <h5 class="">Sizes</h5>
                                <select name="size" class="form-select" aria-label="Default select example" required>
                                    <option selected disabled value="">Select Size</option>
                                    <option value="S (US 4-6)">S (US 4-6)</option>
                                    <option value="M (US 8-10)">M (US 8-10)</option>
                                    <option value="L (US 12-14)">L (US 12-14)</option>
                                    <option value="XL (US 16-18)">XL (US 16-18)</option>
                                    <option value="2XL">2XL</option>
                                    <option value="3XL">3XL</option>
                                    <option value="4XL">4XL</option>
                                    <option value="5XL">5XL</option>
                                </select>

                                <hr>
                                <span class="text-dark font-weight-bold">Add</span>
                                <input type="number" name="quantity" min="1" max="{{ $product->quantity }}" style="width: 70px;" required>

                                <hr>
                                <div class="d-flex">

                                        <button type="submit" class="btn-cart">Add to Cart</button>
                                    </form>

                                    {{-- <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-dark ">Add to Wishlist</button>
                                    </form> --}}
                                </div>


                            <hr>
                            <div class="feature-icons">
                                <div class="feature-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                    <span>Free Shipping Sitewide</span>
                                </div>
                                <div class="feature-icon">
                                    <i class="fas fa-couch"></i>
                                    <span>100% Real Leather</span>
                                </div>
                                <div class="feature-icon">
                                    <i class="fas fa-undo-alt"></i>
                                    <span>30 Days Return Policy</span>
                                </div>
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>100% Secure Shopping</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div></div>

    <div class="container mt-4">
        <h6 class="mt-4 mb-3">Description</h6>
        <div class="card">
            <div class="card-body mb-6">
                <p class="card-text">{{ $product->description }}</p>
            </div>
        </div>
    </div>
 <br><br>
    <footer>
        @include('components.footer')
    </footer>


    <script>
function toggleImage() {
    var inchesImage = document.getElementById('inchesImage');
    var cmSection = document.getElementById('cmSection');

    if (inchesImage.style.display === 'none') {
        inchesImage.style.display = 'block';
        cmSection.style.display = 'none';
    } else {
        inchesImage.style.display = 'none';
        cmSection.style.display = 'block';
    }
}




const imageSelector = document.querySelector('.image-selector');
const productColors = imageSelector.querySelectorAll('.product-color');

productColors.forEach(color => {
    color.addEventListener('click', () => {
        productColors.forEach(c => c.classList.remove('active'));
        color.classList.add('active');
        // Handle selected color here, e.g., update product information
    });
});

        // Function to change main image when clicking on small images
        function changeImage(smallImg) {
            const mainImage = document.getElementById('mainImage');
            mainImage.src = smallImg.src;
        }
    </script>
</body>
</html>
