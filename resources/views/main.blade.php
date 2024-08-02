@extends('welcome')

@section('main-content')


<style>
    .card-img {
  width: 100%;
  height: 300px;
max-height: 400px;
  display: block;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.card:hover .overlay {
  opacity: 1;
}

.card-product {
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 10px;
}
    .card p {
  margin: 0;
  padding: 0 10px;
  text-align: center;
}

.Feeling {
  position: relative;
  text-align: center;
}

.Feeling span {

  font-family: Georgia, sans-serif;
  color: black;
  font-size: 24px;
  font-weight: 200;
  cursor: pointer;
}

.Feeling p {
  font-family: Poppins, sans-serif;
  font-size: 16px;
text-align: left;
  margin-top: 10px;
}

.Feeling span:hover + p {
  display: block;
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  color: white;
  padding: 10px;
  border-radius: 5px;
}

.customer_section {
            background-color: #f8f9fa;
        }
        .customer_section h2 {
            font-weight: bold;
            color: #343a40;
        }
        .customer_main {
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }
        .customer_img img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .customer_name {
            font-weight: bold;
            color: #007bff;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: brown;
            border-radius: 50%;
            height: 30px;
        }

        .news_section {
            background-color: #f8f9fa;
        }
        .news_section h3 {
            font-weight: bold;
            color: #343a40;
            text-align: center;
        }
        .card {
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-title {
            font-weight: bold;
            color: #007bff;
        }
        .card-text {
            color: #6c757d;
        }
        .card-footer {
            background-color: transparent;
            border-top: none;
        }
        .alert-heading {
            font-weight: bold;
        }

   /* Custom Styles for Carousel */

   .slider{
    width:100% ;
    height:480px;
   }
.carousel-indicators .active {
    background-color: #000; /* Dark color for the active indicator */
}

.carousel-indicators button {
    background-color: #fff; /* White color for inactive indicators */
    border-radius: 70%; /* Rounded indicators */
    width: 18px;
    height: 19px;
    opacity: 0.7;
}

.carousel-indicators button:hover {
    opacity: 1;
}

.carousel-slider-prev-icon,
.carousel-slider-next-icon {
    background-color: rgb(61, 55, 55); /* Dark color for the control icons */
    border-radius: 50%;
    width: 50px;
    height: 50px; /* Make sure the height matches the width for a perfect circle */
    padding: 10px;
}

/* Optional: Adjust the padding to better fit the icons */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-size: 100%, 100%; /* Ensure the icons fit within the circle */
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: brown; /* Dark color for the control icons */
    border-radius: 50%;
    width: 50px;
    height: 50px; /* Make sure the height matches the width for a perfect circle */
    padding: 10px;
}

/* Optional: Adjust the padding to better fit the icons */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-size: 100%, 100%; /* Ensure the icons fit within the circle */
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
<!-- Carousel End -->

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="text-brown">Top Selling Product</h1>
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

<div class="customer_section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Hear What Our Customers Are Saying</h2>
            </div>
        </div>
        <div class="customer_section_2 mt-4">
            <div id="customerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="customer_main d-flex align-items-center">
                            <div class="customer_left">
                                <div class="customer_img">
                                    <img src="{{asset('images/clinet-1.jpg')}}" class="img-fluid rounded-circle" alt="Customer Image">
                                </div>
                            </div>
                            <div class="customer_right ms-4">
                                <h3 class="customer_name">Joneson</h3>
                                <p class="customer_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="customer_main d-flex align-items-center">
                            <div class="customer_left">
                                <div class="customer_img">
                                    <img src="{{asset('images/client-2.jpg')}}" class="img-fluid rounded-circle" alt="Customer Image">
                                </div>
                            </div>
                            <div class="customer_right ms-4">
                                <h3 class="customer_name">Smith</h3>
                                <p class="customer_text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="customer_main d-flex align-items-center">
                            <div class="customer_left">
                                <div class="customer_img">
                                    <img src="{{asset('images/clent-3.jpg')}}" class="img-fluid rounded-circle" alt="Customer Image">
                                </div>
                            </div>
                            <div class="customer_right ms-4">
                                <h3 class="customer_name">Williams</h3>
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

<!-- News Section Start -->
<div class="news_section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Latest News</h3>
            </div>
        </div>
        <div class="news_section_2 mt-4">
            @if ($blogs->isEmpty())
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Sorry!</h4>
                    <p>No Blogs available at the moment. Please check back later.</p>
                    <hr>
                    <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
                </div>
            @else
                <div id="newsCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($blogs->chunk(3) as $chunk)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $blog)
                                        <div class="col-md-4 mb-4">
                                            <div class="card h-100">
                                                @if ($blog->category_image)
                                                    <img src="{{ asset($blog->category_image) }}" class="card-img-top" alt="News Image">
                                                @else
                                                    <img src="{{ asset('images/No-image-available.jpg') }}" class="card-img-top" alt="No Image">
                                                @endif
                                                <div class="card-body">
                                                    <h3 class="card-title">{{ $blog->title }}</h3>
                                                    <p class="card-text">{{ $blog->excerpt }}</p>
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
                    </div>
                    <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- News Section End -->


@endsection

