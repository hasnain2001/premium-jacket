<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search rESULT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>
    <br><br><br><br><br>
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
                <div class=" col-6 col-md-3"> <!-- col-6 for mobile (2 items per row), col-md-3 for desktop (4 items per row) -->
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
                            <h5 class="card-title text-dark">{{ $product->name }}</h5>
        
                            <a href="{{ route('product_details', ['slug' => $product->slug]) }}" class="btn btn-dark">View Details</a>
        
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        

        @endif

        </div>
    </div>

    <footer>
        @include('components.footer')
    </footer>
</body>
</html>
