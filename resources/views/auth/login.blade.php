
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #e9f5ff, #f8f9fa); /* Light blue gradient background */
            display: flex;
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
            height: 100vh; /* Full viewport height */
            margin: 0; /* Remove default margin */
        }
        .login-container {
            width: 700px;
            padding: 50px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 4px 20px rgba(0, 123, 255, 0.5); /* Blue shadow */
        }
        .form-control {
            border-radius: 5px; /* Rounded corners for input fields */
            padding-left: 40px; /* Space for the icon */
        }
        .form-group {
            position: relative;
        }
        .form-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #007bff; /* Icon color */
        }
        .btn-primary {
            background-color: #007bff; /* Primary button color */
            border: none;
            border-radius: 15px; /* Rounded corners for button */
            font-weight: bold;
            font-size: 20px;

        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .text-center a {
            color: #007bff; /* Link color */
        }
        .text-center a:hover {
            text-decoration: underline; /* Underline on hover */
        }
        h2 {
            padding: 10px;
            color: #007bff;
            font-style: italic;
            font-size: 35px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center mb-4">Welcome Back!</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="bb"><button type="submit" class="btn btn-primary btn-block">Login</button></div>
        </form>
        <p class="text-center mt-3">
            Don't have an account? <a href="{{ route('register') }}">Register here</a>
        </p>
    </div>
    
</body>
</html>