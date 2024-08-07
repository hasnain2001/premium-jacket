@extends('welcome')

@section('main-content')
<link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">
<!-- Carousel Start -->
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slider.jpg') }}" class="slider" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider1.jpg') }}" class="slider" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider2.jpg') }}" class="slider" alt="...">
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
        <div class="card">
          <img src="{{ asset('images/image1.jpg') }}" class="card-img" alt="Bomber Jacket">
          <div class="overlay">
            <span class="card-product">BOMBER JACKET</span>
            <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="{{ asset('images/image2.jpg') }}" class="card-img" alt="Varsity Jacket">
          <div class="overlay">
            <span class="card-product">VARSITY JACKET</span>
            <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="{{ asset('images/image6.jfif') }}" class="card-img" alt="Sale">
          <div class="overlay">
            <span class="card-product">SALE</span>
            <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-4">
        <div class="card">
          <img src="{{ asset('images/image3.jpg') }}" class="card-img" alt="Blog">
          <div class="overlay">
            <span class="card-product">BLOG</span>
            <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="{{ asset('images/image4.jpg') }}" class="card-img" alt="Our Stories">
          <div class="overlay">
            <span class="card-product">OUR STORIES</span>
            <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="{{ asset('images/image5.jpg') }}" class="card-img" alt="Contact">
          <div class="overlay">
            <span class="card-product">CONTACT</span>
            <p>Explore a curated collection of stylish essentials tailored for the modern man.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="line">
    <hr>
  </div>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="text-brown">Trending Product</h1>
        </div>
    </div>
    @if ($products->isEmpty())
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Sorry!</h4>
        <p>No products available at the moment. Please check back later.</p>
        <hr>
        <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
    </div>
    @else
    <div id="storeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($products->chunk(3) as $key => $chunk)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($chunk as $product)
                            <div class="col-md-4 mb-4">
                                <div class="card product-card">
                                    @php
                                    $images = json_decode($product->productimage);
                                    @endphp
                                    @if(is_array($images) && !empty($images))
                                        <img src="{{ asset($images[0]) }}" alt="Product Image" class="card-img-top img-fluid" loading="lazy">
                                    @else
                                        <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="card-img-top img-fluid" loading="lazy">
                                    @endif
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark">View Product</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
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
</div>
<div class="line">
    <hr>
  </div>
<!-- About Section Start -->
<div class="about_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about_img"><img src="{{ asset('images/about.jpg') }}" class="img-fluid" alt="About Us Image"></div>
            </div>
            <div class="col-lg-6">
                <h2 class="about_taital">About Us</h2>
                <p class="about_text">We are a premier store offering a wide range of products to meet all your needs. Our mission is to provide high-quality items at affordable prices with exceptional customer service.</p>
                <div class="read_bt"><a href="{{ url('/about') }}">Read More</a></div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->
<div class="line">
    <hr>
  </div>
<!-- Customer Testimonials Start -->
<div class="customer_section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>What Our Customers Say</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div id="customerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="customer_main d-flex align-items-center">
                            <div class="customer_left">
                                <div class="customer_img"><img src="{{ asset('images/clinet-1.jpg') }}" class="img-fluid rounded-circle" alt="Customer Image"></div>
                            </div>
                            <div class="customer_right ms-4">
                                <h3 class="customer_name">Emily</h3>
                                <p class="customer_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="customer_main d-flex align-items-center">
                            <div class="customer_left">
                                <div class="customer_img"><img src="{{ asset('images/client-2.jpg') }}" class="img-fluid rounded-circle" alt="Customer Image"></div>
                            </div>
                            <div class="customer_right ms-4">
                                <h3 class="customer_name">John</h3>
                                <p class="customer_text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="customer_main d-flex align-items-center">
                            <div class="customer_left">
                                <div class="customer_img"><img src="{{ asset('images/clent-3.jpg') }}" class="img-fluid rounded-circle" alt="Customer Image"></div>
                            </div>
                            <div class="customer_right ms-4">
                                <h3 class="customer_name">Taylor</h3>
                                <p class="customer_text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    @if ($blog->category_image)
                                    <img src="{{ asset($blog->category_image) }}" class="card-img-top" alt="{{ $blog->title }}">
                                    @else
                                    <img src="{{ asset('images/No-image-available.jpg') }}" class="card-img-top" alt="No Image Available" loading="lazy">
                                    @endif
                                    <div class="card-body">
                                        <h3 class="card-title seller_taital">{{ $blog->title }}</h3>
                                        <p class="card-text passages_text">{{ $blog->excerpt }}</p>
                                    </div>
                                    <div class="card-footer text-center">
                                        @if ($blog->slug)
                                        <a href="{{ route('blog-details', ['slug' => Str::slug($blog->slug)]) }}" class="btn btn-dark">Read More</a>
                                        @else
                                        <a href="#" class="btn btn-dark">Read More</a>
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
