<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Navbar</title>
    <style>
        .nav-link.active {
            background-color: white;
            color: black !important;
        }
        nav{
            background-color: brown;
        }
        .search-input {
            display: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::routeIs('gender') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('gender') }}">Gender</a>
                </li>
                <li class="nav-item {{ Request::routeIs('categories') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                </li>
                <li class="nav-item {{ Request::routeIs('product') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('product') }}">All Product</a>
                </li>
                <li class="nav-item {{ Request::routeIs('blog') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('blog') }}">Blogs</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 search-button" type="button"><i class="fas fa-search"></i></button>
                <button class="btn btn-outline-success my-2 my-sm-0 search-submit" type="submit" style="display:none;">Search</button>
            </form>
                      @if (Route::has('login'))

                @auth
                    @if (Auth::user()->is_admin)
                        <a href="{{ url('/admin/home') }}" class="btn btn-brown rounded-md px-3 py-2 mx-1">
                            Admin Dashboard
                        </a>
                    @else
                        <a href="{{ url('/home') }}" class="btn btn-brown rounded-md px-3 py-2 mx-1">
                            Dashboard
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-brown rounded-md px-3 py-2 mx-1">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-brown rounded-md px-3 py-2 mx-1">
                            Register
                        </a>
                    @endif

                    @if (Route::has('admin.login'))
                        <a href="{{ route('admin.login') }}" class="btn btn-brown rounded-md px-3 py-2 mx-1">
                            Login as Admin
                        </a>
                    @endif
                @endauth
                @endif
        </div>
    </nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.search-button').on('click', function() {
                $('.search-input').toggle().focus();
                $('.search-submit').toggle();
            });
        });
    </script>
</body>
</html>
