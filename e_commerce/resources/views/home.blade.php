<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JRtaraktarak FoodHub</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full viewport height */
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
            text-align: center;
            color: #fff; /* Ensure text color stands out against the video */
            z-index: 1;
            position: relative;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #f7d03f; /* McDonald's yellow */
            margin-bottom: 20px;
            text-shadow: 0px 0px 10px #da291c; /* McDonald's red */
        }

        p {
            font-size: 1.25rem;
            margin-bottom: 30px;
            color: #ddd; /* Light gray for better readability */
        }

        .btn-primary {
            background-color: #da291c; /* McDonald's red */
            border-color: #da291c;
            padding: 15px 30px;
            font-size: 1.25rem;
            border-radius: 50px;
            transition: background-color 0.3s ease;
            box-shadow: 0px 5px 15px rgba(218, 41, 28, 0.4); /* McDonald's red shadow */
        }

        .btn-primary:hover {
            background-color: #c8102e; /* Darker McDonald's red */
            border-color: #c8102e;
            box-shadow: 0px 5px 15px rgba(200, 16, 46, 0.6); /* Darker red shadow */
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 1rem;
            }
            .btn-primary {
                font-size: 1rem;
                padding: 10px 20px;
            }
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
        <h1>JRtaraktarak FoodHub</h1>
        <p>Welcome to our McDonald's inspired food hub!</p>

        <!-- Link to Products -->
        <a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
