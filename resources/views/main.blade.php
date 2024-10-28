@extends('welcome')

@section('main-content')


<style>
@import url(https://fonts.googleapis.com/css?family=Lato:100&display=swap);.button-read,.center{display:flex;position:relative}.button-read,.button-read:hover{text-decoration:none;color:#fff}.center{width:180px;height:60px;justify-content:center;align-items:center}.button-read{justify-content:center;align-items:center;width:140px;height:40px;cursor:pointer;background:brown;border:2px solid #fff;border-radius:20px;outline:0;font-size:18px;font-weight:700;overflow:hidden;transition:background 3.3s,color .3s}.button-read:hover{background:#951d1d}.button-read svg{position:absolute;left:0;top:0;width:100%;height:100%;fill:none;stroke:#fff;stroke-width:2;stroke-dasharray:150 480;stroke-dashoffset:150;transition:stroke-dashoffset 3.4s ease-in-out}.button-read:hover svg{stroke-dashoffset:-480}.button-read span{position:relative;z-index:1}.product-img-container{overflow:hidden;height:300px}.product-img{padding:10px;height:100%;width:auto;object-fit:cover;object-position:center}.card-img{border-radius:5%}
  .btn-attractive {
        background-color: #5a67d8; /* Custom purple background */
        color: white;
        border-radius: 25px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.3s ease-in-out;
    }

    .btn-attractive:hover {
        background-color: white;
        color: #5a67d8;
        border: 2px solid #5a67d8;
    }

    .card-footer {
        display: flex;
        justify-content: center;
        align-items: flex-end;
        height: 100%;
    }


</style>
<!-- Carousel Start -->
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slider2.jpeg') }}" class="slider-image " alt="...">

        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider1.jpeg') }}" class="slider-image " alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider.jpeg') }}" class="slider-image " alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider3.jpeg') }}" class="slider-image " alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<hr>
<!-- Carousel End -->
<div class="container">
    <div class="header">
      <h1>Premium Jackets. Dutch Designed, Sustainably Made</h1>
      <div class="line">
        <hr>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="Feeling">
          <span>Feeling Free</span>
          <p>Searching for a premium leather style for men? Hide leather style has been writing history in leather jackets since 1860. As fashion evolved, so did we. Now more than 150 years later and 2500 points of sale further, we feel that it is time to profile ourselves. Donders 1860: the producer of real leather jackets.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card1" style="background-image: url('{{ asset('images/image1.jpeg') }}'); background-size: cover; background-position: center; height: 260px; position: relative;">
            <a href="https://www.premiumleatherstyle.com/category/men-bomber-jacket" class="text-dark text-decoration-none">
              <div class="card-content" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%;">
                <span class="card-product">BOMBER JACKET</span>
                <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
              </div>
            </a>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card card2" style="background-image: url('{{ asset('images/image2.jpeg') }}'); background-size: cover; background-position: center; height: 260px; position: relative;">
            <a href="https://www.premiumleatherstyle.com/category/men-varsity-jackets" class="text-dark text-decoration-none">
              <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%;">
                <span class="card-product">VARSITY JACKET</span>
                <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
              </div>
            </a>
        </div>
    </div>
    
      <div class="col-md-3">
        <div class="card" style="background-image: url('{{ asset('images/image6.jpeg') }}'); background-size: cover; background-position: center; height: 260px; position: relative;">
         <a href="{{ route('product') }}" class="text-dark text-decoration-none">
 
            <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%;text-align:center;">
            <span class="card-product ">SALE</span>
            <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
          </div></a>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-4">
        <div class="card" style="background-image: url('{{ asset('images/image3.jpeg') }}'); background-size: cover; background-position: center; height: 260px; position: relative;">
          
            <a href="{{ route('blog') }}" class="text-dark text-decoration-none">
                <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%; text-align:center;" >
            <span class="card-product">BLOG</span>
            <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
          </div></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="background-image: url('{{ asset('images/image4.jpeg') }}'); background-size: cover; background-position: center; height: 260px; position: relative;">
            <a href="{{ route('about') }}">
         
          <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%; text-align:center;" >
            <span class="card-product">OUR STORIES</span>
            <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
          </div></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="background-image: url('{{ asset('images/image5.jpeg') }}'); background-size: cover; background-position: center; height: 260px; position: relative;">
            <a href="{{route('contact')}}">
            
                <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%; text-align:center;" >
                    <span class="card-product">CONTACT</span>
                    <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
                </div>
            </a>
        </div>
      </div>
    </div>
  </div>

  <div class="line">
    <hr>
  </div>

  <div class="container mt-5">
    <!-- Heading Section -->
    <div class="row mb-4">
        <div class="col text-center">
            <h2 class="text-brown">Trending Product</h2>
        </div>
    </div>

    <!-- Check if there are no products -->
@if ($products->isEmpty())
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Sorry!</h4>
        <p>No products available at the moment. Please check back later.</p>
        <hr>
        <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
    </div>
