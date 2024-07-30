<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premium | Jackets</title>
      <!-- Bootstrap css -->
      <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <style>
        .btn-brown {
            background-color: #8B4513;
            color: #fff;
            border: none;
        }

        .btn-brown:hover, .btn-brown:focus {
            background-color: #A0522D;
            color: #fff;
        }
        .carousel{
            height: 100vh;
        }
        .slider{
            height: 100vh;
        }

    </style>
</head>
<body>
    <nav>
        @include('components.navbar')
    </nav>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('images/slider.jpg') }}" class="slider d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/slider1.jpg') }}" class="slider d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/slider2.jpg') }}" class=" slider d-block w-100" alt="...">
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

    <main>
        @yield('main-content')
    </main>

<footer>
    @include('components.footer')
</footer>
       <!-- Vendor js -->
       <script src="{{asset('assets/js/vendor.min.js')}}"></script>

       <!-- App js -->
       <script src="{{asset('assets/js/app.min.js')}}"></script>

       <!-- Plugins js -->
       <script src="{{asset('assets/libs/morris.js06/morris.min.js')}}"></script>
       <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>

       <!-- Dashboard init-->
       <script src="{{asset('assets/js/pages/dashboard-4.init.js')}}"></script>
</body>
</html>
