<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Luxury Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .title {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .button-box {
            background-color: #e9ecef; /* Light gray background for button box */
            border-radius: 8px;
            margin: 10px 0;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .btn {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
            cursor: pointer;
            width: 80%; /* Make buttons wider within the box */
        }
        .btn:hover {
            background-color: #0056b3;
            color: white;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Welcome to Luxury Store</div>
        <div class="button-box">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        </div>
        <div class="button-box">
            <a href="{{ route('register.form') }}" class="btn btn-secondary">Register</a>
        </div>
    </div>
</body>
</html>
