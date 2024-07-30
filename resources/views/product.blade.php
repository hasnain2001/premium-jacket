<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>

<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
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
         height:400px;
        }
        .shop-text{
            text-align: center;
            color: white;
            padding-top: 15%;
        }
  </style>
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>



    <div class="conain">

        <h1 class="shop-text">Shop</h1>
    </div>
<br>
    <p class="h5 m-3 font-weight-bold    text-center text-dark">Total Product: <span class="fw-bold">{{ $products->total() }}</span></p>
    <br>
    <div class="container">
        <div class="row">
            @if ($products->isEmpty())
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Sorry!</h4>
                <p>No products available at the moment. Please check back later.</p>
                <hr>
                <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
            </div>
        @else
        <div class="row">
            @foreach ($products as $product)

                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm h-100">
                        <div class="card-header p-0">
                            @php
                                $images = json_decode($product->productimage);
                            @endphp
                            @if(is_array($images) && !empty($images))
                                <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid shadow product" style="height: 200px;">
                            @else
                                <img src="{{ asset('front/assets/images/no-image-found.jpg') }}" alt="No Image" class="img-fluid stores shadow rounded-circle">
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark mt-auto">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @endif

        </div>
    </div>

    <div class="container bg-light mt-3">
        <div class="row mt-3 justify-content-end">
          <div class="col-12">
            {{ $products->links('pagination::bootstrap-4') }} </div>
        </div>
      </div>



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
