<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Premium Jacket - Shopping Hacks & Tricks | Blog</title>
  <meta name="description" content="Discover unbeatable deals, discounts, and coupons at Deals69. Save money on your favorite products from top brands. Start saving today!">
  <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">
  <meta name="author" content="John Doe">
  <meta name="robots" content="index, follow">

  <link rel="canonical" href="https://deals69.com/blog">
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: white;
    }

    h1.text {
      color: brown;
      text-align: center; /* Centering the main title */
      margin-bottom: 30px;
    }

    /* Blog post styles */
    .blog-post {
      background-color: #fff;
      margin-bottom: 30px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .blog-post:hover {
      transform: translateY(-5px);
    }

    .blog-post img {
      max-width: 100%;
      height: auto;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    .post-content {
      padding: 20px;
    }

    .post-content h2 {
      color: #333;
      font-size: 1.5rem;
      margin-bottom: 10px;
    }

    /* Sidebar styles */
    .sidebar {
      background-color: #343a40;
      color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 30px; /* Ensures the sidebar is separated from the blog */
    }

    .sidebar h3 {
      color: #fff;
      margin-bottom: 20px;
      font-size: 1.2rem;
    }

    .sidebar a {
      color: #fff;
      text-decoration: none;
    }

    .sidebar a:hover {
      color: #ccc;
    }

    /* Product container for the sidebar */
    .product-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
    }

    .img-product {
      width: 100%;
      max-width: 200px; 
      height: auto;
      max-height: 150px;
      border-radius: 5px;
    }

    .product-info {
      padding: 10px;
      background-color: #f8f9fa;
      text-align: center;
      margin-top: 10px;
      border-radius: 5px;
    }

    .product-name {
   
      font-size: 10px;
      font-weight: bold;
      word-wrap: break-word;
    }

    /* Custom pagination */
    .custom-pagination {
      display: flex;
      justify-content: center;
      list-style-type: none;
      padding: 0;
    }

    .custom-pagination a {
      padding: 10px 15px;
      color: #007bff;
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: 5px;
      transition: all 0.3s;
    }

    .custom-pagination a:hover, .custom-pagination .active a {
      background-color: #007bff;
      color: white;
    }

    /* Responsive layout for small screens */
    @media (max-width: 768px) {
      .post-content h2 {
        font-size: 1.2rem;
      }

      .sidebar {
        margin-top: 20px;
      }
    }
  </style>
</head>
<body>
  <nav>
    @include('components.navbar')
  </nav>
<br>
  <div class="container">
    <div class="row">
      <h1 class="text">Shopping Hacks & Savings Tips & Tricks</h1>

      <!-- Blog Content Column -->
      <div class="col-md-8 col-12">
        <div class="row">
          @if ($blogs->isEmpty())
            <span>No blog found</span>
          @else
            @foreach ($blogs as $blog)
              <div class="col-12 mb-4">
                <a href="{{ $blog->slug ? route('blog-details', ['slug' => Str::slug($blog->slug)]) : 'javascript:;' }}" class="blog-post">
                  <img src="{{ asset($blog->category_image) }}" alt="Blog Post Image" class="img-fluid" loading="lazy">
                  <div class="post-content">
                    <h2>{{ $blog->title }}</h2>
                  </div>
                </a>
              </div>
            @endforeach
          @endif
        </div>
      </div>

      <!-- Sidebar Column -->
      <aside class="col-md-4 col-12 sidebar">
        <h3>Latest Products</h3>
        <div class="row gx-2 gy-2">
          @foreach ($chunks as $store)
            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
              <a href="{{ route('product_details', ['slug' => Str::slug($store->slug)]) }}" class="text text-dark d-flex flex-column p-2">
                @php
                  $images = json_decode($store->productimage);
                @endphp
                <div class="product-container">
                  <img src="{{ asset($images ? $images[0] : 'front/assets/images/no-image-found.jpg') }}" alt="Product Image" class="img-product img-thumbnail stores shadow">
                  <div class="product-info">
                    <p class="product-name">{{ $store->name }}</p>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </aside>
    </div>
  </div>

  {{ $blogs->links('vendor.pagination.custom') }}

  <footer>
    @include('components.footer')
  </footer>
</body>
</html>
