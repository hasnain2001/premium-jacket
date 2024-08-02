<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('cssfile/footer.css') }}">
</head>
<body>
<!-- Footer -->
<footer class="footer">
    <div class="contain py-4">
        <div class="row">
            <div class="col-md-2 text-center text-md-start">
                <img class="logofooter" src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>

            <div class="col-md-3 text-center text-md-start">
                <button class="collapse-button" type="button" data-bs-toggle="collapse" data-bs-target="#aboutUsContent" aria-expanded="false" aria-controls="aboutUsContent">
                    About Us
                </button>
                <div class="collapse" id="aboutUsContent">
                    <p>Welcome to Hide Leather Style, where you can shop for the finest leather jackets. A multitude of leather jackets, including bomber jackets, shearling fur jackets, biker jackets, vintage-style leather jackets, and more, are accessible for both men and women at our online shop. We offer something for everyone, whether you’re hunting for a traditional leather jacket to add to your outfit or a statement item to stand out.</p>
                </div>
            </div>

            <div class="col-md-2 text-center text-md-start">
                <button class="collapse-button" type="button" data-bs-toggle="collapse" data-bs-target="#quickLinksContent" aria-expanded="false" aria-controls="quickLinksContent">
                    Quick Links
                </button>
                <div class="collapse" id="quickLinksContent">
                    <ul class="list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('product') }}">Shop</a></li>
                        <li><a href="/">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 text-center text-md-start">
                <button class="collapse-button" type="button" data-bs-toggle="collapse" data-bs-target="#contactUsContent" aria-expanded="false" aria-controls="contactUsContent">
                    Contact Us
                </button>
                <div class="collapse" id="contactUsContent">
                    <ul class="list-unstyled">
                        <li><span>info@example.com</span></li>
                        <li><span href="tel:+1234567890">+123 456 7890</span></li>
                        <li><span>123 Main St, City, Country</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-2 text-center text-md-start">
                <button class="collapse-button" type="button" data-bs-toggle="collapse" data-bs-target="#followUsContent" aria-expanded="false" aria-controls="followUsContent">
                    Follow Us
                </button>
                <div class="collapse" id="followUsContent">
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col text-center">
                <p>&copy; 2024 Your Company. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
