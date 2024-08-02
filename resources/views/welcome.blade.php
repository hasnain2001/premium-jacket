<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premium | Jackets</title>
      <!-- Bootstrap css -->
      <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">

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
