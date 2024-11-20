    <?php
    header("X-Robots-Tag:index, follow");?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $product->title }}</title>
        <link rel="canonical" href="https://www.premiumleatherstyle.com/product/{{ Str::slug($product->slug) }}">
            <meta name="description" content="{!! $product->meta_description !!}">

    <meta name="keywords" content="{!! $product->meta_keyword !!}">
        <meta name="author" content="john">
    <meta name="robots" content="index, follow">

        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="{{asset('cssfile/product-detail.css')}}">
                
        <!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
     fbq('init', '550494357734449'); 
    fbq('track', 'PageView');
    </script>
    <noscript>
     <img height="1" width="1" 
    src="https://www.facebook.com/tr?id=550494357734449&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
        <!-- Custom CSS -->
  <style>
    .conain {
    background-position: center;
    background-image: url('{{ asset('images/banner.jpg') }}');
    background-size: cover;
    height: 200px;
    color: white;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}
.img-product {
    max-height: 300px; /* Limit the height for consistency */
    object-fit: cover; /* Ensure the image fits nicely */
    margin-bottom: 15px;
}



.text-spec {
    color: #007bff; 
}

  </style>

          </head>
    <body>
        <nav>
            @include('components.navbar')
        </nav>

        <div class="conain">
            <h1 class="shop-text" style="color: #f1c876;">{{ ucwords($product->name)}}</h1>
        </div>
        <header class="bg-light py-3 px-4 px-md-5 rounded shadow-sm" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 flex-wrap">
                <li class="breadcrumb-item">
                    <a href="/" class="text-decoration-none text-dark">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('product') }}" class="text-decoration-none text-dark">
                        <i class="fas fa-box"></i> Product
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('category_details', ['slug' => Str::slug($product->categories)]) }}" class="text-decoration-none  text-dark  text-dark">
                        <i class="fas fa-tag"></i> {{ $product->categories }}
                    </a>
                    
                    
                
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-tag"></i> {{ ucwords($product->name) }}
                </li>
            </ol>
        </header>
        
        
        <div class="container mt-4">
            <div class="card">
                <h1 class=" heading-1 py-2 mb-4"> {{ucwords($product->name)}}</h1>
            </div>


            <!-- Alerts for Success and Error -->
            @if (session('success'))
                <div class="alert alert-success">

                {{ $product->name }} :{{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Product Section -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    @if ($product)
                        <div class="card">
                            <div class="card-body">
                                <!-- Product Images -->
                                <div class="row">
                                    <div class="col-4">
                                        <div class="small-images">
                                            @php
                                                $images = json_decode($product->productimage, true);
                                            @endphp
                                            @if (is_array($images) && count($images) > 0)
                                                @foreach ($images as $key => $image)
                                                    <img class="productimage img-fluid small-img" src="{{ asset($image) }}" data-index="{{ $key }}" onclick="changeImage(this)">
                                                @endforeach
                                            @else
                                                <img src="{{ asset('images/No-image-available.jpg') }}" alt="" class="img-fluid">
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-8">
                                        <div class="main-image">
                                            @if (is_array($images) && count($images) > 0)
                                                <img src="{{ asset($images[0]) }}" alt="{{ $product->name }}" class="productimage img-fluid" id="mainImage">
                                            @else
                                                <img src="default-image.jpg" alt="No Image" class="img-fluid" id="mainImage">
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-center mt-4">No product found.</p>
                    @endif
                </div>
                <div class="col-lg-6">
                    @if ($product)
                        <div class="card">
                            <div class="card-body">
                                {{-- <h2 class="card-title">{{ ucwords($product->name) }}</h2> --}}
                                <div class="d-flex justify-content-between align-items-center mb-4">
                    
                                    <span class="text-right">
                                        <i class="fas fa-shipping-fast"></i> Estimated delivery time: <span id="delivery-date"></span>
                                    </span>
                                        
                                            </div>          <span class="text-dark text-uppercase">
                                                {{ number_format((($product->offprice - $product->price) / $product->offprice) * 100, 2) }}% Off
                                                                        (Save ${{ number_format($product->offprice - $product->price, 2) }} USD)
                                                                    </span>       
                                <br>

                                <h4 class="mb-4">
                                    Price:
                                    <b>${{ number_format($product->price, 2) }} USD</b>
                                    <span class="text-muted me-2">
                                        <del>${{ number_format($product->offprice, 2) }} USD</del>
                                    </span>
                                </h4>
                                <h4 class="mb-4 
                                {{ $product->quantity == 0 ? 'text-danger' : ($product->quantity < 10 ? 'text-warning' : '') }}">
                                @if ($product->quantity > 10)
                                    In Stock
                                @elseif ($product->quantity > 0)
                                    Only {{ $product->quantity }} Left
                                @else
                                    Out of Stock
                                @endif
                            </h4>
                            

                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">
                                        Size Guide
                                    </button>
                                    <div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="sizeGuideModalLabel">Size Guide</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="sizeImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <div id="inchesSection" class="text-center">
                                                                    <span class="badge bg-secondary">Inches</span>
                                                                    <img src="{{ asset('images/size-guide-inches.png') }}" alt="Size Guide Inches" class="d-block w-100 img-fluid rounded shadow-sm">
                                                                </div>
                                                            </div>
                                                            <div class="carousel-item">
                                                                <div id="cmSection" class="text-center">
                                                                    <span class="badge bg-secondary">CM</span>
                                                                    <img src="{{ asset('images/size-guide-cm.png') }}" alt="Size Guide CM" class="d-block w-100 img-fluid rounded shadow-sm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev bg-dark small-btn" type="button" data-bs-target="#sizeImagesCarousel" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next bg-dark small-btn" type="button" data-bs-target="#sizeImagesCarousel" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                                            


                                    <br>
                                    <h5 class="">Colors</h5>
                                    <hr>
                                    <div class="image-selector">
                                        <!-- Color options as images -->
                                        <img src="{{ asset('images/black.jfif') }}" class="product-color active" alt="black" data-color="black" onclick="selectColor('black')">
                                        <img src="{{ asset('images/brown.png') }}" class="product-color" alt="brown" data-color="brown" onclick="selectColor('brown')">

                                        <!-- Hidden input to store the selected color value -->
                                        <input type="hidden" id="selected-color" name="color" value="black">
                                    </div>




                                    <hr>
                                    <h5 class="">Sizes</h5>
                                    <select name="size" class="form-select" aria-label="Default select example" required>
                                        <option selected disabled value="">Select Size</option>
                                        <option value="S (US 4-6)">S (US 4-6)</option>
                                        <option value="M (US 8-10)">M (US 8-10)</option>
                                        <option value="L (US 12-14)">L (US 12-14)</option>
                                        <option value="XL (US 16-18)">XL (US 16-18)</option>
                                        <option value="2XL">2XL</option>
                                        <option value="3XL">3XL</option>
                                        <option value="4XL">4XL</option>
                                        <option value="5XL">5XL</option>
                                    </select>

                                    <hr>
                                    <span class="text-dark font-weight-bold">Add</span>
                                    <input type="number" name="quantity" min="1" max="{{ $product->quantity }}" style="width: 70px;" required>

                                    <hr>
                                    <div class="d-flex">

                                            <button type="submit" class="btn-cart">Add to Cart</button>
                                        </form>

                                        {{-- <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-dark ">Add to Wishlist</button>
                                        </form> --}}
                                    </div>


                                <hr>
                                <div class="feature-icons">
                                    <div class="feature-icon">
                                        <i class="fas fa-shipping-fast"></i>
                                        <span>Free Shipping Sitewide</span>
                                    </div>
                                    <div class="feature-icon">
                                        <i class="fas fa-couch"></i>
                                        <span>100% Real Leather</span>
                                    </div>
                                    <div class="feature-icon">
                                        <i class="fas fa-undo-alt"></i>
                                        <span>30 Days Return Policy</span>
                                    </div>
                                    <div class="feature-icon">
                                        <i class="fas fa-shield-alt"></i>
                                        <span>100% Secure Shopping</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div></div>
            <div class="container my-5">
                <div class="text-center mb-4">
                    <div class="tab-navigation text-center my-4">
                        <a href="#carouselExample" class="btn tab-btn " data-slide-to="0">Description</a>
                        <a href="#carouselExample" class="btn tab-btn" data-slide-to="1">Specifications</a>
                        <a href="#carouselExample" class="btn tab-btn" data-slide-to="2">Product Care</a>
                      
                    </div>
                </div>
                
            
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner text-right">
                        <!-- Description Section -->
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="mt-4 mb-3">Description</h3>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">{{ $product->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <!-- Specifications Section -->
                        <div class="carousel-item">
                            <div class="container mt-5">
                                <div class="row align-items-center">
                                    <!-- Image Section -->
                                    <div class="col-md-4 text-center">
                                        @php
                                            $images = json_decode($product->productimage);
                                        @endphp
                                        @if (is_array($images) && !empty($images))
                                            <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid img-product rounded shadow">
                                        @else
                                            <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-fluid img-product rounded shadow">
                                        @endif
                                    </div>
                                    
                                    <!-- Specifications Section -->
                                    <div class="col-md-6">
                                        <h2 class="text-dart">Specifications</h2>
                                        <ul class="list-unstyled mt-3 text-dark">
                                            <li><i class="bi bi-shield-fill" ></i> <strong>Outer Shell:</strong> Real Leather</li>
                                            <li><i class="bi bi-person-badge-fill" ></i> <strong>Leather Type:</strong> Sheepskin</li>
                                            <li><i class="bi bi-palette-fill"></i> <strong>Leather Finish:</strong> Aniline</li>
                                            <li><i class="bi bi-heart-fill" ></i> <strong>Inner Shell:</strong> Quilted viscose lining</li>
                                            <li><i class="bi bi-arrow-bar-right" ></i> <strong>Closure Style:</strong> Button</li>
                                            <li><i class="bi bi-award-fill" ></i> <strong>Collar Style:</strong> Notch</li>
                                            <li><i class="bi bi-scissors" ></i> <strong>Cuffs Style:</strong> Open Hem</li>
                                            <li><i class="bi bi-box-seam" ></i> <strong>Outside Pockets:</strong> Two</li>
                                            <li><i class="bi bi-palette" ></i> <strong>Color:</strong> Black</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
            
                     <!-- Product Care Section -->
<div class="carousel-item">
    <div class="container py-4">
        <h2 class="text-center mb-4">Product Care</h2>
        <div class="row align-items-center">
            <!-- Image Section -->
            <div class="col-md-4 text-center">
                <img src="{{ asset('images/made-to-fit.png') }}" alt="Leather Jacket" class="img-fluid rounded shadow">
            </div>
            <!-- Care Details Section -->
            <div class="col-md-8">
                <h3 class="mb-3">Care Details</h3>
                <div class="row">
                    <!-- Dos Section -->
                    <div class="col-md-6">
                        <h4>Dos:</h4>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Store properly.</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Clean spills promptly.</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Apply a leather conditioner.</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Waterproof as needed.</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Protect from extremes.</li>
                            <li><i class="bi bi-check-circle-fill text-success me-2"></i> Seek professional care.</li>
                        </ul>
                    </div>
                    <!-- Don'ts Section -->
                    <div class="col-md-6">
                        <h4>Don'ts:</h4>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Avoid wire hangers.</li>
                            <li><i class="bi bi-x-circle-fill text-danger me-2"></i> No harsh chemicals.</li>
                            <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Don't over-condition.</li>
                            <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Avoid heavy rain.</li>
                            <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Prevent contact with sharp objects.</li>
                            <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Don't attempt DIY repairs.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  


                    </div>
                </div>
            </div>
   
    <hr>
<!-- Related Products Section -->
<div class="contain">
    <div class="related-products mt-5">
        <h3 class="mb-4 text-center">Related Products</h3>
        <div class="d-flex overflow-auto" style="gap: 1rem;">
            @foreach ($relatedproduct as $related)
                <div class="card h-100 shadow-sm border-0 text-center d-flex flex-column" style="min-width: 16rem;">
                    @php
                        $images = json_decode($related->productimage);
                    @endphp
                    <div class=" card card-img   ">
                        @if(is_array($images) && !empty($images))
                            <img src="{{ asset($images[0]) }}" alt="{{ $related->name }}" class="shadow-sm rounded product-image">
                        @else
                            <img src="{{ asset('images/No-image-available.jpg') }}" alt="No Image" class="img-fluid shadow-sm rounded-circle">
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center" style="min-height: 150px;">
                        <span class="fw-bold mb-1 text-truncate" style="max-width: 100%;">{{ ucwords($related->name) }}</span>
                        <b class="text">${{ number_format($related->price, 2) }} USD</b>
                        @if($related->offprice)
                            <span class="text-muted">
                                <del>${{ number_format($related->offprice, 2) }} USD</del>
                            </span>
                        @endif
                    </div>
                    <div class="card border-0 bg-transparent mt-auto">
                        <a href="{{ route('product_details', ['slug' => Str::slug($related->slug)]) }}" class="btn btn-dark">View Product</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



        <footer>
            @include('components.footer')
        </footer>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const stars = document.querySelectorAll(".star");
    const ratingInput = document.getElementById("rating");

    stars.forEach((star) => {
        star.addEventListener("mouseover", () => {
            // Highlight stars up to the hovered star
            resetStars();
            highlightStars(star.dataset.value);
        });

        star.addEventListener("mouseout", resetStars);

        star.addEventListener("click", () => {
            // Set the rating value
            ratingInput.value = star.dataset.value;
            lockStars(star.dataset.value);
        });
    });

    function highlightStars(value) {
        stars.forEach((star) => {
            if (star.dataset.value <= value) {
                star.classList.add("hovered");
            }
        });
    }

    function resetStars() {
        stars.forEach((star) => star.classList.remove("hovered"));
    }

    function lockStars(value) {
        stars.forEach((star) => {
            if (star.dataset.value <= value) {
                star.classList.add("selected");
            } else {
                star.classList.remove("selected");
            }
        });
    }
});

</script>
        <script src="{{asset('js/product-detail.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
