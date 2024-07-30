<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-header {
            text-align: center;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-text {
            margin-bottom: 0.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>

</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>
    <br><br><br><br>




    <div class="container">
        <h1>{{ $name }}</h1>
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
                    <div class="col-md-4">
                        <div class="card mb-5 shadow-sm">
                            <div class="card-img-top">
                                @php
                                    $images = json_decode($product->productimage);
                                @endphp
                                @if(is_array($images) && !empty($images))
                                    <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid rounded-top">
                                @else
                                    <img src="{{ asset('front/assets/images/no-image-found.jpg') }}" alt="No Image" class="img-fluid rounded-circle">
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>

                                <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</body>
</html>
