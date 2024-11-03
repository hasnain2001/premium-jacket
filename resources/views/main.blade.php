@extends('welcome')

@section('main-content')
<style>
    .shop-now {
    display: inline-block;
    padding: 10px 20px;
    color: white;
    border: 1px solid white;
    text-decoration: none;
    font-weight: bold;
    text-align: center;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.shop-now:hover {
    background-color:#690500;
    color: white;
}
.tab-navigation a {
        font-weight: bold;
        color: #fff;
        margin: 0 5px;
        transition: 0.3s;
    }
    .carousel-item h2 {
        font-size: 2rem;
        color: #333;
    }
    .carousel-item p {
        font-size: 1rem;
        color: #555;
        margin: 10px 0;
    }
    .carousel-item img {
        max-width: 100%;
        border-radius: 8px;
    }
    .btn-dark:hover {
        background-color: #007bff;
        color: #fff;
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
<div class="contain">
    <div class="header">
      <h1 class="heading-1">Welcome to Premium Leather Style: A Tradition of Excellence in Leather :</h1>
      <div class="line">
        <hr>
      </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <div class="Feeling">
        
          <p>Premium Leather Style has established a solid reputation for high-end leather jackets since 1860. We offer a carefully selected variety of luxury jackets that creatively blend tradition with innovation to produce jackets that are not only fashionable but also environmentally friendly. With more than 150 years of combined experience, we take great pride in designing luxurious leather jackets that balance durability, style, and environmental responsibility. </p>
        </div>
      </div>
      <div class="col-md-5">
        <div class="Feeling">
            <br>
        
          <p>Our collection has everything from vintage styles like bomber and biker jackets to the newest innovations in leather and shearling. Every piece is expertly made to offer the best comfort and quality possible while enhancing the elegance of your overall appearance.. </p>
        </div>
      </div></div>

      <div class="line">
        <hr>
      </div>
    <div class="row">
   
        <div class="col-md-6">
            <div class="card card1" style="background-image: url('{{ asset('images/men.png') }}'); background-size: contain; background-position: center; background-repeat: no-repeat; height: 340px;">
                <a href="http://127.0.0.1:8000/gender/MENs" class="text-dark text-decoration-none">
                    <div class="card-content" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%; text-align:center;">
                        <span class="text-center">MENS</span>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card card2" style="background-image: url('{{ asset('images/women.jpg') }}'); background-size: contain; background-position: center; background-repeat: no-repeat; height: 340px; position: relative;">
                <a href="http://127.0.0.1:8000/gender/women" class="text-dark text-decoration-none">
                    <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%; text-align:center;">
                        <span class="card-product text-center">WOMEN</span>
                    </div>
                </a>
            </div>
        </div>
        
    
  

    <div class="row mt-4">
    
      <div class="col-md-3">
        <div class="card" style="background-image: url('{{ asset('images/image3.jpeg') }}'); background-size: cover; background-position: center; height: 260px; position: relative;">
          
            <a href="{{ route('blog') }}" class="text-dark text-decoration-none">
                <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%; text-align:center;" >
            <span class="card-product ">Bomber Jacket</span>
          
          </div></a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card" style="background-image: url('{{ asset('images/image4.jpeg') }}'); background-size: cover; background-position: center; height: 260px; position: relative;">
            <a href="{{ route('about') }}">
         
          <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%; text-align:center;" >
            <span class="card-product">Varsity Jacket</span>
               </div></a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card" style="background-image: url('{{ asset('images/image5.jpeg') }}'); background-size: cover; background-position: center; height: 260px; position: relative;">
            <a href="{{route('contact')}}">
            
                <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%; text-align:center;" >
                    <span class="card-product">Women’s Aviator Jackets</span>
    
                </div>
            </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card" style="background-image: url('{{ asset('images/Suede and Shearling Jackets.png') }}'); background-size: cover; background-position: center; height: 260px; position: relative;">
            <a href="{{route('contact')}}">
            
                <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); color: white; padding: 20px; position: absolute; bottom: 0; width: 100%; text-align:center;" >
                    <span class="card-product">Suede and Shearling Jackets </span>
                   
                </div>
            </a>
        </div>
      </div> 
    </div>

  </div>
  <div class="col-md-12">
    <div class="card" style="background-image: url('{{ asset('images/image6.png') }}'); background-size: cover; background-position: center; height: 400px; position: relative;">
        <a href="{{ route('product') }}" class="text-dark text-decoration-none">
            <div class="overlay" style="height:250px; color: white; padding: 20px; position: absolute; bottom: 0; width: 100%; text-align:center;">
                <a class="shop-now" href="{{ route('product') }}">Shop Now</a>
            </div>
        </a>
    </div>
</div>

</div>


  <div class="line">
    <hr>
  </div>

  <div class="contain ">
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
                    <div class="col-lg-12">
                <h2 class="about_taital text-center">About Us</h2>
                <p class="about_text text-justify" style="font-family: 'Open Sans', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #555;">
                    At Premium Leather Style, we don't just make leather jackets—we craft legacies. Founded in 1860, we've endured centuries of change, constantly redefining what leather fashion means. Our journey is rooted in timeless craftsmanship—the kind that blends the classic with the contemporary, old-world skill with modern aesthetics.
                    <br><br>
                    We're not just about jackets. No, we're about experiences. Each coat is a statement, a masterpiece woven from years of tradition and a relentless pursuit of innovation. Our commitment to sustainability, durability, and forward-thinking fashion sets us apart.
                    <br><br>
                    Our products are handcrafted from the finest eco-conscious leather and responsibly sourced to ensure that every piece isn't just good for you and the planet. We believe in balancing style with environmental responsibility and take it seriously. Each jacket we create is subjected to strict quality checks, where we combine the knowledge of traditional craftsmanship with cutting-edge techniques. The result? Perfect comfort, outstanding style, and a lifespan that shows our commitment.
                </p>    <a href="{{ route('about') }}" class="button-read">
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
