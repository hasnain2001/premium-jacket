<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Admin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap-5.0.2/css/bootstrap.min.css')}}">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('{{ asset('images/loginadmin.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background: linear-gradient(135deg, #6b73ff 0%, #000dff 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #000dff 0%, #6b73ff 100%);
        }
        .social-list-item {
            width: 40px;
            height: 40px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 18px;
        }
        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2 col-lg-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="150">
                            <h3 class="text-dark">{{ __('Admin Login') }}</h3>
                        </div>
                        <p class="text-muted text-center">Enter your email address and password to access the admin panel.</p>

                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">{{ __('Email Address') }}</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" id="emailaddress" required placeholder="Enter your email" autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <div class="input-group-text" onclick="togglePassword()">
                                        <i id="password-icon" class="mdi mdi-eye-off-outline"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>

                            <div class="text-center d-grid">
                                <button class="btn btn-primary btn-lg" type="submit">Log In</button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <h6 class="text-muted">Sign in with</h6>
                            <ul class="social-list list-inline mt-2 mb-0">
                                <li class="list-inline-item">
                                    <a href="#" class="social-list-item border-primary text-primary">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-list-item border-danger text-danger">
                                        <i class="mdi mdi-google"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-list-item border-info text-info">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="social-list-item border-secondary text-secondary">
                                        <i class="mdi mdi-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('bootstrap-5.0.2/js/bootstrap.min.js')}}"></script>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            if (type === 'password') {
                passwordIcon.classList.remove('mdi-eye-outline');
                passwordIcon.classList.add('mdi-eye-off-outline');
            } else {
                passwordIcon.classList.remove('mdi-eye-off-outline');
                passwordIcon.classList.add('mdi-eye-outline');
            }
        }
    </script>
</body>
</html>