@else
<!-- Carousel for displaying products -->
<div id="storeCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Carousel Indicators -->
    <div class="carousel-indicators">
        @foreach ($products->chunk(3) as $key => $chunk)
            <button type="button" data-bs-target="#storeCarousel" data-bs-slide-to="{{ $key }}" class="bg-dark {{ $key === 0 ? 'active' : '' }}" aria-current="{{ $key === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
        @endforeach
    </div>

    <!-- Carousel Inner -->
    <div class="carousel-inner">
        <!-- Loop through products in chunks of 3 -->
        @foreach ($products->chunk(3) as $key => $chunk)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <div class="row">
                    <!-- Loop through each product in the chunk -->
                    @foreach ($chunk as $product)
                        <!-- Adjust column classes for 2 per row on mobile and 3 per row on larger screens -->
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center">
                            <div class="card product-card shadow" style="width: 18rem;">
                                @php
                                    $images = json_decode($product->productimage);
                                @endphp
                                <!-- Display product image with cropped view -->
                                @if(is_array($images) && !empty($images))
                                    <div class="product-img-container">
                                        <img src="{{ asset($images[0]) }}" alt="Product Image" class="card-img-top product-img text-center" style="" loading="lazy">
                                    </div>
                                @else
                                    <div class="product-img-container">
                                        <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="card-img-top img-fluid" loading="lazy">
                                    </div>
                                @endif
                                <div class="card-body text-center">
                                    <span class="card-title">{{ $product->name }}</span>
                                    <b>${{ number_format($product->price, 2) }} USD</b>
                                    @if($product->offprice)
                                        <span class="text-muted me-2">
                                            <del>${{ number_format($product->offprice, 2) }} USD</del>
                                        </span>
                                    @endif
                                </div>
                                <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark">View Product</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Carousel controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#storeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#storeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

@endif



   <!-- store slider end -->


<div class="line">
    <hr>
  </div>
<!-- About Section Start -->
<div class="about_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about_img"><img src="{{ asset('images/about.jpg') }}" class="img-fluid rounded" alt="About Us Image"></div>
            </div>
            <div class="col-lg-6">
                <h2 class="about_taital">About Us</h2>
                <p class="about_text">We are a premier store offering a wide range of products to meet all your needs. Our mission is to provide high-quality items at affordable prices with exceptional customer service. Whether you're shopping for the latest trends or everyday essentials, we've got you covered. Our team is dedicated to ensuring that your shopping experience is smooth and enjoyable. We continually strive to expand our product offerings, stay ahead of market trends, and bring you the best deals. Trust us to be your one-stop destination for all your shopping needs. Your satisfaction is our top priority, and we're always here to assist you.</p>



                <div class="center">
                    <a href="{{ route('about') }}" class="button-read">
                      <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                        <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                        <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                      </svg>
                      <span>Read Me</span>
                    </a>
                  </div>



            </div>
        </div>
    </div>
</div>
<!-- About Section End -->
<div class="line">
    <hr>
  </div>
<!-- Customer Testimonials Start -->
<div class="customer_section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="fw-bold mb-4">What Our Customers Say</h2>
                <p class="text-muted">Real feedback from our valued customers</p>
            </div>
        </div>
        <div class="row mt-4">
            <div id="customerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Testimonial 1 -->
                    <div class="carousel-item active">
                        <div class="customer_main d-flex align-items-center">
                            <div class="customer_left">
                                <div class="customer_img">
                                    <img src="{{ asset('images/client-2.jpg') }}" class="img-fluid rounded-circle shadow" alt="Customer Image">
                                </div>
                            </div>
                            <div class="customer_right ms-4">
                                <h3 class="customer_name">Emily</h3>
                                <p class="customer_text">"I've been a loyal customer for years and every experience has been fantastic. The customer service is exceptional, and I always feel valued!"</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="carousel-item">
                        <div class="customer_main d-flex align-items-center">
                            <div class="customer_left">
                                <div class="customer_img">
                                    <img src="{{ asset('images/clinet-1.jpg') }}" class="img-fluid rounded-circle shadow" alt="Customer Image">
                                </div>
                            </div>
                            <div class="customer_right ms-4">
                                <h3 class="customer_name">John</h3>
                                <p class="customer_text">"This company goes above and beyond to ensure their customers are satisfied. Fast service, quality products, and a friendly team. Highly recommend!"</p>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div class="carousel-item">
                        <div class="customer_main d-flex align-items-center">
                            <div class="customer_left">
                                <div class="customer_img">
                                    <img src="{{ asset('images/clent-3.jpg') }}" class="img-fluid rounded-circle shadow" alt="Customer Image">
                                </div>
                            </div>
                            <div class="customer_right ms-4">
                                <h3 class="customer_name">Taylor swift</h3>
                                <p class="customer_text">"Excellent service and a wonderful experience every time. I truly appreciate the attention to detail and the personalized care I receive."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#customerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#customerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Customer Testimonials End -->

<div class="line">
    <hr>
  </div>
<!-- News Section Start -->
<div class="news_section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="text">Latest News</h3>
            </div>
        </div>
        <div id="newsCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach ($blogs->chunk(3) as $index => $chunk)
                    <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @if ($blogs->isEmpty())
                    <div class="carousel-item active">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Sorry!</h4>
                            <p>No Blogs available at the moment. Please check back later.</p>
                            <hr>
                            <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
                        </div>
                    </div>
                @else
                    @foreach ($blogs->chunk(3) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $blog)
                                    <!-- Adjust column classes for 2 per row on mobile and 3 per row on larger screens -->
                                    <div class="col-6 col-md-4 mb-4">
                                        <div class="card h-100">
                                            @if ($blog->category_image)
                                                <img src="{{ asset($blog->category_image) }}" class="card-img-top" alt="{{ $blog->title }}">
                                            @else
                                                <img src="{{ asset('images/No-image-available.jpg') }}" class="card-img-top" alt="No Image Available" loading="lazy">
                                            @endif
                                            <div class="card-body">
                                                <span class="card-title">{{ $blog->title }}</span>
                                            </div>
                                            <div class="card-footer text-center d-flex justify-content-center align-items-end">
                                                @if ($blog->slug)
                                                    <a href="{{ route('blog-details', ['slug' => Str::slug($blog->slug)]) }}" class="btn btn-attractive btn-dark">Read More</a>
                                                @else
                                                    <a href="#" class="btn  btn-dark">Read More</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<!-- News Section End -->



@endsection
