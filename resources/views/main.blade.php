@extends('welcome')

@section('main-content')
<style>
.text{
color: brown;
font-size: 2.5rem;
font-weight: bold;
text-align: center;
}


    .img-product{
        height:250px;
        width: 100%;
        object-fit: cover;
    }
    .card-body{
        height: 150px;

    }


        .about_section {
            padding: 50px 0;
            background-color: #f8f9fa;
        }

        .about-img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .about_taital {
            font-size: 1.75rem;
            font-weight: bold;
            color:brown;
            margin-bottom: 1rem;
        }
        .about_text {
            font-size: 1rem;
            color: #6c757d;
            line-height: 1.7;
        }
        .read_bt a {
            font-size: 1rem;
            color: #007bff;
            text-decoration: none;
        }
        .read_bt a:hover {
            text-decoration: underline;
        }

        .button {
  position: relative;
  transition: all 0.3s ease-in-out;
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
  padding-block: 0.5rem;
  padding-inline: 1.25rem;
  background-color: brown;
  border-radius: 9999px;

  align-items: center;
  justify-content: center;
  color: #ffff;
  gap: 10px;
  font-weight: bold;
  border: 3px solid #ffffff4d;
  outline: none;
  overflow: hidden;
  font-size: 15px;
}

.icon {
  width: 24px;
  height: 24px;
  transition: all 0.3s ease-in-out;
}

.button:hover {
  transform: scale(1.05);
  border-color: #fff9;
}

.button:hover .icon {
  transform: translate(4px);
}

.button:hover::before {
  animation: shine 1.5s ease-out infinite;
}

.button::before {
  content: "";
  position: absolute;
  width: 100px;
  height: 100%;
  background-image: linear-gradient(
    120deg,
    rgba(255, 255, 255, 0) 30%,
    rgba(255, 255, 255, 0.8),
    rgba(255, 255, 255, 0) 70%
  );
  top: 0;
  left: -100px;
  opacity: 0.6;
}

@keyframes shine {
  0% {
    left: -100px;
  }

  60% {
    left: 100%;
  }

  to {
    left: 100%;
  }
}


.custom-prev, .custom-next {
    background-color: transparent; /* Dark background color */
    border: none; /* Remove border */
    width: 15px;
    height: 40px;

}

.custom-prev:hover, .custom-next:hover {
    background-color:brown; /* Darker background on hover */
}

.custom-prev .carousel-control-prev-icon,
.custom-next .carousel-control-next-icon {
    filter: invert(1); /* Invert icon color to make it visible on dark background */
}
.header {
  text-align: center;
  margin-top: 20px;
}

.line hr {
  width: 80%;
  color: black;
  border:2px dotted;
  margin: 0 auto 20px;
}

.card {
  position: relative;
  overflow: hidden;
}

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
@media(max-width:786px;){
    .line hr{
        width: 3
    }
}
</style>


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

     <!-- Product section start -->
<br> <div class="line">
    <hr>
  </div>




  <div class="container">
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="bulb_taital text">Top Selling Product</h1>
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
            @foreach ($products->chunk(3) as $key => $chunk) <!-- Change chunk size as needed -->
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($chunk as $product)
                            <div class="col-md-4"> <!-- Adjust column size as needed -->
                                <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="text-dark text-decoration-none">
                                    @php
                                    $images = json_decode($product->productimage);
                                    @endphp
                                    @if(is_array($images) && !empty($images))
                                        <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid mb-2" loading="lazy">
                                    @else
                                        <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-fluid mb-2" loading="lazy">
                                    @endif
                                    <span class="fw-bold  text-center">{{ $product->name }}</span>
                                </a>
                                <a href="{{ route('product_details', ['slug' => Str::slug($product->slug)]) }}" class="btn btn-dark btn-sm">View Product</a>
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


<br><br><br>
     <!-- product section end -->

      <!-- Customers Section start -->
     <div class="customer_section  py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text ">Hear What our Customers Are Saying</h2>
                </div>
            </div>
            <div class="customer_section_2 mt-4">
                <div id="costum_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="customer_main d-flex align-items-center">
                                <div class="customer_left">
                                    <div class="customer_img">
                                        <img src="{{asset('images/clinet-1.jpg')}}" class="img-fluid rounded-circle" alt="Customer Image">
                                    </div>
                                </div>
                                <div class="customer_right ml-4">
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
                                <div class="customer_right ml-4">
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
                                <div class="customer_right ml-4">
                                    <h3 class="customer_name">Williams</h3>
                                    <p class="customer_text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#costum_slider" role="button" data-slide="prev">
                        <span class="customer-prev" aria-hidden="true"></span>
                        <span class="sr-only">prev</span>
                    </a>
                    <a class="carousel-control-next" href="#costum_slider" role="button" data-slide="next">
                        <span class="customer-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Customers Section End -->



   <!-- news section start -->
<!-- News Section Start -->
<div class="news_section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text">Latest News</h3>
            </div>
        </div>
        <div class="news_section_2 mt-4">
            <div class="row">

                @if ($blogs->isEmpty() )

                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Sorry!</h4>
                    <p>No Blogs available at the moment. Please check back later.</p>
                    <hr>
                    <p class="mb-0">Feel free to browse other categories or use the search feature to find what you're looking for.</p>
                </div>

                @else


                @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card ">
                        @if ($blog->category_image)
                        <img src="{{ asset($blog->category_image) }}" class="card-img-top" alt="News Image">
                        @else
                           <img src="{{ asset('images/No-image-available.jpg') }}" alt="">
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
                @endif
            </div>
        </div>
    </div>
</div>
<!-- News Section End -->

 <!-- news section end -->

       <!-- About Section Start -->
    <div class="about_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="text">About Us</h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img class="about-img" src="{{asset('images/about.jpg')}}" alt="About Image">
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="about_taital_main">
                        <div class="about_taital">About Our Company</div>
                        <p class="about_text">Welcome to Preamium Leather Style, where you can  shop for the finest leather jackets. A multitude of leather jackets, including bomber jackets, shearling fur jackets, biker jackets, vintage-style leather jackets, and more, are accessible for both men and women at our online shop. We offer something for everyone, whether you’re hunting for a traditional leather jacket to add to your outfit or a statement item to stand out.</p>
                       <div >

                            <a class="button" href="{{route('about')}}">
                                Read More
                                <svg fill="currentColor" viewBox="0 0 24 24" class="icon">
                                  <path clip-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" fill-rule="evenodd"></path>
                                </svg>
                              </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->


@endsection

