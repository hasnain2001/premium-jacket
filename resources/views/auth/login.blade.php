<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <style>
        body {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url('{{ asset('images/loginuser.jpg') }}');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Nunito', sans-serif;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #5e2121;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            text-align: center;
            font-weight: 700;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            font-size: 24px;
        }

        .form-control {
            height: 45px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #5e2121;
            border-color: #5e2121;
        }

        .btn-primary:hover {
            background-color: #731f1f;
            border-color: #731f1f;
        }

        .btn-outline-primary {
            color: #5e2121;
            border-color: #5e2121;
        }

        .btn-outline-primary:hover {
            background-color: #5e2121;
            color: white;
        }

        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
        }

        .toggle-password {
            cursor: pointer;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 20px;
            }

            .card-header {
                font-size: 18px;
            }

            .form-check-label {
                font-size: 14px;
            }

            .btn {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card login-card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <div class="input-group-text toggle-password">
                                        <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            </div>

                            <!-- Forgot Password and Register Links -->
                            <div class="d-grid gap-2 mt-3">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-outline-primary" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                @endif
                                <a href="{{ route('register') }}" class="btn btn-dark">{{ __('Register') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.toggle-password').addEventListener('click', function () {
            const passwordField = document.querySelector('#password');
            const toggleIcon = document.querySelector('#togglePasswordIcon');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            toggleIcon.classList.toggle('fa-eye');
            toggleIcon.classList.toggle('fa-eye-slash');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-ZPjRFAMrRcxLRERQvXYcxRk1jCQrBIbsNFAUsgUR5yJ5h3tp7C81JxAlQvZwbvYR" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVQIYx1ZHv5EKyqZb2f7Q4RSjz9+lj+6N27StFN92mBpG5lKNTWFr4NKvP0EgOKS" crossorigin="anonymous"></script>
</body>
</html>
