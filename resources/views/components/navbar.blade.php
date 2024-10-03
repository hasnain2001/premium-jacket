<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap 5.0.2 CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}">

    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('cssfile/navbar.css') }}">

    <style>
        nav {
            background-color: #690500;
            height: 100px;
            width: 100%;
        }
        .logo{
height: 120px;
width: 100%;
        }
        .navbar-custom .nav-link {
            color: #fff !important;
        }
        .navbar-brand {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .navbar-collapse {
            justify-content: space-between;
        }

        .nav-item {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 700;
            padding-right: 15px;
            margin-right: 10px;
        }
        .nav-item.dropdown:hover .dropdown-menu {
            display: block; /* Show dropdown on hover */
        }


        .search-container .search-input {
            width: 300px;
        }
        .search-container .search-button {
            border: none;
            background: 0 0;
            color: #fff;
        }
        #autocomplete-results {
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            position: absolute;
            width: 200px;
        }
        #autocomplete-results .list-group-item {
            cursor: pointer;
        }
        #autocomplete-results .list-group-item:hover {
            background-color: #f1f1f1;
        }
        #myBtn,
.loader {
    position: fixed;
}
::-webkit-scrollbar {
    width: 20px;
}
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb {
    background: #990c0c;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
    background: #ca3b3b;
}
.loader {
    width: 120px;
    height: 20px;
    background: linear-gradient(#990c0c 0 0) 0/0 no-repeat #ddd;
    animation: 2s linear infinite l1;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
}
@keyframes l1 {
    100% {
        background-size: 100%;
    }
}
#myBtn {
    display: none;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    border: none;
    outline: 0;
    background-color: #990c0c;
    color: #fff;
    cursor: pointer;
    padding: 15px;
    border-radius: 10px;
    font-size: 18px;
}
#myBtn:hover {
    background-color: #555;
}
        @media (max-width: 768px) {
            nav {
                height: auto;
            }
            .navbar-brand {
                position: static;
                transform: none;
            }
            .navbar-right {
                flex-direction: column;
                align-items: flex-start;
            }
        }
        .icon-cart {
    font-size: 24px; /* Increase icon size */
    color: #ffffff; /* Set a default color for the icon */
    transition: color 0.3s, transform 0.3s; /* Add transition for smooth hover effect */
}

.icon-cart:hover {
    color: #302d2d; /* Change color on hover */
    transform: scale(1.1); /* Slightly enlarge on hover */
}

.icon-cart .badge {
    font-size: 14px; /* Adjust badge font size */
    padding: 0.5em; /* Add some padding */
    border-radius: 50%; /* Ensure the badge is circular */
}
.navbar-toggler-icon {
background-color: white;
    color: white;
}


    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <a class="navbar-brand" href="/">
            <img class=" logo" src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto left-items">
                @foreach ($genders as $gender)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{ $gender->id }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $gender->name }}
                    </a>
                    @if(isset($categoriesByGender[$gender->name]) && $categoriesByGender[$gender->name]->isNotEmpty())
                        <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown{{ $gender->id }}">
                            @foreach ($categoriesByGender[$gender->name] as $category)
                                <li><a href="{{ route('category_details', ['slug' => Str::slug($category->slug)]) }}" class="dropdown-item text-white ">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product') }}">SHOP</a>
                </li>
            </ul>

            <div class="navbar-right right-items">
                <a class="nav-link" href="{{ route('blog') }}">
                    <i class="fas fa-blog"></i> Blogs
                </a>

                <div class="search-container">
                    <button class="search-button" type="button" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ Auth::user()->is_admin ? url('/admin/home') : url('/home') }}" class="btn btn-sm text-white">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                        <a href="{{ route('logout') }}" class="btn btn-sm text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> LogOut
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm text-white">
                            <i class="fas fa-sign-in-alt"></i> Log in
                        </a>
                    @endauth
                @endif

                <a class="icon-cart position-relative text-decoration-none" href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $cartCount }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>



            </div>
        </div>
    </nav>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="searchModalLabel">Search</h5>

                </div>
                <div class="modal-body">
                    <form action="{{ route('search.index') }}" method="GET">
                        <input id="search-input" class="form-control search-input" type="search" name="query" placeholder="Search">
                        <ul id="autocomplete-results" class="list-group"></ul>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark text-white" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
        </svg>
    </button>
    <div id="loader" class="loader"></div>

    <script>

        // Hide the loader once the page is fully loaded
        window.addEventListener('load', function() {
            var loader = document.getElementById('loader');
            loader.style.display = 'none';
        });

        // Scroll to top button functionality
        let mybutton = document.getElementById("myBtn");
        window.onscroll = function() { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
        }
    </script>

</body>
</html>
