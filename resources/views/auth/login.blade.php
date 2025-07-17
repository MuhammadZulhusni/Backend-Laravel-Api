<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/favicon.png') }}">
    <link href="{{ asset('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
        }
        .authincation-content {
            background-color: #ffffff !important; /* Forced white background */
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        /* Set default text color for elements inside the white card to dark */
        .authincation-content,
        .authincation-content h4,
        .authincation-content label,
        .authincation-content p {
            color: #333333 !important; /* Dark text color for readability on white */
        }
        .authincation-content a.text-primary {
             color: #6c5ce7 !important;
        }
        .authincation-content p a.text-primary {
             color: #6c5ce7 !important;
        }

        .auth-form {
            padding: 40px;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            color: #333333 !important; /* FORCED black text inside input fields */
        }
        .form-control:focus {
            border-color: #6c5ce7;
            box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
        }
        .btn-primary {
            background-color: #6c5ce7;
            border-color: #6c5ce7;
            border-radius: 8px;
            padding: 12px 0;
            font-weight: 700;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #5a4dc2;
            border-color: #5a4dc2;
        }
        a:hover {
            text-decoration: underline;
        }
        .custom-control-label::before,
        .custom-control-label::after {
            border-radius: 5px;
        }
        .alert-danger {
            background-color: #fdd;
            border-color: #fcc;
            color: #c00;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .logo-login {
            max-width: 150px;
            height: auto;
            margin-bottom: 25px;
        }
    </style>
</head>

<body class="vh-100 d-flex align-items-center justify-content-center">
    <div class="authincation h-100 w-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                    <div class="authincation-content card">
                        <div class="card-body auth-form p-sm-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('backend/images/logo.png') }}" alt="Logo" class="logo-login">
                            </div>
                            <h4 class="text-center mb-5 font-weight-bold">Sign in to your Account</h4>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-4">
                                    <label class="mb-1"><strong>Email Address</strong></label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>

                                <div class="form-row d-flex justify-content-between align-items-center mt-4 mb-4">
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox ml-1">
                                            <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                                            <label class="custom-control-label" for="remember_me">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                </div>
                            </form>

                            <div class="new-account mt-4 text-center">
                                <p class="mb-0">Don't have an account?
                                    <a class="text-primary font-weight-bold" href="./page-register.html">Sign Up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/deznav-init.js') }}"></script>
</body>
</html>