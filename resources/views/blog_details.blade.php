<?php
header("X-Robots-Tag:index, follow");?>

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
     <!-- Handle the case where $store is not valid -->
     <!-- You can display a default canonical URL or handle it in another appropriate way -->
     <link rel="canonical" href="https://honeycombdeals.com">
 @endif

   <!-- Bootstrap CSS -->
   <!-- Add Swiper CSS -->
   <link rel="stylesheet" href="{{ asset('bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 mb-4">
                <div class="blog-post card shadow rounded-lg border border-light">
                    <img class="img-fluid" src="{{ asset($blog->category_image) }}" alt="Blog Image" style="width: 100%; height: auto;">
                    <div class="card-body">
                        <h1 class="card-title text-3xl font-semibold text-gray-800 mb-4">{{ $blog->title }}</h1>
                        <p class=" ">{!! $blog->content !!}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <aside class="sidebar p-3 bg-light">
                    <!-- Sidebar Title -->
                    <h2 class="text-left text-dark">Latest Products</h2>

                    <!-- Store Listings -->
                    <div class="row gx-2 gy-2">
                        @foreach ($chunks as $store)
                            <div class="col-md-6 col-sm-4 col-6">
                                <div class="text-dark text-decoration-none d-flex flex-column p-2">
                                    <a href="{{ route('product_details', ['slug' => Str::slug($store->slug)]) }}" class="text text-dark">
                                    <!-- Store Image -->
                                    @php
                                        $images = json_decode($store->productimage);
                                    @endphp
                                    @if(is_array($images) && !empty($images))
                                        <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid stores shadow">
                                    @else
                                        <img src="{{ asset('front/assets/images/no-image-found.jpg') }}" alt="No Image" class="img-fluid stores shadow rounded-circle">
                                    @endif

                                    <!-- Store Name -->
                                    <p class="text-capitalize">{{ $store->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </a>
                    </div>
                </aside>
            </div>
        </div>
      </div>
      <x-footer/>
</body>
</html>
