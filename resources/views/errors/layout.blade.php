<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Error')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            color: #1a202c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .error-container {
            text-align: center;
        }
        .error-code {
            font-size: 100px;
            font-weight: bold;
            color: #6c757d;
        }
        .error-message {
            font-size: 24px;
            margin-top: 10px;
        }
        .error-actions a {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .error-actions a:hover {
            background-color: #084298;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">@yield('code', 'Error')</div>
        <div class="error-message">@yield('message', 'Something went wrong.')</div>
        <div class="error-actions">
            <a href="{{ url('/') }}">Go Home</a>
        </div>
    </div>
</body>
</html>
