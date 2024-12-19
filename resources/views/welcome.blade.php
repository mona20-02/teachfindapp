
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome CDN -->
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .ml-auto {
            font-size: 20px;
            margin-right: 20px;
        }
        .header {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            padding: 10px 0;
        }
        .navbar-brand {
            color: white !important; /* Change TeachFind text color to white */
            font-weight: bold; /* Make text bold */
            margin-left: 20px;
            font-size: 25px;
        }
        .navbar .navbar-nav .nav-link {
            color: white; /* Ensure nav links are white */
        }
        .header .navbar {
            justify-content: space-between; /* Space between items */
        }
        .welcome-section {
            display: flex;
            align-items: center;
            justify-content: right;
            height: auto;
        }
        .welcome-text {
            max-width: 700px;
            text-align: center;
            justify-content: center;
            padding: 20px;
        }
        .btn-start {
            margin-top: 20px;
        }
        img {
            width: 700px;
            height: 545px;
            padding-right: 5%;
        }
        .im-we {
            display: flex;
            align-items: center;
            height: auto;
        }
        h1 {
            font-size: 50px;
            font-weight: bold;
            padding-left: auto;
        }
        .welcome-text p {
            font-size: 20px;
            color: #000000;
            padding: 3%;
        }
    </style>
</head>
<body>
    <nav class="header navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">TeachFind
            <i class="fas fa-chalkboard-teacher"></i>
        </a>
        <div class="collapse navbar-collapse">
            <div class="ml-auto">
                <a href="/about" class="text-white mx-3">
                    <i class="fas fa-info-circle"></i> About Us
                </a>
                <a href="/login" class="text-white">
                    <i class="fas fa-user"></i> Login
                </a>
            </div>
        </div>
    </nav>

    <div class="im-we">
        <img src="https://media.istockphoto.com/id/178471354/photo/teacher-helping-pupils-study-in-the-classroom.jpg?s=612x612&w=0&k=20&c=CgYuNR_GdGgBAVek-iQl4GAzBTLyVJrHCRTQGPvoX-k=" class="rounded float-start" alt="...">
        <div class="welcome-section">
            <div class="welcome-text">
                <h1>  Welcome to TeachFind </h1>
                <p class="lead">Let’s Get Started -></p>
                <a href="/register" class="btn btn-primary btn-lg btn-start">Get Started</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>