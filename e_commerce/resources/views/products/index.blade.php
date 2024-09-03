<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Products List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #fff;
            overflow-y: auto;
            background: #000;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        /* Video Background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        
        .navbar {
            background-color: #111;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            position: relative;
            z-index: 1;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .navbar a:hover {
            background-color: #333;
            border-radius: 5px;
        }
        .navbar img {
            height: 40px;
        }
        h1 {
            color: #fff;
            text-align: center;
            margin: 30px 0;
            font-size: 2.5em;
            font-weight: 300;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
            margin: 20px auto;
            max-width: 1200px;
            width: 90%; /* Ensure the container adapts to different screen sizes */
            flex-grow: 1;
        }
        .btn-custom {
            background-color: #ff9900;
            color: #fff;
            border-radius: 50px;
            padding: 12px 25px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #ffb84d;
        }
        .form-inline input {
            border-radius: 50px;
            padding: 10px 20px;
            width: 100%;
            max-width: 500px;
            border: 2px solid #ff9900;
            margin-right: 10px;
            color: #000;
        }
        .product-card {
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #222;
            color: #fff;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        }
        .product-img {
            max-width: 100%;
            height: 200px; /* Adjusted height for better visibility */
            object-fit: cover;
            border-bottom: 1px solid #333;
        }
        .card-body {
            padding: 20px;
            text-align: center;
        }
        .card-title {
            color: #29ae60;
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .card-text {
            color: #fff;
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        .description {
            color: #ddd;
            font-size: 0.9rem;
            margin-bottom: 10px;
            text-align: center;
        }

        .card-footer {
            background-color: #111;
            border-top: none;
            text-align: center;
            padding: 10px;
        }
        .btn-warning, .btn-danger {
            border-radius: 50px;
            padding: 5px 15px;
            font-size: 0.9rem;
            color: #fff;
            text-decoration: none;
        }
        .btn-warning {
            background-color: #e67e22;
            border: none;
        }
        .btn-warning:hover {
            background-color: #d35400;
        }
        .btn-danger {
            background-color: #e74c3c;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        footer {
            background-color: #111;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        footer a {
            color: #ff9900;
            margin: 0 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Video Background -->
    <video autoplay muted loop class="video-background">
        <source src="{{ asset('videos/mcdo.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <nav class="navbar">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
        </a>
        <div>
            <a href="{{ route('home') }}" class="btn-custom">Home</a>
            <a href="{{ route('products.index') }}" class="btn-custom">Products</a>
        </div>
    </nav>

    <div class="container">
        <!-- Back to Home Button -->
        <div class="text-center mb-4">
            <a href="{{ route('home') }}" class="btn btn-custom">Back to Home</a>
        </div>

        <h1>Our Products</h1>

        <!-- Display success message if available -->
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Form -->
        <form action="{{ route('products.index') }}" method="GET" class="form-inline justify-content-center mb-4">
            <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search products...">
            <button type="submit" class="btn btn-custom ml-2">Search</button>
        </form>

        <!-- Link to add a new product -->
        <div class="text-center mb-4">
            <a href="{{ route('products.create') }}" class="btn btn-custom">Add New Product</a>
        </div>

        <!-- Grid of products -->
        <div class="product-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    @if ($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->product_name }}" class="product-img">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <div class="description">
                            {{ $product->description }}
                        </div>
                        <p class="card-text">Stock: {{ $product->stock }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-2">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('products.index') }}">Products</a>
    </footer>
</body>
</html>
