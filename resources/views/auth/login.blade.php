<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Task Tracker</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            font-family: Arial, sans-serif;
            color: #1f2937;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .logo {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #2563eb;
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .subtitle {
            margin: 0 0 30px;
            color: #6b7280;
            font-size: 14px;
        }

        .google-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 13px 20px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            background: white;
            color: #374151;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .google-btn:hover {
            background: #f9fafb;
            border-color: #9ca3af;
        }

        .google-icon {
            width: 20px;
            height: 20px;
        }

        .footer {
            margin-top: 25px;
            color: #9ca3af;
            font-size: 12px;
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="login-card">

        <div class="logo">
            ✓
        </div>

        <h1>Task Tracker</h1>

        <p class="subtitle">
            Manage your tasks, stay organized, and get things done.
        </p>

        <a href="{{ route('google.login') }}" class="google-btn">

            <svg class="google-icon"
                 viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">

                <path fill="#4285F4"
                      d="M21.35 12.27c0-.79-.07-1.55-.2-2.27H12v4.3h5.23a4.47 4.47 0 0 1-1.94 2.93v2.44h3.14c1.84-1.69 2.92-4.18 2.92-7.4z"/>

                <path fill="#34A853"
                      d="M12 21.99c2.63 0 4.84-.87 6.45-2.35l-3.14-2.44c-.87.58-1.98.92-3.31.92-2.54 0-4.69-1.72-5.46-4.03H3.3v2.52A9.74 9.74 0 0 0 12 21.99z"/>

                <path fill="#FBBC05"
                      d="M6.54 14.09a5.85 5.85 0 0 1 0-3.73V7.84H3.3a9.99 9.99 0 0 0 0 8.77l3.24-2.52z"/>

                <path fill="#EA4335"
                      d="M12 6.33c1.43 0 2.72.49 3.73 1.45l2.8-2.8C16.84 3.41 14.63 2.5 12 2.5a9.74 9.74 0 0 0-8.7 5.34l3.24 2.52C7.31 8.05 9.46 6.33 12 6.33z"/>

            </svg>

            Continue with Google

        </a>

        <div class="footer">
            &copy; {{ date('Y') }} Task Tracker. All rights reserved.
        </div>

    </div>

</div>

</body>
</html>