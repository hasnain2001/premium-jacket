@extends('welcome')

@section('main-content')
<style>
      .women-section  {
                height: 400px;
           
                background-position: center;
                background-size: cover;
                background-image: url('{{asset('images/women.png')}}');
                background-color: rgba(0, 0, 0, 0.5); /* Dark overlay */
                padding: 3rem;
                border-radius: 8px;
                text-align: center;
            }
            .text{
font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-weight: 700;
                color:#ffffff ;

            }
            .text-sp{
                font-size: larger;
                color:#ffffff ;
            }
</style>
<!-- Carousel Start -->
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/black-friday1.jpeg') }}" class="slider-image" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/Untitled1.png') }}" class="slider-image" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/Untitled.png') }}" class="slider-image" alt="...">
            <div class="carousel-caption d-flex flex-column justify-content-end align-items-center" style="bottom: 30%; p">
                <h1 class="text" >Custom Leather Jackets</h1>
                <span class="text-sp">Custom Leather Jacket, a product of your dream</span>
                <a href="{{route('customize')}}" class="mt-3 shop-now">Customize Your Jacket</a>
            </div>
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
<div class="header">
    <h1 class="heading-1 text-captalize">premium leather style is all you need!</h1>
    
  </div>  
  <div class="line">
    <hr>
  </div>  
<div class="container">
  
    <div class="row">
       
    <div class="">
        <div class="Feeling">
            <p>Buy Real Fashion Leather Jackets & Outerwear, at 
              <strong><a href="/" class="text-dark text-decoration-none">premium leather style</a></strong> aim to provide you with the highest quality
              <strong><a href="#" class="text-dark text-decoration-none">leather</a></strong> at affordable prices. We aspire to make available the finest and fashionable 
              <strong><a href="#" class="text-dark text-decoration-none">black leather jackets</a></strong> and 
              <strong><a href="#" class="text-dark text-decoration-none">b3 bomber jackets</a></strong> in a cost-effective manner, so buy Real Fashion Leather Jackets & Outerwear that give your rebellious inner self recognition. Not only do we deal in 
              <strong><a href="#" class="text-dark text-decoration-none">fashion jackets</a></strong> but also in 
              <strong><a href="#" class="text-dark text-decoration-none">motorbike leather</a></strong> jackets & Motogp suits.
            </p>
            <p class="text-center">We intend to create an atmosphere of mutual trust among us and our customers.</p>
          </div>
          
      </div>
     
    </div>
</div> 
<div class="line">
    <hr>
  </div>
<div class="row">
   
    <div class="container my-4">
        <div class="row">
            <!-- Men Collection -->
            <div class="card-mn col-md-6 d-flex justify-content-center mb-3">
                <div class="card img-thumbnail position-relative collection-card" style="background-image: url('{{ asset('images/men.png') }}'); background-size: cover; background-position: center; height: 500px; width: 100%;">
                    <a href="{{ route('gender_details', ['name' => 'mens']) }}" class="text-decoration-none overlay d-flex align-items-center justify-content-center text-white">
                        <span class="collection-text">Men Collection</span>
                    </a>
                </div>
            </div>
    
            <!-- Women Collection -->
            <div class="col-md-6 d-flex justify-content-center mb-3">
                <div class="card img-thumbnail position-relative collection-card" style="background-image: url('{{ asset('images/women.png') }}'); background-size: cover; background-position: center; height: 500px; width: 100%;">
                    <a href="{{ route('gender_details', ['name' => 'women']) }}" class="text-decoration-none overlay d-flex align-items-center justify-content-center text-white">
                        <span class="collection-text">Women Collection</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>



  <div class="line">
    <hr>
  </div>


  <div class="container">
    <!-- Heading Section -->
 

<!-- Check if there are no products -->
@if ($products->isEmpty())
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Sorry!</h4>
        <p>No products available at the moment. Please check back later.</p>
        <hr>
        <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
    </div>
