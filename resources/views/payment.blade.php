<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>

    <style>
      
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        @include('components.navbar')
    </nav>

    <div class="container text-center">
        <h1 class="display-4 text-danger">Payment Cancelled</h1>
        <div class="alert alert-danger" role="alert">
            There was an issue processing your payment. Please try again later or contact support.
        </div>
        <p>For assistance, you can reach our support team:</p>
        <p>Email: <a href="mailto:support@example.com">support@example.com</a></p>
        <p>Phone: <a href="tel:+1234567890">+1 234 567 890</a></p>
        <a href="{{route('checkout')}}" class="btn btn-primary btn-lg">Return to back to order page </a>
    </div>

    <footer class="">
        @include('components.footer')
    </footer>


</body>
</html>
