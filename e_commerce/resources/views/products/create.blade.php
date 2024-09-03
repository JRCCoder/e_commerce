<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
            background: #000;
            height: 100vh;
            overflow: hidden;
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
        .container {
            max-width: 600px;
            margin-top: 50px;
            z-index: 1;
            position: relative;
        }
        h1 {
            color: #f7d03f; /* McDonald's yellow */
            text-align: center;
            margin-bottom: 30px;
            font-weight: 300;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            background-color: #fff; /* Light card background */
            color: #333; /* Dark text color for readability */
        }
        .btn-primary {
            background-color: #da291c; /* McDonald's red */
            border-color: #da291c;
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #c8102e; /* Slightly darker red */
        }
        .btn-secondary {
            background-color: #f7d03f; /* McDonald's yellow */
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            color: #333; /* Dark text color for readability */
        }
        .btn-secondary:hover {
            background-color: #f0b02e; /* Slightly darker yellow */
        }
        .form-control, .form-control-file {
            border-radius: 10px;
            padding: 10px;
            background-color: #f7f7f7; /* Light input background */
            color: #333; /* Dark text color for inputs */
            border: 1px solid #ddd; /* Light border color */
        }
        .alert {
            font-size: 0.9rem;
            border-radius: 10px;
            background-color: #d9534f; /* Red alert background */
            color: #fff; /* White alert text */
        }
    </style>
</head>
<body>
    <!-- Video Background -->
    <video autoplay muted loop class="video-background">
        <source src="{{ asset('videos/mcdo.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="container">
        <h1>Create New Product</h1>
        <div class="card">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" value="{{ old('product_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
                </div>

                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">Create Product</button>
            </form>

            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-block mt-3">Back to Product List</a>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
