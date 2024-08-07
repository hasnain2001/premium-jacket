<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premium | Jackets</title>
      <!-- Bootstrap css -->
      <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
 <link rel="stylesheet" href="{{ asset('cssfile/home.css') }}">
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
