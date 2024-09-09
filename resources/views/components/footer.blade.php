<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Footer</title>

    <link rel="stylesheet" href="{{ asset('cssfile/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- For Font Awesome icons -->
</head>
<body>
<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <a href="/">
                    <img class="logofooter" src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 col-md-3">
                <h5 class="footer-heading">About Us</h5>
                <p>Welcome to Hide Leather Style, where you can shop for the finest leather jackets. A multitude of leather jackets, including bomber jackets, shearling fur jackets, biker jackets, vintage-style leather jackets, and more, are accessible for both men and women at our online shop. We offer something for everyone, whether you’re hunting for a traditional leather jacket to add to your outfit or a statement item to stand out.</p>
            </div>

            <div class="col-12 col-md-3 " >
                <h5 class="footer-heading">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('product') }}">Shop</a></li>
                    <li><a href="/">Contact</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-3">
                <h5 class="footer-heading">Contact Us</h5>
                <ul>
                    <li><span>info@example.com</span></li>
                    <li><span>+123 456 7890</span></li>
                    <li><span>123 Main St, City, Country</span></li>
                </ul>
            </div>

            <div class="col-12 col-md-3">
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

                <p>developed by <a href="https://alphaisoft.com/" target="blank" class="text-primary"> alpha ai solution.</a></p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('bootstrap-5.0.2/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
