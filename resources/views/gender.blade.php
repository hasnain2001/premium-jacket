<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gender</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">




  </head>
  <body>
    <nav>
        @include('components.navbar')
    </nav>
    <br><br><br>
<div class="container">

@foreach ($genders as $gender)
<div class="col-md-3">
    <div class="card mb-5 shadow-sm">

        <div class="card-body">
            <a class="text-dark" href="{{ route('gender_details', ['name' => Str::slug($gender->name)]) }}">
                <h4>{{ $gender->name }}</h4>
            </a>
        </div>
    </div>

</div></div>


@endforeach

<x-footer/>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.toggle-search-btn').click(function() {
            $('.form-control').toggle('slow'); // Toggle the search input with a sliding effect (you can change 'slow' to 'fast' or a number in milliseconds)
        });
    });

    document.getElementById('cartForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Get the action URL
        var actionUrl = this.getAttribute('action');

        // Redirect to the action URL
        window.location.href = actionUrl;
    });

</script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>
