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
    .card-description {
        top: -10px;
        width: 300px;
    height: 450px;
    overflow-y: scroll;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
 
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
        <div class="header">
            <h1 class="heading-1 text-captalize">Your One-Stop Store for Genuine Leather Jackets at Premium Leather Style!</h1>
        
            </div> 
    <div class="row">

    <div class="">
    <div class="Feeling">
    <p>Experience the classic style and exceptional craftsmanship of Premium Leather Style, where durability and luxury meet. Whether you're a leather expert or a fashionista, our collection is made to add pieces that are not only fashionable but long-lasting to your wardrobe. 
<br>
        Discover your new favorite statement piece by exploring our beautifully designed collection of leather jackets.
        
    </p>
    <p class="text-center">We intend to create an atmosphere of mutual trust among us and our customers.</p>
    </div>

    </div>

    </div>
    </div> 
  

    <div class="line">
    <hr>
    </div>


    <div class="">
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
    <h2 class=" heading-1 text-capitalize">men fur and shearling leather jackets</h2>
<div class="Feeling">
    <p>Our faux leather fur and shearling jackets offer the perfect balance of warmth and design. These jackets are made from high-quality faux leather and include shearling linings and luxurious faux fur for unparalleled comfort in chilly climates. These stylish yet daring coats are ideal for anyone who wish to stand out while being warm.</p>
</div>
    </div>
    </div>

    <!-- Products Grid -->
    <div class="row">
    @foreach ($products as $product) <!-- Limit to 4 products as in the example -->
    <div class="col-6 col-md-6 mb-6 d-flex justify-content-center">
    <div class="card shadow" >
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
    
    <b>$ {{ number_format($product->price, 2) }} </b>
    @if($product->offprice)
    <span class="text-muted me-2">
    <del>${{ number_format($product->offprice, 2) }} </del>
    </span>
    @endif

    </div>

    <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark">View Product</a>
    </div>
      <!-- Product Description -->
      <div class="card card-description mt-2 text-center">
        <p>{{ $product->description }}</p>
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
    <h2 class="text-brown heading-1 text-capitalize">Fur & Premium Leather Style Jackets</h2>
    <div class="Feeling">
        <p>Our faux leather fur and shearling jackets offer the perfect balance of warmth and design. These jackets are made from high-quality faux leather and include shearling linings and luxurious faux fur for unparalleled comfort in chilly climates. These stylish yet daring coats are ideal for anyone who wish to stand out while being warm.</p>
    </div>
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
    <b>${{ number_format($product->price, 2) }} </b>
    @if($product->offprice)
    <span class="text-muted me-2">
    <del>${{ number_format($product->offprice, 2) }}</del>
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
        <h2 class="text-brown heading-1 text-capitalize">Fur & Shearling Coats</h2>
        <div class="Feeling">
            <p>With our Cozy Couture Luxe Fur Coat, indulge in luxury. This incredibly soft coat is made for people who want warmth and elegance. Made from high-quality faux fur, it provides unmatched warmth, making it ideal for chilly winter days and sophisticated evenings out. No matter where you go, you'll always look stylish and feel comfortable because to the classic style and luxurious material.</p>
        </div>
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
    <b>${{ number_format($product->price, 2) }} </b>
    @if($product->offprice)
    <span class="text-muted me-2">
    <del>${{ number_format($product->offprice, 2) }} </del>
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
    <h6 class="about_taital mb-4" style="font-weight: 700; font-size: 1.2rem; color: #1f0e0e;">Our Top Selling: Brown Oversized Leather Jacket: 
        Easy and Stylish for Any Season
        </h6>
    <p class="about_text" style="font-family: 'Open Sans', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #1a1616;">
        Our Brown Oversized Leather Jacket is the ideal option for people who enjoy a casual yet fashionable look. This jacket blends the classic beauty of rich brown leather with the loose fit found in modern streetwear. It is a great option for both men and women because it is designed to provide the optimal mix between comfort and sophistication. This jacket effortlessly enhances any outfit, whether you wear it with jeans for a laid-back vibe or over a dress for a bit of edge. Along with improving comfort, the large silhouette makes layering throughout the cooler months simple.
        <br>
        Dream jackets in no time. Just a click RIGHT AWAY.
           <a href="{{ route('product') }}" class="button-read">
            <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
            <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
            <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
            </svg>
            <span>Shop Now</span>
            </a>
    </p>
 
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
    <h2 class="text-brown text-capitalize heading-1">Mens Aviator Jackets</h2>
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
    <b>${{ number_format($product->price, 2) }} </b>
    @if($product->offprice)
    <span class="text-muted me-2">
    <del>${{ number_format($product->offprice, 2) }} </del>
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
    <h2 class="text-brown text-capitalize heading-1">men biker jackets</h2>
    <div class="Feeling">
        <p>
            The Black Rivet Leather Jacket will let you unleash your inner rebel. This jacket is made from premium real leather and is intended to have a sleek, elegant appearance. While the classic biker features like quilted shoulder panels, asymmetrical zippers, and zippered pockets offer a hint of toughness, the tailored fit and polished finish give it a modern edge. This jacket offers the ideal balance of fashion and utility, whether you're driving on the highway or navigating the city's streets.
            </p>
    </div>
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
    <b>${{ number_format($product->price, 2) }} </b>
    @if($product->offprice)
    <span class="text-muted me-2">
    <del>${{ number_format($product->offprice, 2) }} </del>
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
    <h2 class="text-brown text-capitalize heading-1">Take Advantage of Our Featured Products for Classic Style</h2>
    <div class="Feeling">
        <p>The Raven Rebel Black Leather Bomber Jacket will enhance your streetwear look. This jacket has a soft leather surface, ribbed detailing, and a traditional bomber style with a contemporary twist. It's ideal for a laid-back day in the city or a night out because of its sleek style and zipped pockets. It's essential for anyone looking to give their clothing a rebellious edge</p>
    </div>
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
    <b>${{ number_format($product->price, 2) }}</b>
    @if($product->offprice)
    <span class="text-muted me-2">
    <del>${{ number_format($product->offprice, 2) }}</del>
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
        <h5 class="display-6 fw-bold mb-4" style="font-family: 'Roboto', sans-serif; color:white;">Our Mission: With Each Stitch, Create Timeless Elegance</h5>
    <div class="col-lg-8 col-md-10">
   
    <p class="lead " style="font-family: 'Open Sans', sans-serif; color:white;">
  
Our goal at Premium Leather Style is to reinvent the craft of leather craftsmanship by producing classic, amazing jackets that go beyond fashion trends and seasons. Our dedication to sustainable fashion and passion for excellence are what motivate us. Our commitment to quality, ethical sourcing, and the delicate workmanship of our talented craftsmen are all evident in every piece we produce.



    </p>
    <p class="mb-4" style="font-family: 'Open Sans', sans-serif; font-size: 1.1rem;color:white;">
        A leather jacket, in our opinion, is more than just a piece of apparel; it's a statement, a representation of uniqueness, and a sign of self-assurance. For this reason, we want to offer our customers jackets that are not only fashionable and long-lasting, but also convey a sense of tradition, creativity, and moral character.
    </p>
    {{-- <p class="mb-0" style="font-family: 'Open Sans', sans-serif; font-size: 1.1rem;color:white;">
    Our mission is simple yet profound: to craft leather that stands the test of time—both in its design and its commitment to the planet—while ensuring that luxury remains within reach for everyone.
    </p> --}}
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
    <h5 style="color: #000000; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><strong>What Makes Premium Leather Style the Best Option? Craftsmanship, Sustainability, and Quality</strong></h5>
    <p class=" text-dark">At Premium Leather Style, we take great satisfaction in providing jackets that are not only fashionable but long-lasting. Each piece is hand-crafted by skilled workers who apply decades of experience to every thread, guaranteeing the ideal balance of elegance and durability. We only source the best, responsibly produced leather because we are dedicated to quality, putting sustainability and style first. By selecting us, you're spending money on a jacket that not only makes a style statement but also narrates a story about quality and craftsmanship.
        
        .</p>
    <p>Our manufacturing facilities operate under strict labor conditions that guarantee fair wages, safe working environments, and no exploitation. Each jacket is crafted by skilled hands and treated with respect, ensuring that ethical treatment extends to the earth and every person involved in the process.</p>
    <a href="{{route('customize')}}" class="btn btn-dark mt-3">CUSTOMIZE YOUR OWN</a>
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
    <h2>Our Promise to Our Clients</h2>
    
<p class="text-dark">    We are a community of leather lovers who appreciate style, quality, and craftsmanship, not simply a brand. Selecting Premium Leather Style means going with a company that is known for its sustainability, authenticity, and uncompromising dedication to quality. We promise to keep pushing the limits of leather fashion, creating fresh looks while maintaining to the classic style that characterizes our company.
    
<br>
<br>
    Take advantage of our <strong>30-day return policy</strong> and a <strong>secure checkout</strong> to provide the most seamless possible buying experience. Your satisfaction is our first priority, and our committed customer service team is always here to help.
    <br> <br>
        
    Come along on this adventure with us as we create stories that remain beyond just jackets.
</p>

    

    
    </div>
    </div>
    </div>
    <div class="carousel-item">
    <div class="row">
    
    <div class="col-md-6">
    <br><br>
    <p class=" text-dark">At Premium Leather Style, we prioritize lasting quality. Each jacket is meticulously designed and handcrafted by our skilled artisans with exceptional attention to detail. We use only the finest full-grain leathers, suede, and durable hardware, ensuring every piece is built to last. With us, durability isn’t just a commitment—it’s a guarantee.</p>
    </div>
    <div class="col-md-6">
        <img src="{{asset('images/made-to-fit.png')}}" alt="Made to Last" class="" height="300px">
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

    <h2 class="fw-bold mb-4 text-center">Hear to What Our Customers Are Saying!</h2>
 
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
    <h3 class="customer_name">Amanda p. </h3>
    <!-- Star Rating -->
    <div class="rating mb-2">
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    </div>
    <p class="customer_text">“The quality of the shearling jacket I purchased is unmatched. It's warm, comfortable, and stylish. I get compliments every time I wear it!” "</p>
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
    <h3 class="customer_name">Daniel K</h3>
    <!-- Star Rating -->
    <div class="rating mb-2">
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    </div>
    <p class="customer_text">“My oversized leather jacket brown is my go-to piece for fall. It's so versatile and looks great with everything!” </p>
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
    <h3 class="customer_name"> Zoe L</h3>
    <!-- Star Rating -->
    <div class="rating mb-2">
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    </div>
    <p class="customer_text">“I was blown away by the craftsmanship of the bomber leather jacket. It’s the perfect blend of edgy and chic.”</p>
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