@else
    <!-- Heading -->
    <div class="row mb-4">
        <div class="col text-center">
            <h2 class="text-brown text-capitalize">men fur and shearling leather jackets</h2>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row">
        @foreach ($products as $product) <!-- Limit to 4 products as in the example -->
            <div class="col-6 col-md-3 mb-4 d-flex justify-content-center">
                <div class="card product-card shadow" style="width: 18rem;">
                    @php
                        $images = json_decode($product->productimage);
                    @endphp
                    <!-- Display product image with cropped view -->
                    @if(is_array($images) && !empty($images))
                        <div class="product-img-container">
                            <img src="{{ asset($images[0]) }}" alt="Product Image" class="card-img-top product-img text-center" loading="lazy">
                        </div>
                    @else
                        <div class="product-img-container">
                            <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="card-img-top img-fluid" loading="lazy">
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                        <span class="fw-bold mb-1 text-truncate" style="max-width: 100%;">{{ ucwords($product->name) }}</span>
                        <b>{{ number_format($product->price, 2) }} PKR</b>
                        @if($product->offprice)
                            <span class="text-muted me-2">
                                <del>{{ number_format($product->offprice, 2) }} PKR</del>
                            </span>
                        @endif
                      
                    </div>
                    
                    <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark">View Product</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- View All Button -->
    <div class="row">
        <div class="col text-center">
            <div class="d-grid gap-2 col-12 col-md-3 mx-auto">
                <a href="{{ route('category_details', ['slug' => 'men-fur-and-shearling-leather-jackets']) }}" class="btn btn-dark btn-lg">View All</a>
              </div>
      
        </div>
    </div>
@endif
</div>
<div class="line">
    <hr>
  </div>
  <div class="container">

    
    <!-- product 2 start -->
<div class="row mb-4">
    <div class="col text-center">
        <h2 class="text-brown text-capitalize">Fur & Premium Leather Style Jackets</h2>
    </div>
</div>
<div class="row">
    @foreach ($products2 as $product) <!-- Limit to 4 products as in the example -->
        <div class="col-6 col-md-3 mb-4 d-flex justify-content-center">
            <div class="card product-card shadow" style="width: 18rem;">
                @php
                    $images = json_decode($product->productimage);
                @endphp
                <!-- Display product image with cropped view -->
                @if(is_array($images) && !empty($images))
                    <div class="product-img-container">
                        <img src="{{ asset($images[0]) }}" alt="Product Image" class="card-img-top product-img text-center" loading="lazy">
                    </div>
                @else
                    <div class="product-img-container">
                        <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="card-img-top img-fluid" loading="lazy">
                    </div>
                @endif
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <span class="fw-bold mb-1 text-truncate" style="max-width: 100%;">{{ ucwords($product->name) }}</span>
                    <b>{{ number_format($product->price, 2) }} PKR</b>
                    @if($product->offprice)
                        <span class="text-muted me-2">
                            <del>{{ number_format($product->offprice, 2) }} PKR</del>
                        </span>
                    @endif
                  
                </div>
                
                <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark">View Product</a>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col text-center">
            <div class="d-grid gap-2 col-12 col-md-3 mx-auto">
                <a href="{{ route('category_details', ['slug' => 'women-fur-and-shearling-leather-jackets']) }}" class="btn btn-dark btn-lg">View All</a>
              </div>
      
        </div>
    </div>
</div></div>

  
    <!-- product 2 end -->
    <div class="line">
        <hr>
      </div>
      <div class="container">

    <!-- product 3 start -->
    <div class="row mb-4">
        <div class="col text-center">
            <h2 class="text-brown text-capitalize">Fur & Shearling Coats</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($products3 as $product) <!-- Limit to 4 products as in the example -->
            <div class="col-6 col-md-3 mb-4 d-flex justify-content-center">
                <div class="card product-card shadow" style="width: 18rem;">
                    @php
                        $images = json_decode($product->productimage);
                    @endphp
                    <!-- Display product image with cropped view -->
                    @if(is_array($images) && !empty($images))
                        <div class="product-img-container">
                            <img src="{{ asset($images[0]) }}" alt="Product Image" class="card-img-top product-img text-center" loading="lazy">
                        </div>
                    @else
                        <div class="product-img-container">
                            <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="card-img-top img-fluid" loading="lazy">
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                        <span class="fw-bold mb-1 text-truncate" style="max-width: 100%;">{{ ucwords($product->name) }}</span>
                        <b>{{ number_format($product->price, 2) }} PKR</b>
                        @if($product->offprice)
                            <span class="text-muted me-2">
                                <del>{{ number_format($product->offprice, 2) }} PKR</del>
                            </span>
                        @endif
                      
                    </div>
                    
                    <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark">View Product</a>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col text-center">
                <div class="d-grid gap-2 col-12 col-md-3 mx-auto">
                    <a href="{{ route('category_details', ['slug' => 'men-fur-and-shearling-coats']) }}" class="btn btn-dark btn-lg">View All</a>
                  </div>
          
            </div>
        </div>
    </div>
