<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #e9f5ff; /* Light blue background */
            display: flex;
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
            height: 95vh; /* Full viewport height */
            margin: 0; /* Remove default margin */
        }
        .registration-container {
            width: 700px;
            padding: 30px;
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
            color: #007bff;
            text-shadow: 10cm #172f3d;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2 class="text-center mb-4">Register</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <i class="fas fa-phone"></i>
                <input type="text" class="form-control" name="phone" placeholder="Phone Number (09x xxx xxxx)">
            </div>
            <div class="form-group">
                <i class="fas fa-user-tag"></i>
                <select name="role" class="form-control" required>
                    <option value="" disabled selected>Select your role</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <p class="text-center mt-3">
            Already have an account? <a href="{{ route('login') }}">Login here</a>
        </p>
    </div>
</body>
</html>