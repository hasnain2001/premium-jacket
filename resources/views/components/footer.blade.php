<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Footer</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- For Font Awesome icons -->
    <style>
        .footer {
            background-color: #690500;
            color: white;
        }
        .footer-heading {
            color: white;
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .footer ul {
            padding: 0;
        }
        .footer ul li {
            margin-bottom: 10px;
        }
        .footer a {
            color: rgb(255, 255, 255);
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: none;
            color: #ccc;
            background-color: rgb(129, 119, 119);
        }
        .social-icons a {
            display: inline-block;
            margin-right: 15px;
            color: #ffffff;
            font-size: 18px;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            background-color: transparent;
            color: #1f1b1b;
        }
        .logofooter {
            max-width: 150px;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .footer .row {
                text-align: center;
            }
        }
    </style>
</head>
<body>
<!-- Footer -->
<footer class="footer pt-5 pb-6">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-12 col-md-2 text-md-end text-center mb-4">
                <a href="/">
                    <img class="logofooter" src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
            </div>

            <div class="col-12 col-md-3 text-md-start text-center mb-4">
                <h5 class="footer-heading">About Us</h5>
<p>
Welcome to Hide Leather Style, your destination for premium leather jackets. Discover our collection of bomber, shearling, biker, and vintage jackets for men and women. Whether you want a classic piece or a bold statement jacket, we have something for everyone.
</p>

            </div>

            <div class="col-10 col-md-2 text-md-start text-center mb-5">
                <h5 class="footer-heading">Quick Links</h5>
                <ul class="list-unstyled ">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('product') }}">Shop</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>
                </ul>
            </div>

            <div class="col-10 col-md-3  text-md-start text-center mb-4">
                <h5 class="footer-heading">Contact Us</h5>
                <ul class="list-unstyled">
                    <li><span>Email : info@premiumleatherstyle.com</span></li>
                    {{-- <li><span>Phone : +123 456 7890</span></li> --}}
                    <li><span>address : 3000 Hoffman dr, Plano, Tx USA</span></li>
                </ul>
            </div>

            <div class="col-12 col-md-2 text-md-start text-center mb-4">
                <h5 class="footer-heading">Follow Us</h5>
                <div class="social-icons">
                    <a href="https://facebook.com/premiumleatherstyle" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.pinterest.com/premiumleatherstyle" target="_blank" aria-label="Pinterest"><i class="fab fa-pinterest"></i></a>
                    <a href="#" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col text-center">
                <p>Developed By <a href="https://alphaisoft.com/" target="_blank" class="text-primary">alpha ai solution.</a></p>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
</body>
</html>
