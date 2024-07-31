<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Navbar</title>
    <style>
        .nav-link {
            color: white !important;
        }
        nav {
            background-color: #690500;
        }
        .nav-item {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 700;
            padding-right: 15px;
            margin-right: 10px;
        }
        .search-input {
            display: none;
            width: 200px;
            transition: width 0.4s ease-in-out;
        }
        .navbar-brand {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .navbar-collapse {
            justify-content: space-between;
        }
        .btn-brown {
            background-color: brown;
            color: white;
        }
        .btn-brown:hover {
            background-color: darkbrown;
            color: white;
        }
        .search-container {
            display: flex;
            align-items: center;
        }
        .search-container.show .search-input,
        .search-container.show .search-submit {
            display: inline-block;
        }
        .search-container .search-button {
            border: none;
            background: none;
            color: white;
        }
        .search-container.show .search-button {
            color: black;
        }
        .icon-text {
            display: flex;
            align-items: center;
            font-size: 15px;
            padding:5px;
            color: white;
        }
        .icon-text i {
            margin-right: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach ($genders as $gender)
                    <li class="nav-item {{ Request::routeIs('gender') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('gender_details', ['name' => Str::slug($gender->name)]) }}">{{ $gender->name }}</a>
                    </li>
                @endforeach
                <li class="nav-item {{ Request::routeIs('categories') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                </li>
                <li class="nav-item {{ Request::routeIs('product') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('product') }}">Shop</a>
                </li>
                <li class="nav-item {{ Request::routeIs('blog') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('blog') }}">Blogs</a>
                </li>
            </ul>
            <a class="navbar-brand text-white" href="/">Premium | Jackets</a>

            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->is_admin)
                        <a href="{{ url('/admin/home') }}" class="btn">
                            <span class="icon-text"><i class="fas fa-user-shield"></i>Admin Dashboard</span>
                        </a>
                    @else
                        <a href="{{ url('/home') }}" class="nav-link">
                            <span class="icon-text"><i class="fas fa-tachometer-alt"></i>Dashboard</span>
                        </a>
                    @endif
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <span class="icon-text"> <i class="fas fa-sign-out-all"></i> LogOut</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-sm">
                        <span class="icon-text"><i class="fas fa-sign-in-alt"></i>Log in</span>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class=" btn-sm">
                            <span class="icon-text"><i class="fas fa-user-plus"></i>Register</span>
                        </a>
                    @endif
                    @if (Route::has('admin.login'))
                        <a href="{{ route('admin.login') }}" class="btn-sm ">
                            <span class="icon-text"><i class="fas fa-user-shield"></i>Admin Login</span>
                        </a>
                    @endif
                @endauth
            @endif
            <form class="form-inline  my-lg-0 search-container">
                <input class="form-control  search-input" type="search" placeholder="Search" aria-label="Search">
                <button class="search-button" type="button"><i class="fas fa-search"></i></button>
            </form>

                <a class="icon-text" href="{{ route('wishlist.index') }}"><i class="fas fa-heart"></i></a>
                <a class="icon-text" href="{{ route('wishlist.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                </a>


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
                $('.search-container').toggleClass('show');
                $('.search-input').focus();
            });
        });
    </script>
</body>
</html>
