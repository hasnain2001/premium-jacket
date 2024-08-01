<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

    <nav>
    @include('components.navbar')
</nav>
     <br><br><br><br>



<div class="container">
                       <h1 class="text-center">Categories</h1>
                     <main class="main_content">
                   @if ($categories->isEmpty())

                   <p>no categories found</p>
                       @else

                        <div class="row">
                            @foreach ($categories as $category)
                            <div class="col-12 col-md-6 col-lg-3 mb-3">
                                <div class="card shadow p-4 category-card">
                                    <div class="card-body">
                                        <a href="{{ route('category_details', ['slug' => Str::slug($category->slug)]) }}" class="text-decoration-none">

                                            <h4 class=" text-dark ">{{ $category->title }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </main></div>

</body>
</html>
