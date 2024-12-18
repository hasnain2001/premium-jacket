<?php
header("X-Robots-Tag:index, follow");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Featured Product | Premium Leather Jackets | Stylish & Durable Outerwear </title>

    <meta name="description" content="Explore a wide range of premium leather jackets for men and women. feature stylish, durable outerwear and elevate your fashion with top-quality designs.">


    <meta name="keywords" content="leather jackets, premium jackets, men's jackets, women's jackets, stylish outerwear, durable jackets, fashion, leatherwear">

    <meta name="author" content="Premium Leather Style">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.premiumleatherstyle.com/product">

<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PDLGRGJN3V"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PDLGRGJN3V');
</script>

  <style>
.nav-logo,.shop-text,.text{color:#fff}.nav-logo{font-size:44px;font-weight:300;text-decoration:none}nav{background-color:#000;height:auto}.conain{background-position:center;background-size:cover;background-repeat:no-repeat;background-image:url('{{ asset('images/banner.jpg') }}');height:200px;max-height:350px}.shop-text{text-align:center;padding-top:8%;font-size:3rem;font-weight:600;text-shadow:2px 2px 5px rgba(0,0,0,.5)}.product{height:200px;object-fit:cover}.card{transition:transform .3s,box-shadow .3s}.card:hover{box-shadow:0 10px 20px rgba(0,0,0,.2)}.btn-dark{background-color:#343a40;border:none;transition:background-color .3s,transform .3s}.btn-dark:hover{background-color:#23272b;transform:translateY(-3px)}@media (max-width:767.98px){.col-md-6{flex:0 0 50%;max-width:50%}}
.breadcrumb-item a {
  font-weight: 500;
  color: #007bff; /* Custom link color */
}

.breadcrumb-item a:hover {
  color: #0056b3;
  text-decoration: underline;
}

.breadcrumb .fas {
  margin-right: 5px; /* Adds space between icons and text */
  color: #6c757d;
}
  </style>
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>
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
<div class="conain">
    <h1 class="shop-text" style="color: #f1c876;">feature</h1>
</div>
<header class="bg-light py-3 px-4 rounded shadow-sm" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item">
        <a href="/" class="text-decoration-none text-primary">
          <i class="fas fa-home"></i> Home
        </a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('feature')}}" class="text-decoration-none text-primary"  >
            <i class="fas fa-featureping-cart"></i>feature
        </a>
      </li>
    
    </ol>
  </header>
   
    <br>
    <p class="h5 m-3 font-weight-bold text-center text-dark text-capitalize">Total feature product: <span class="fw-bold">{{ $products->count() }}</span></p>
    <br>
    <div class="container">
        <div class="row">
            @if ($products->isEmpty())
                <div class="alert alert-success text-center" role="alert">
                    <h4 class="alert-heading">Sorry!</h4>
                    <p>No products available at the moment. Please check back later.</p>
                    <hr>
                    <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
                </div>
            @else
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5th">
                        <div class="card mb-4 shadow-sm h-100">
                            <div class="card-header p-0">
                                <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}">
                                    @php
                                        $images = json_decode($product->productimage);
                                    @endphp
                                    @if(is_array($images) && !empty($images))
                                        <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid shadow product">
                                    @else
                                        <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-fluid shadow rounded-circle">
                                    @endif
                                </a>
                            </div>
                            <div class="card-body d-flex flex-column">
                             <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                    <span class="fw-bold mb-1 text-truncate" style="max-width: 100%;">{{ ucwords($product->name) }}</span>
                                    <b>{{ number_format($product->price, 2) }} PKR</b>
                                    @if($product->offprice)
                                        <span class="text-muted me-2">
                                            <del>{{ number_format($product->offprice, 2) }} PKR</del>
                                        </span>
                                    @endif
                                  
                                </div>
                                <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark mt-auto">View Product</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @endif
        </div>
    </div>

    <br>


<br>

<footer>
    @include('components.footer')
</footer>
      <script>
        function clickimg(smallimg){
            var fullimg=document.getElementById("imagebox")
            fullimg. src = smallimg.src
        }

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-search-btn').click(function() {
                $('.form-control').toggle('slow'); // Toggle the search input with a sliding effect (you can change 'slow' to 'fast' or a number in milliseconds)
            });
        });

        document.getElementById('cartForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Get the action URL
            var actionUrl = this.getAttribute('action');

            // Redirect to the action URL
            window.location.href = actionUrl;
        });

    </script>

</body>
</html>
