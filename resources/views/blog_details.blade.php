<?php
header("X-Robots-Tag:index, follow");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @if(isset($blog) && is_object($blog))
    <!-- Your custom meta tags go here -->
    <title>{!! $blog->meta_title !!}</title>
    <link rel="canonical" href="https://deals69.com/blog-details/{{ Str::slug($blog->title) }}">
    <meta name="description" content="{!! $blog->meta_description !!}">
    <meta name="keywords" content="{!! $blog->meta_keyword !!}">
    <meta name="author" content="Najeeb-ullah khan">
    <meta name="robots" content="index, follow">
    @else
    <link rel="canonical" href="https://honeycombdeals.com">
    @endif

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <style>
        body{
            margin: 0;
            padding: 0;
        }
        h1.text {
      color: brown;
      text-align: center; /* Centering the main title */
      margin-bottom: 30px;
    }
        .contain{
            margin: 5%;
    
            padding-left: 0;
        }
        /* Custom CSS for responsive adjustments */
        .blog-post img {
            width: 100%;
            height: auto;
        }
        .card-title {
            font-size: 1.5rem;
        }
        .card-body p {
            font-size: 1rem;
        }
        .blog-content p {
        font-size: 1rem;
        line-height: 1.6;
    }

    /* Image styling for responsive scaling */
    .blog-content img {
        width: 100%;
        height: auto;
        margin: 15px 0;
        border-radius: 5px;
    }

    /* Heading styling */
    .blog-content h2,
    .blog-content h3 {
        font-weight: bold;
        margin-top: 1.5rem;
        font-size: 1.5rem;
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 768px) {
        .blog-content p {
            font-size: 0.9rem;
            line-height: 1.5;
        }
        .blog-content h2,
        .blog-content h3 {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 576px) {
        .blog-content p {
            font-size: 0.85rem;
        }
        .blog-content h2,
        .blog-content h3 {
            font-size: 1.1rem;
        }
    }

        /* Small screen adjustments */
        @media (max-width: 768px) {
            .card-title {
                font-size: 1.25rem;
            }
            .card-body p {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>
    <br>
    <h1 class="text">{{ ucwords($blog->title) }}</h1>
    <div class="contain">
        <div class="row justify-content-start">
            <div class="col-12 col-md-12 mb-4">
                <div class="blog-post card shadow rounded-lg border border-light">
                    <img class="img-fluid" src="{{ asset($blog->category_image) }}" alt="Blog Image">
                    <div class="card-body">
                        <h1 class="card-title text-3xl font-semibold text-gray-800 mb-4">{{ $blog->title }}</h1>
                        
                        <div class="blog-content">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</body>
</html>
