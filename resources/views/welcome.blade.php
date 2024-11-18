<?php
header("X-Robots-Tag:index, follow");?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title') Premium Leather Jackets for Men & Women | Premium Leather Style</title>

  <meta name="description" content="Explore a wide range of premium leather jackets for men and women. Shop stylish, durable outerwear and elevate your fashion with top-quality designs.">

<meta name="keywords" content="leather jackets, premium jackets, men's jackets, women's jackets, stylish outerwear, durable jackets, fashion, leatherwear">

<meta name="author" content="Premium Leather Style">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://premiumleatherstyle.com/ @yield('connical')">


      <!-- Bootstrap css -->
      <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
 <link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">

    <!-- verification google and other codes-->
 <meta name="google-site-verification" content="Ra0OjPXhEDJcJfZLSxpUh7zCqQBO1Ps1uFPgJS5A7Kk" />

 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PDLGRGJN3V"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PDLGRGJN3V');
</script>
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>


    <main>
        @yield('main-content')
    </main>

<footer>
    @include('components.footer')
</footer>

</body>
</html>
