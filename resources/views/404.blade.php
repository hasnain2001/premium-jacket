<!DOCTYPE html>
<html lang="en" data-topbar-color="dark">
<head>
    <meta charset="utf-8" />
    <title>Error Page | 404 | Page not Found | Ubold - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/head.js') }}"></script>

    <!-- Bootstrap css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-4 mb-4">
                    <div class="error-text-box">
                        <svg viewBox="0 0 600 200">
                            <!-- Symbol-->
                            <symbol id="s-text">
                                <text text-anchor="middle" x="50%" y="50%" dy=".35em">404!</text>
                            </symbol>
                            <!-- Duplicate symbols-->
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                        </svg>
                    </div>
                    <div class="text-center">
                        <h3 class="mt-0 mb-2">Whoops! Page not found </h3>
                        <p class="text-muted mb-3">It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us. You might want to check your Url and  connection. Here's a little tip that might help you get back on track.</p>
                        <a href="{{ url('/') }}" class="btn btn-success waves-effect waves-light">Back to Home</a>
                    </div>
                    <!-- end row -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
    <!-- end page -->
  
</body>
</html>