</div>
     <!-- product 3 end -->


<div class="line">
    <hr>
  </div>
<!-- About Section Start -->
<div class="about_section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <!-- Image Section -->
                <img src="{{asset('images/about.jpg')}}" alt="About Image" class="img-fluid shadow-sm rounded" style="border-radius: 10px;">
            </div>
            <div class="col-lg-6">
                <!-- Text Section -->
                <h2 class="about_taital mb-4" style="font-weight: 700; font-size: 2rem; color: #333;">A Perfect Leather Jacket</h2>
                <p class="about_text" style="font-family: 'Open Sans', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #555;">
                    Elite craftsmanship and design combined with the perfect fit and comfort is what makes a leather jacket perfect. With over a hundred unique designs of Leather Jackets for men and women, Premium Leather Style is a top contestant in the Leather Jacket arena. Now, leather accessories featuring leather belts, leather gloves, and many more are also available.
                    <br><br>
                    What started as a dream is now turning into reality. Our objectives are clearer than ever, and with every satisfied client added to our list, we come one step closer to our vision.
                </p>
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
<!-- About Section End -->


<div class="line">
    <hr>
</div>
<div class="container">

       <!-- product 4 start -->
    <div class="row mb-4">
        <div class="col text-center">
            <h2 class="text-brown text-capitalize">Mens Aviator Jackets</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($products4 as $product) <!-- Limit to 4 products as in the example -->
            <div class="col-6 col-md-3 mb-4 d-flex justify-content-center">
                <div class="card product-card shadow" style="width: 18rem;">
                    @php
                        $images = json_decode($product->productimage);
                    @endphp
                    <!-- Display product image with cropped view -->
                    @if(is_array($images) && !empty($images))
                        <div class="product-img-container">
                            <img src="{{ asset($images[0]) }}" alt="Product Image" class="card-img-top product-img text-center" loading="lazy">
                        </div>
                    @else
                        <div class="product-img-container">
                            <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="card-img-top img-fluid" loading="lazy">
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                        <span class="fw-bold mb-1 text-truncate" style="max-width: 100%;">{{ ucwords($product->name) }}</span>
                        <b>{{ number_format($product->price, 2) }} PKR</b>
                        @if($product->offprice)
                            <span class="text-muted me-2">
                                <del>{{ number_format($product->offprice, 2) }} PKR</del>
                            </span>
                        @endif
                      
                    </div>
                    
                    <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark">View Product</a>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col text-center">
                <div class="d-grid gap-2 col-12 col-md-3 mx-auto">
                    <a href="{{ route('category_details', ['slug' => 'men-aviator-jackets']) }}" class="btn btn-dark btn-lg">View All</a>
                  </div>
          
            </div>
        </div>
    </div>
</div>
<div class="line">
    <hr>
</div>
<div class="container">
    <!-- product 4 end -->
        <!-- product 5 start -->
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="text-brown text-capitalize">men biker jackets</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($products5  as $product) <!-- Limit to 4 products as in the example -->
                <div class="col-6 col-md-3 mb-4 d-flex justify-content-center">
                    <div class="card product-card shadow" style="width: 18rem;">
                        @php
                            $images = json_decode($product->productimage);
                        @endphp
                        <!-- Display product image with cropped view -->
                        @if(is_array($images) && !empty($images))
                            <div class="product-img-container">
                                <img src="{{ asset($images[0]) }}" alt="Product Image" class="card-img-top product-img text-center" loading="lazy">
                            </div>
                        @else
                            <div class="product-img-container">
                                <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="card-img-top img-fluid" loading="lazy">
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                            <span class="fw-bold mb-1 text-truncate" style="max-width: 100%;">{{ ucwords($product->name) }}</span>
                            <b>{{ number_format($product->price, 2) }} PKR</b>
                            @if($product->offprice)
                                <span class="text-muted me-2">
                                    <del>{{ number_format($product->offprice, 2) }} PKR</del>
                                </span>
                            @endif
                          
                        </div>
                        
                        <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark">View Product</a>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col text-center">
                    <div class="d-grid gap-2 col-12 col-md-3 mx-auto">
                        <a href="{{ route('category_details', ['slug' => 'men-biker-jackets']) }}" class="btn btn-dark">View All</a>
                    </div>
                    
              
                </div>
            </div>
        </div>
    </div>
    <div class="line">
        <hr>
    </div>
        <!-- product 5 end -->
        <div class="women-section d-flex align-items-center justify-content-center text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="hero-overlay">
                            <h1 class="hero-title">Women's Collection</h1>
                            <p class="hero-text">
                                Get your customized women jackets and rule the world of fashion. <br>We deliver the best!
                            </p>
                            <a href="{{ route('gender_details', ['name' => 'women']) }}" class="shop-now">Explore Collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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
            <div class="carousel-indicators blog-indicator">
                @foreach ($blogs->chunk(4) as $index => $chunk)
                    <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="{{ $index }}" class="bg-dark {{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
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
                    @foreach ($blogs->chunk(4) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $blog)
                                    <!-- Adjust column classes for mobile view (2 per row) and larger screens (3 per row) -->
                                    <div class="col-6 col-md-3 mb-4">
                                        <div class="card shadow h-100">
                                            @if ($blog->category_image)
                                                <img src="{{ asset($blog->category_image) }}" class="card-img-top" alt="{{ $blog->title }}">
                                            @else
                                                <img src="{{ asset('images/No-image-available.jpg') }}" class="card-img-top" alt="No Image Available" loading="lazy">
                                            @endif
                                            <div class="card-body">
                                                <span class="card-title">{{ ucwords($blog->title) }}</span>
                                            </div>
                                          
                                            @if ($blog->slug)
                                                <a href="{{ route('blog-details', ['slug' => Str::slug($blog->slug)]) }}" class="btn btn-dark">Read More</a>
                                            @else
                                                <a href="#" class="btn btn-dark">Read More</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Carousel Controls -->
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

