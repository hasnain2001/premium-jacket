<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gender</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '550494357734449'); 
        fbq('track', 'PageView');
        </script>
        <noscript>
         <img height="1" width="1" 
        src="https://www.facebook.com/tr?id=550494357734449&ev=PageView
        &noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    <style>
      .card {
        border: none;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
      }
      .card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      }
      .card h4 {
        font-weight: bold;
        margin-bottom: 0;
        transition: color 0.2s ease-in-out;
      }
      .card:hover h4 {
        color: #690500;
      }
      .text-dark:hover {
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <nav>
      @include('components.navbar')
    </nav>
    <br><br><br>
    <div class="container">
      <div class="row">
        @foreach ($genders as $gender)
          <div class="col-md-3 mb-4">
            <div class="card shadow-sm text-center">
              <div class="card-body">
                <a class="text-dark" href="{{ route('gender_details', ['name' => Str::slug($gender->name)]) }}">
                  <h4>{{ $gender->name }}</h4>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    @include('components.footer')
  </body>
</html>
