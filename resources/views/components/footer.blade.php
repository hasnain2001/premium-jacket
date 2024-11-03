<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Footer</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            list-style-type: none;
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
            .footer .col {
                margin-bottom: 20px;
            }
            .footer .d-flex-mobile {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
<!-- Footer -->
<br>
<footer class="footer pt-3 pb-3">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-19 col-md-2 text-md-end text-center mb-6">
                <a href="/">
                    <img class="logofooter" src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
            </div>

            <div class="col-15 col-md-5 d-flex flex-column flex-md-row justify-content-md-between mb-5 d-flex-mobile">
                <div>
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('product') }}">Shop</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="footer-heading">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li>Email: <a href="mailto:info@premiumleatherstyle.com" class="btn btn-sm">info@premiumleatherstyle.com</a></li>
                        <li>Address: Plano, TX USA</li>
                    </ul>
                </div>
            </div>

            <div class="col-16 col-md-2 text-md-start text-center mb-4">
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
