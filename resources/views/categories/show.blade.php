<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category: {{ $category->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }
        .item {
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            display: block;
        }
        .item img {
            width: 100%;
            max-width: 300px;
            height: auto;
            border-radius: 5px;
        }
        .price {
            font-weight: bold;
            color: #333;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .ml-auto {
            margin-left: auto;
        }
        .form-inline {
            display: inline-block;
        }
        input[type='number'] {
            width: 60px;
            margin-right: 10px;
        }
        .cart-icon {
            width: 24px; /* Adjust size as needed */
            height: auto;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Category Menu</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                @foreach ($allCategories as $menuCategory)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.show', $menuCategory->id) }}">{{ $menuCategory->name }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Shopping Cart Icon -->
                <li class="nav-item">
                    <a href="{{ route('cart.view') }}">
                        <img src="https://static.vecteezy.com/system/resources/previews/000/356/583/original/vector-shopping-cart-icon.jpg" alt="Cart" class="cart-icon">
                    </a>
                </li>
                <!-- Logout button -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>{{ $category->name }}</h1>
        <input type="text" id="search" oninput="searchItems()" placeholder="Search items...">
        <ul class="list-unstyled">
            @foreach ($category->items as $item)
                <li class="item" data-name="{{ strtolower($item->name) }}">
                    <img src="{{ $item->image }}" alt="{{ $item->name }}">
                    <h5>{{ $item->name }}</h5>
                    <p class="price">${{ number_format($item->price, 2) }}</p>
                    <form action="{{ route('cart.add') }}" method="POST" class="form-inline">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <input type="number" name="quantity" value="1" min="1" class="form-control">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function searchItems() {
            var input = document.getElementById('search');
            var filter = input.value.toLowerCase();
            var nodes = document.querySelectorAll('.item');

            nodes.forEach(function(node) {
                if (node.getAttribute('data-name').includes(filter) || filter === '') {
                    node.style.display = 'block';
                } else {
                    node.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
