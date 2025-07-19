<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>REST-API Backend Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/tab.png') }}">
    <link href="{{ asset('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #6c5ce7;
            --primary-dark: #5649c2;
            --secondary: #00cec9;
            --dark: #1a1a2e;
            --darker: #16213e;
            --light: #e2e8f0;
            --code: #0f172a;
            --success: #00b894;
            --error: #ff7675;
        }
        
        body {
            background-color: var(--dark);
            color: var(--light);
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }
        
        .authincation-content {
            background-color: var(--darker) !important;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            position: relative;
        }
        
        .authincation-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .authincation-content h4,
        .authincation-content label,
        .authincation-content p {
            color: var(--light) !important;
            font-family: 'Inter', sans-serif;
        }
        
        .authincation-content a.text-primary {
            color: var(--secondary) !important;
        }
        
        .authincation-content p a.text-primary {
            color: var(--secondary) !important;
        }
        
        .auth-form {
            padding: 40px;
        }
        
        .form-control {
            background-color: var(--code);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            padding: 12px 15px;
            color: var(--light) !important;
            font-family: 'Roboto Mono', monospace;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
            background-color: var(--code);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            border-radius: 6px;
            padding: 12px 0;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px);
        }
        
        a:hover {
            text-decoration: none;
            opacity: 0.8;
        }
        
        .custom-control-label::before,
        .custom-control-label::after {
            border-radius: 4px;
            background-color: var(--code);
            border-color: rgba(255, 255, 255, 0.2);
        }
        
        .alert-danger {
            background-color: rgba(255, 118, 117, 0.2);
            border-left: 4px solid var(--error);
            color: var(--light);
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-family: 'Roboto Mono', monospace;
        }
        
        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }
        
        .logo-login {
            max-width: 120px;
            height: auto;
            margin-bottom: 20px;
        }
        
        .api-endpoint {
            display: inline-block;
            background: rgba(108, 92, 231, 0.1);
            color: var(--secondary);
            padding: 2px 8px;
            border-radius: 4px;
            font-family: 'Roboto Mono', monospace;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--light);
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1.5rem 0;
        }
        
        .custom-checkbox .custom-control-label::before {
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .custom-control-input:checked~.custom-control-label::before {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: rgba(255, 255, 255, 0.3);
            font-size: 0.8rem;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin: 0 10px;
        }
        
        .status-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--success);
            margin-right: 8px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-header h4 {
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        
        .login-header p {
            color: rgba(255, 255, 255, 0.6) !important;
            font-size: 0.9rem;
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
                            <div class="login-header">
                                <div class="text-center mb-4">
                                    <img src="{{ asset('backend/images/tab.png') }}" alt="API Logo" class="logo-login">
                                </div>
                                <h4 class="mt-3">Dashboard Authentication</h4>
                                <p>Authenticate to access the admin dashboard</p>
                            </div>

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

                                <div class="form-group">
                                    <label for="email">EMAIL ADDRESS</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="user@example.com">
                                </div>

                                <div class="form-group">
                                    <label for="password">PASSWORD</label>
                                    <input type="password" id="password" name="password" class="form-control" required placeholder="••••••••">
                                </div>

                                <div class="remember-forgot">
                                    <div class="custom-control custom-checkbox">
                                    </div>
                                    <div>
                                        <span class="text-muted" style="font-size: 0.95em;">
                                            Forgot your password?&nbsp;
                                        </span>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-primary">Reset Password</a>
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                    <span class="status-indicator"></span> Login
                                </button>
                            </form>
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