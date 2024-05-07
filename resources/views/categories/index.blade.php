<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            padding-top: 50px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .category-list {
            list-style: none;
            padding: 0;
        }
        .category-item {
            display: inline-block;
            margin: 10px 20px;
        }
        .category-link {
            display: block;
            width: 150px;
            height: 150px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            line-height: 150px;
            font-size: 20px;
            color: #333;
            text-decoration: none;
            transition: transform 0.3s ease;
        }
        .category-link:hover {
            transform: scale(1.1);
            color: #0056b3;
        }
        .logout-button {
            position: fixed;
            right: 10px;
            top: 10px;
        }
    </style>
</head>
<body>
    <div class="logout-button">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    <div class="container">
        <h1>Select Category</h1>
        <ul class="category-list">
            @foreach ($categories as $category)
                <li class="category-item">
                    <a href="{{ route('categories.show', $category->id) }}" class="category-link">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
