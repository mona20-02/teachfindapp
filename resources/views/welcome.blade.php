<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
            background-image: url('https://source.unsplash.com/1600x900/?education,school'); /* Optional background image */
            background-size: cover;
            background-position: center;
            color: #343a40; /* Darker text color */
        }
        .welcome-card {
            background: rgba(255, 255, 255, 0.8); /* White background with transparency */
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="welcome-card text-center">
            <h1 class="display-4">Welcome to the Application</h1>
            <p class="lead">Please choose an option:</p>
            
            <div class="mt-4">
                <a href="/register" class="btn btn-primary btn-lg mr-2">Register</a>
                <a href="/login" class="btn btn-secondary btn-lg">Login</a>
            </div>
        </div>
    </div>
</body>
</html>