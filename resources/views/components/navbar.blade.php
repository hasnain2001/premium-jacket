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
    <link rel="stylesheet" href="{{ asset('cssfile/navbar.css') }}">
    <title>Navbar</title>
<style>
    /* public/css/app.css */
#autocomplete-results {
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    max-height: 200px;
    overflow-y: auto;
    z-index: 1000;
}

#autocomplete-results .list-group-item {
    cursor: pointer;
}

#autocomplete-results .list-group-item:hover {
    background-color: #f1f1f1;
}

</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-white" href="/"> <img class="logo-nav" src="{{ asset('images/logo.png') }}" alt=""> </a>
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

            <div class="navbar-right">
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->is_admin)
                            <a href="{{ url('/admin/home') }}" class="btn-sm">
                                <span class="auth"><i class="fas fa-user-shield"></i>Admin Dashboard</span>
                            </a>
                        @else
                            <a href="{{ url('/home') }}" class="btn-sm">
                                <span class="auth"><i class="fas fa-tachometer-alt"></i>Dashboard</span>
                            </a>
                        @endif
                        <a href="{{ route('logout') }}" class="btn-sm"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="auth"> <i class="fas fa-sign-out-alt"></i> LogOut</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-sm">
                            <span class="auth"><i class="fas fa-sign-in-alt"></i>Log in</span>
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-sm">
                                <span class="auth"><i class="fas fa-user-plus"></i>Register</span>
                            </a>
                        @endif
                        @if (Route::has('admin.login'))
                            <a href="{{ route('admin.login') }}" class="btn-sm">
                                <span class="auth"><i class="fas fa-user-shield"></i>Admin Login</span>
                            </a>
                        @endif
                    @endauth
                @endif
                <div class="dropdown search-container">
                    <button class="search-button dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="dropdownMenuButton">
                        <form action="{{ route('search.index') }}" method="GET" class="form-inline">
                            <input id="search-input" class="form-control mr-sm-2 search-input" type="search" name="query" placeholder="Search" aria-label="Search">
                      
                        </form>

                    </div>
                </div>
                <a class="icon-cart" href="{{ route('wishlist.index') }}"><i class="fas fa-heart"></i></a>
                <a class="icon-cart" href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-input').on('input', function() {
                let query = $(this).val();
                if (query.length > 2) { // Minimum length for suggestions
                    $.ajax({
                        url: '{{ route('search.autocomplete') }}',
                        method: 'GET',
                        data: { query: query },
                        success: function(data) {
                            $('#autocomplete-results').empty();
                            if (data.length > 0) {
                                data.forEach(item => {
                                    $('#autocomplete-results').append(
                                        `<li class="list-group-item">${item.title}</li>`
                                    );
                                });
                            } else {
                                $('#autocomplete-results').append(
                                    `<li class="list-group-item">No results found</li>`
                                );
                            }
                        }
                    });
                } else {
                    $('#autocomplete-results').empty();
                }
            });

            // Hide suggestions on item click or when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#search-input').length) {
                    $('#autocomplete-results').empty();
                }
            });
        });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        document.querySelector('.search-button').addEventListener('click', function() {
            document.querySelector('.search-container').classList.toggle('show');
        });
    </script>
</body>
</html>
