<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Password Reset</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/tab.png') }}">
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
            --warning: #fdcb6e;
        }
        
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        body {
            background-color: var(--dark);
            color: var(--light);
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .auth-container {
            width: 100%;
            max-width: 480px;
            padding: 0 20px;
        }
        
        .authincation-content {
            background-color: var(--darker);
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
        
        .auth-form {
            padding: 2.5rem;
        }
        
        .text-center {
            text-align: center;
        }
        
        .logo-login {
            max-width: 120px;
            height: auto;
            margin-bottom: 1.5rem;
        }
        
        h4 {
            color: var(--light);
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .text-muted {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            font-weight: 500;
            font-size: 0.875rem;
            color: var(--light);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            background-color: var(--code);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            padding: 0.75rem 1rem;
            color: var(--light);
            font-family: 'Roboto Mono', monospace;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.25);
            outline: none;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-radius: 6px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            display: inline-block;
            cursor: pointer;
            border: none;
            width: 100%;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
        }
        
        .status-message {
            padding: 0.75rem 1rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .status-success {
            background-color: rgba(0, 184, 148, 0.2);
            border-left: 4px solid var(--success);
        }
        
        .status-warning {
            background-color: rgba(253, 203, 110, 0.2);
            border-left: 4px solid var(--warning);
        }
        
        .status-icon {
            font-size: 1.25rem;
        }
        
        .back-to-login {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .back-link {
            color: var(--secondary);
            text-decoration: none;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: opacity 0.3s;
        }
        
        .back-link:hover {
            opacity: 0.8;
            text-decoration: underline;
        }
        
        .back-link svg {
            width: 14px;
            height: 14px;
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <div class="authincation-content">
            <div class="auth-form">
                <div class="text-center mb-4">
                    <img src="{{ asset('backend/images/tab.png') }}" alt="API Logo" class="logo-login">
                </div>
                
                <h4 class="text-center">Reset Password</h4>
                
                <div class="text-muted text-center">
                    Forgot your password? Enter your registered email and we'll send it to your inbox.
                </div>

                @session('status')
                    <div class="status-message status-success">
                        <span class="status-icon">✓</span>
                        {{ $value }}
                    </div>
                @endsession

                @if ($errors->any())
                    <div class="status-message status-warning">
                        <span class="status-icon">!</span>
                        <div>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="form-label">REGISTERED EMAIL</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    </div>

                    <button type="submit" class="btn-primary">
                        Request 
                    </button>
                </form>

                <div class="back-to-login">
                    <a href="{{ route('login') }}" class="back-link">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>