<div class="line">
    <hr>
</div>
    <div class="container">
    
        <div class="row">
        
        <div class="">
            <div class="Feeling">
                <h3 class="heading-1 text-captalize">Black Leather Jackets</h3>
            <p>Where to go to buy leather jackets? Buy Real Fashion Leather Jackets & Outerwear from us. Don't worry we are here to rescue. We offer plenty of new  
                <strong><a href="{{route('customize')}}" class="text-dark text-decoration-none"> customized jackets </a></strong> which will give a brand new look to your fashion. Everyone knows the 
                <strong><a href="#" class="text-dark text-decoration-none">jackcket</a></strong> rend will not go anywhere & why would they? they give a class to you fashion. Where to find best jackets? as we said you are at right place. Just stay with us! and explore our jacket 
                <strong><a href="#" class="text-dark text-decoration-none">Orange</a></strong>  
                </p>
                <p class="text-center">Now the question arises what stuff we use to manufacture the       <strong><a href="#" class="text-dark text-decoration-none">leather jackets?</a></strong> We use pure leather to purify your    <strong><a href="#" class="text-dark text-decoration-none">fashion desire.</a></strong> </p>
                <p>Looking for 
    <strong><a href="{{route('customize')}}" class="text-dark text-decoration-none">  shearling jackets? , </a></strong><strong><a href="#" class="text-dark text-decoration-none">Biker jackets?,</a></strong><strong><a href="#" class="text-dark text-decoration-none">Bomber Jackets?</a></strong>  You're looking at the right place. Leather jackets have been in fashion since mid twentieth century. They are integral part of fashion industry and if you require leather jackets to upgrade your style, we'll help you with it.
                
                </p>
                <p class="text-center">We ship the finest leather jackets at relatable prices. High quality fabric at your step at very reasonable price. </p>

                <p><strong><a href="{{route('customize')}}" class="text-dark text-decoration-none"> Premium Leather Style Jackets,</a></strong>  aspire to provide everyone of you who want to look classy yet trendy, the look of your desire. We work integrated with professionals of accord. The raw materials are selected carefully and made into your dream attire by professionals.
                </p>
                
                <p>The goal is to bring <strong><a href="{{route('customize')}}" class="text-dark text-decoration-none"> Shearling Coat ,</a></strong>  at every doorstep where you admire the choice you made. You won't regret choosing us because we value your time, money and choice. And we want to amplify the trust between us. Hence, we take care of your dream jackets and propose you the ideal and original.
                </p>
                <p class="text-center">
                    We have the intricately designed jackets to meet your appetite and to make you look petit.
                </p>

                <p>
                    So, let's round up for the fiesta! Where you get unique and <strong>stylish jackets.</strong>
                    We have for you the finest leather and finest apparels , you've seen nowhere.
                </p>
                <p class="text-center">
                    Clothing reflects your personality, and we want to help you upgrade your style game via our sophisticated apparels.
                </p>
                <p>We make the best leather jackets while respecting your privacy. Any data you share with us will only be used to get to you the product and not for another purpose. Hence, we become your trustworthy partners.</p>
                <p>For your style game , you can order is any style you want. We will get you the finest fabric with intricate design in our promised delivery time. We tend to keep our promised because what is a man if not the keeper of his promises.</p>
                <p>Here at <strong>Shearling jackets</strong> , you will feel at home because we intend to address your needs and desires regarding your savvy apparel. So, if you want to feel ahead of everyone with gigantic personality , here we are at your disposal. Order biker or brands like <strong>suzuki jacket </strong>or <strong>yamaha jacket now!</strong></p>
                <p class="text-center">
                    Dream jackets in no time. Just a click away.
                </p>
            </div>
            
        </div>
        
        </div>
    </div> 
