<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Footer</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{asset('cssfile/footer.css')}}">
</head>
<body>
<!-- Footer -->
<br>
<footer class="footer pt-4 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-2 text-center text-md-start">
                <a href="/">
                    <img class="logofooter" src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="col-12 col-md-2 mb-4 mb-md-0">
                <h5 class="footer-heading">Hot Collection</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('gender_details', ['name' => 'mens']) }}">Men</a></li>
                    <li><a href="{{ route('gender_details', ['name' => 'women']) }}">Women</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Shirts & Shorts</a></li>
                    <li><a href="#">Discover</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3 mb-4 mb-md-0">
                <h5 class="footer-heading">Information</h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                    <li><a href="{{ route('term-condition') }}">Term & Conditions</a></li>
                    <li><a href="{{ route('Delivery-Information') }}">Delivery Information</a></li>
                    <li><a href="{{ route('Refund-Exchange-Policy') }}">Refund/Exchange Policy</a></li>
                    <li><a href="{{ route('Terms-of-service') }}">Terms of Service</a></li>
                    <li><a href="{{ route('faqs') }}">FAQ'S</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-2 d-flex flex-column flex-md-row justify-content-between mb-4 mb-md-0">
                <div>
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('product') }}">Shop</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-3 d-flex flex-column flex-md-row justify-content-between mb-4 mb-md-0">
                <div class="newsletter-section p-3 shadow rounded-1 ">
                    <h6 class="subcribe-h">Subscribe to our Newsletter</h6>
                    <form action="#" class="">
                        <div class="d-flex gap-2">
                            <input type="email" name="" class="form-control" id="" placeholder="Enter your email">
                            <button type="submit" class="btn btn-dark rounded text-white px-4">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 text-center text-md-start">
                <h5 class="footer-heading">Men Fashion Jackets Collection</h5>
<ul class="list-unstyled">
<li><a href="{{ route('category_details', ['slug' => 'men-suede-leather-jackets']) }}">Men Suede Leather Jackets</a></li>
<li><a href="{{ route('category_details', ['slug' => 'men-fur-and-shearling-coats']) }}">Fur & Shearling Coats</a></li>
<li><a href="{{ route('category_details', ['slug' => 'men-bomber-jacket']) }}">Men Bomber Jacket</a></li>
<li><a href="{{ route('category_details', ['slug' => 'men-varsity-jackets']) }}">Varsity Jackets</a></li>
<li><a href="{{ route('category_details', ['slug' => 'men-fur-and-shearling-leather-jackets']) }}">Fur & Shearling Leather Jackets</a></li>
<li><a href="{{ route('category_details', ['slug' => 'men-puffer-leather-jackets']) }}">Puffer Leather Jackets</a></li>
<li><a href="{{ route('category_details', ['slug' => 'men-leather-vests']) }}">Leather Vests</a></li>
</ul>
            </div>
            <div class="col-12 col-md-2 text-center text-md-start">
<ul class="list-unstyled">
    <li><a href="{{ route('category_details', ['slug' => 'men-trench-coats']) }}">Men Trench Coats</a></li>
    <li><a href="{{ route('category_details', ['slug' => 'men-leather-coats']) }}">Men Leather Coats</a></li>
    <li><a href="{{ route('category_details', ['slug' => 'men-biker-jackets']) }}">Men Biker Jackets</a></li>
  
</ul>
            </div>
            <div class="col-12 col-md-3 text-center text-md-start">
                <h5 class="footer-heading">Women Fashion Jackets Collection</h5>
<ul class="list-unstyled">

<li><a href="{{ route('category_details', ['slug' => 'women-aviator-jackets']) }}">Aviator Jackets</a></li>
<li><a href="{{ route('category_details', ['slug' => 'women-bomber-jackets']) }}">Bomber Jackets</a></li>
<li><a href="{{ route('category_details', ['slug' => 'women-varsity-jackets']) }}">Varsity Jackets</a></li>
<li><a href="{{ route('category_details', ['slug' => 'women-suede-leather-jackets']) }}">Suede Leather Jackets</a></li>
<li><a href="{{ route('category_details', ['slug' => 'women-fur-and-shearling-leather-jackets']) }}">Fur & Shearling Leather Jackets</a></li>
</ul>
            </div>
            <div class="col-12 col-md-2 text-center text-md-start">
<ul class="list-unstyled">
<li><a href="{{ route('category_details', ['slug' => 'women-leather-coats']) }}">Leather Coats</a></li>
<li><a href="{{ route('category_details', ['slug' => 'women-biker-jackets']) }}">Biker Jackets</a></li>
<li><a href="{{ route('category_details', ['slug' => 'women-trench-coats']) }}">Women Trench Coats</a></li>
<li><a href="{{ route('category_details', ['slug' => 'women-leather-vests']) }}">Women Leather Vests</a></li>
<li><a href="{{ route('category_details', ['slug' => 'fur-and-shearling-coats']) }}">Fur & Shearling Coats</a></li>
</ul>
            </div>
            <div class="col-12 col-md-2 text-center text-md-start">
                <h5 class="footer-heading">Shop By Color</h5>
                <ul class="list-unstyled">
                    
                    <li><a href="#">Black Leather Jacket</a></li>
                    <li><a href="#">Brown Leather Jacket</a></li>
                    <li><a href="#">Red Leather Jacket</a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
</footer>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-justify-content-between">
            <!-- Contact Us Section -->
            <div class="col-md-6 text-md-left text-left">
                <h5 class="footer-heading">Contact Us</h5>
                <ul class="list-unstyled mb-0">
                    <li>Email: <a href="mailto:info@premiumleatherstyle.com">info@premiumleatherstyle.com</a></li>
                    {{-- <li>Phone: +1 234 567 890</li> --}}
                </ul>
            </div>
            <!-- Social Links Section -->
            <div class="col-md-6 text-md-right  text-right">
              
<ul class="social-icons d-flex justify-content-end mb-0">
<h5 class=" text-white">Follow Us : </h5>
<li><a href="https://www.facebook.com/premiumleatherstyle/?_rdr" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="https://www.pinterest.com/premiumleatherstyle/" target="_blank"><i class="fab fa-pinterest"></i></a></li>
<li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
</ul>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap JS -->
<script src="{{asset('bootstrap-5.0.2/js/bootstrap.min.js')}}"></script>

</body>
</html>
