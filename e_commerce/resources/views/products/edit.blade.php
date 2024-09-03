<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .navbar {
            background-color: #da291c; /* McDonald's red */
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .navbar-brand img {
            height: 40px; /* Adjust size as needed */
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 700px;
        }
        h1 {
            color: #da291c; /* McDonald's red */
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 300;
        }
        .form-group label {
            font-weight: 500;
            color: #333;
        }
        .btn-primary {
            background-color: #da291c; /* McDonald's red */
            border-color: #da291c;
            border-radius: 50px;
            padding: 12px 25px;
            font-weight: bold;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #c8102e; /* Darker red */
            border-color: #c8102e;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 50px;
            padding: 12px 25px;
            font-weight: bold;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
        .form-control, .form-control-file {
            border-radius: 8px;
            padding: 10px;
        }
        .img-thumbnail {
            max-width: 150px;
            border-radius: 8px;
        }
        .alert {
            font-size: 0.9rem;
            border-radius: 8px;
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
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control-file">
                @if ($product->image)
                    <div class="mt-3">
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->product_name }}" class="img-thumbnail">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-4">Update Product</button>
        </form>

        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-block mt-3">Back to Product List</a>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