<div class="line">
    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="Feeling">
            <h3 class="heading-1 text-captalize">Bomber Leather Jackets</h3>
 <p>Looking for the <strong> Best men leather bomber jacket?</strong>Buy Real Fashion Leather Jackets & Outerwear Well you're just at the right place. Why go out when we can do all the shopping for you? Here at <strong>
    <a href="/" class=" text-decoration-none text-dark"> Premium Leather Style</a></strong> we deal in kind <strong> Leather Wears</strong>specifically targeting<a href="/" class=" text-decoration-none text-dark">  Premium Leather Style Jackets, Men Leather Bomber Jacket</a></strong> and last but not the least, <strong>Biker Leather Jackets</strong> for those who love to ride in style.  </p>


    <p class="text-center">We aim to provide cost effective items in timely manner so you receive the best at best possible rates.</p>

    <p>Genuine leather is used in manufacturing of  <strong>  Men Leather Bomber Jacket.</strong>The leather used may vary from its type to type. Lambskin Leather, Sheepskin Leather and soon, each has its own texture and feel. We use both artificial and real fur depending on our Customer's requirement. All our articles are custom made and we here at Premium Leather Style make sure to provide you with the best Custom made leather jackets. So don't 
        get up and let us provide you with the best <strong>
        <a href="/" class=" text-decoration-none text-dark"> Men leather bomber Jackets </a></strong> at your doorstep!   </p>
        <p class=" text-center ">Visit  <strong>
            <a href="/" class=" text-decoration-none text-dark">Premium Leather Style </a></strong>to view more information and blogs.

        </p>
        </div>
    </div>
</div>
<div class="line">
    <hr>
</div>
<div class="container">
    <!-- product 4 end -->
        <!-- product 6 start -->
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="text-brown text-capitalize">featured product</h2>
            </div>
        </div>
        <div class="row">
            @if ($products6->isempty())
            <div class="alert alert-primary d-flex align-items-center text-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                    <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0"/>
                  </svg>
                <div class="text-center">
       No  Product
                </div>
              </div>
            @else
  
           
            @foreach ($products6 as $product) <!-- Limit to 4 products as in the example -->
                <div class="col-6 col-md-3 mb-4 d-flex justify-content-center">
                    <div class="card product-card shadow" style="width: 18rem;">
                        @php
                            $images = json_decode($product->productimage);
                        @endphp
                        <!-- Display product image with cropped view -->
                        @if(is_array($images) && !empty($images))
                            <div class="product-img-container">
                                <img src="{{ asset($images[0]) }}" alt="Product Image" class="card-img-top product-img text-center" loading="lazy">
                            </div>
                        @else
                            <div class="product-img-container">
                                <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="card-img-top img-fluid" loading="lazy">
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                            <span class="fw-bold mb-1 text-truncate" style="max-width: 100%;">{{ ucwords($product->name) }}</span>
                            <b>{{ number_format($product->price, 2) }} PKR</b>
                            @if($product->offprice)
                                <span class="text-muted me-2">
                                    <del>{{ number_format($product->offprice, 2) }} PKR</del>
                                </span>
                            @endif
                          
                        </div>
                        
                        <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark">View Product</a>
                    </div>
                </div>
            @endforeach
          
            @endif
            <div class="row">
                <div class="col text-center">
                    <div class="d-grid gap-2 col-12 col-md-3 mx-auto">
                        <a href="{{ route('feature') }}" class="btn btn-dark">View All</a>
                    </div>
                    
              
                </div>
            </div>
        </div>
    </div>
    <div class="line">
        <hr>
    </div>
