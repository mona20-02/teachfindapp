<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Welcome to the Application</h1>
        <p>Please choose an option:</p>
        
        <div>
            <a href="/register" class="btn">Register</a>
            <a href="/login" class="btn">Login</a>
        </div>
    </div>
</body>
</html>