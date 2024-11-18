<?php
    header("X-Robots-Tag:index, follow");?>
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @foreach ($genders as $gender)
    <title>{{ $gender->title }}</title>
    <link rel="canonical" href="http://127.0.0.1:8000/gender/{{ Str::slug($gender->slug) }}">
    <meta name="description" content="{!! $gender->meta_description !!}">

<meta name="keywords" content="{!! $gender->meta_keyword !!}">
<meta name="author" content="john">
<meta name="robots" content="index, follow">
@endforeach


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


  </head>
  <body>
    <nav>
        @include('components.navbar')
    </nav>
   <br><br>

<div class="container">
    <h1>{{ $name }}</h1>
    <div class="row">
        @if ($categories->isEmpty())
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Sorry!</h4>
                <p>No products available at the moment. Please check back later.</p>
                <hr>
                <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
            </div>
        @else
            @foreach ($categories as $product)
                <div class="col-md-4">
                    <div class="card mb-5 shadow-sm">

                        <div class="card-body">
                            <a href="{{ route('category_details', ['slug' => Str::slug($product->slug)]) }}">
 <h5 class="card-title text-dark">{{ $product->title }}</h5>
                            </a>







                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<x-footer/>


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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