<!-- Our Mission Section Start -->
<div class="mission-section py-5 text-light position-relative" 
     style="background-image: url('{{ asset('images/our-mission.png') }}'); background-size: cover; background-position: center;">
    <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.7);"></div>

    <div class="container position-relative z-index-1">
        <div class="row ">
            <div class="col-lg-8 col-md-10">
                <h2 class="display-4 fw-bold mb-4" style="font-family: 'Roboto', sans-serif; color:white;">Our Mission</h2>
                <p class="lead " style="font-family: 'Open Sans', sans-serif; color:white;">
                    To offer not just leatherwear but a legacy. We aim to focus on our heritage of craftsmanship with modern sustainability, delivering exceptional quality at prices that don’t break the bank. Luxury, after all, should be for everyone, and that’s our promise.
                </p>
                <p class="mb-4" style="font-family: 'Open Sans', sans-serif; font-size: 1.1rem;color:white;">
                    We believe luxury shouldn’t be exclusive. It should be inclusive, attainable, and reflective of the world we live in today. We focus on making high-quality leatherwear that speaks to modern values. We strive to give our customers something they can wear with pride, knowing they’re part of a more significant movement toward responsible fashion.
                </p>
                <p class="mb-0" style="font-family: 'Open Sans', sans-serif; font-size: 1.1rem;color:white;">
                    Our mission is simple yet profound: to craft leather that stands the test of time—both in its design and its commitment to the planet—while ensuring that luxury remains within reach for everyone.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Our Mission Section End -->
<div class="line">
    <hr>
</div>

<div class="container my-5">
    <div class="text-center mb-4">
        <div class="tab-navigation">
            <a href="#carouselExample" class="text-dark btn btn-light" data-slide-to="0" class="active">Ethical Manufacturing Practices</a>
            <a href="#carouselExample" class="text-dark btn btn-light" data-slide-to="1">Our Promise</a>
            <a href="#carouselExample" class="text-dark btn btn-light" data-slide-to="2">MADE TO LAST</a>
        </div>
    </div>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner text-right">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Ethical Manufacturing Practices</h2>
                        <p >At Premium Leather Style, ethical manufacturing isn’t just a phrase—it’s the backbone of our production process. Our approach is multilayered, beginning with the careful selection of eco-conscious leather. We source from suppliers who prioritize animal welfare and adhere to strict environmental standards, minimizing harm to the planet.</p>
                        <p>Our manufacturing facilities operate under strict labor conditions that guarantee fair wages, safe working environments, and no exploitation. Each jacket is crafted by skilled hands and treated with respect, ensuring that ethical treatment extends to the earth and every person involved in the process.</p>
                        <button class="btn btn-dark mt-3">CUSTOMIZE YOUR OWN</button>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('images/manu-facture.png  ')}}" alt="Ethical Manufacturing">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-6 text-center py-10">
                                            
                        <img src="{{asset('images/our-promises.png')}}" alt="Made to Last">
                       
                    </div>
                    <div class="col-md-6">
                        <h2>Our Promise</h2>
                        <br>
                        <strong>Unmatched Craftsmanship:</strong>
                        <span class="text-dark">When you put on one of our jackets, you're wearing a piece of history. Every piece is made by highly trained craftsmen who have dedicated years to perfecting their technique, guaranteeing that every stitch, seam, and inch of leather meets the highest standards.</span>
                        <br>
                        <strong>Sustainable Practices</strong>
                        <p>Style should never come at the cost of our planet. That’s why we’ve committed to using only eco-friendly materials and sustainable processes, reducing our footprint while delivering exceptional leather products.</p>
                        <strong>Customer Satisfaction</strong>
                        <p>Our job isn’t finished when you buy. We're in it for the long run, offering quick shipping, simple returns, and committed customer service. We guarantee quality, comfort, and care with every jacket we provide.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-md-6">
                        <br><br>
                      <p>At Premium Leather Style , we're all about longevity. Our expert craftspeople thoughtfully design & handcraft your jackets one at a time with elite attention to detail, using the finest full-grain leathers & suede, durable hardware, and finishings to ensure that with us, durability is not just a promise; it's a guarantee..</p>
                      
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('images/made-to-fit.png')}}" alt="Made to Last">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="line">
    <hr>
</div>
<!-- Customer Testimonials Start -->
<div class="customer_section py-5 ">
    <div class="contain">
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
                                <!-- Star Rating -->
                                <div class="rating mb-2">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
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
                                <!-- Star Rating -->
                                <div class="rating mb-2">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
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
                                <h3 class="customer_name">Taylor</h3>
                                <!-- Star Rating -->
                                <div class="rating mb-2">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
