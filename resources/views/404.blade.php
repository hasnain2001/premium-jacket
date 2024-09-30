<?php
header("X-Robots-Tag:index, follow");?>
<!DOCTYPE html>
<html lang="en" data-topbar-color="dark">
<head>
    <meta charset="utf-8" />
    <title>Error Page | 404 |  Premium Leather Jackets for Men & Women | Premium Leather Style</title>
    <title></title>

    <meta name="description" content="Explore a wide range of premium leather jackets. Discover stylish and durable outerwear designed for men and women. Shop now and elevate your fashion with our top-quality leather jackets.">

    <meta name="keywords" content="leather jackets, premium jackets, men's jackets, women's jackets, stylish outerwear, durable jackets, fashion, leatherwear">

    <meta name="author" content="Premium Leather Style">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.premiumleatherstyle.com/">

    <!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/head.js') }}"></script>

    <!-- Bootstrap css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />



    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
<nav>
    @include('components.navbar')
</nav>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-4 mb-4">
                    <div class="error-text-box">
                        <svg viewBox="0 0 600 200">
                            <!-- Symbol-->
                            <symbol id="s-text">
                                <text text-anchor="middle" x="50%" y="50%" dy=".35em">404!</text>
                            </symbol>
                            <!-- Duplicate symbols-->
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                        </svg>
                    </div>
                    <div class="text-center">
                        <h3 class="mt-0 mb-2">Whoops! Page not found </h3>
                        <p class="text-muted mb-3">It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us. You might want to check your Url and  connection. Here's a little tip that might help you get back on track.</p>
                        <a href="{{ url('/') }}" class="btn btn-success waves-effect waves-light">Back to Home</a>
                    </div>
                    <!-- end row -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
    <!-- end page -->
<footer>
    @include('components.footer')
</footer>
</body>
</html>
