<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Message</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
        }
        .card-body p {
            margin: 0;
            padding-left: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h2 class="mb-0">Contact Form Message</h2>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong></p>
                <p>{{ $name }}</p>

                <p><strong>Email:</strong></p>
                <p>{{ $email }}</p>

                <p><strong>Message:</strong></p>
                <p>{{ $messageContent }}</p>
            </div>
        </div>
    </div>
</body>
</html>
