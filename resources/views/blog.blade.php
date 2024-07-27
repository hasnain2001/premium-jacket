<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Your custom meta tags go here -->
     <title>Premium Jacket - Shopping Hacks & Tricks |Blog</title>
<meta name="description" content="Discover unbeatable deals, discounts, and coupons at Deals69. Save money on your favorite products from top brands. Start saving today!">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://deals69.com/blog">
<link rel="icon" href="{{ asset('images/icons.png') }}" type="image/x-icon">
  <!-- Bootstrap CSS -->
   
   <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Custom CSS -->

  <style>
 body{
  margin: 0;
  padding: 0;
  background-color: white;

 }
 .text{
  color: brown;
 }
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
    .blog-post .post-content {
      padding: 20px;
    }
    .blog-post .post-content h2 {
      color: #333;
      margin-bottom: 10px;
    }
    .blog-post .post-content p {
      color: #666;
      margin-bottom: 20px;
    }
    .btn-read-more {
      background-color: #343a40;
      color: #fff;
      border: none;
      padding: 8px 20px;
      border-radius: 20px;
      text-transform: uppercase;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    .btn-read-more:hover {
      background-color: #23272b;
    }
    .sidebar {
      background-color: #343a40;
      color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .sidebar h3 {
      color: #fff;
      margin-bottom: 20px;
    }
    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar li {
      margin-bottom: 10px;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
    }
    .sidebar a:hover {
      color: #ccc;
    }
    .img{
        width: 250px;
        height: 200;
        border-radius:5%;
    }



    .custom-pagination {
      display: flex;
      justify-content: center;
      list-style-type: none;
      padding: 0;
    }

    .custom-pagination li {
      margin: 0 5px;
    }

    .custom-pagination a {
      display: block;
      padding: 10px 15px;
      color: #007bff;
      text-decoration: none;
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
      border-radius: 5px;
      transition: all 0.3s;
    }

    .custom-pagination a:hover {
      background-color: #007bff;
      color: white;
    }

    .custom-pagination .active a {
      background-color: #007bff;
      color: white;
      border-color: #007bff;
    }

    .custom-pagination .disabled a {
      color: #6c757d;
      pointer-events: none;
      background-color: #e9ecef;
      border-color: #dee2e6;
    }
    .text{
      text-decoration:none; 
    }
  </style>
</head>
<body>
  <nav>
    @include('components.navbar')
</nav>
<br><br>

<div class="container">
  <div class="row">
      <h1 class="text">Shopping Hacks & Savings Tips & Tricks</h1>
      <div class="col-md-8">
          
          <!-- Blog posts -->
          <div class="row">
          
@if ($blogs->isEmpty())
    <span>no blog Found</span>
 
        
    @else
        
  

       
              @foreach ($blogs as $blog)
              @if ($blog->slug)
         <a href="{{ route('blog-details', ['slug' => Str::slug($blog->slug)]) }}" class="col-md-12 mb-4">


                  @else
                  <a href="javascript:;" class="btn btn-darkcol-md-12 mb-4 text-decoration-none">no Slug</a>
                      @endif
                      <div class="blog-post">
                          <img src="{{ asset($blog->category_image) }}" alt="Blog Post Image" style="width: 1000px; height: 400px;" loading="lazy">
                          <div class="post-content">
                              <h2>{{ $blog->title }}</h2>

                              <!-- Add more fields as needed -->
                          </div>
                      </div>
                  </a>
                  @endforeach
                  @endif
               
          </div>
          <div class="container bg-light mt-3">
            <div class="row mt-3 justify-content-end">
              <div class="col-12">
                {{ $blogs->links('pagination::bootstrap-4') }} 
              </div>
            </div>
          </div>

      </div>
      <div class="col-md-4">
        <aside class="sidebar p-3 bg-light">
            <!-- Sidebar Title -->
            <h2 class="text-left text">Latest Products</h2>
            
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
                                <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid stores shadow" loading="lazy">
                            @else
                                <img src="{{ asset('front/assets/images/no-image-found.jpg') }}" alt="No Image" class="img-fluid stores shadow rounded-circle">
                            @endif
                            
                            <!-- Store Name -->
                            <p class="text-capitalize">{{ $store->name }}</p>
                          </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>
    </div>
    
    </aside>
  </div>
  </div>
</div>


      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
