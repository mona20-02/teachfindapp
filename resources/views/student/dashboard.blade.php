<!-- resources/views/student/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <p>This is your dashboard.</p>

        <div class="actions">
            <h2>Your Courses</h2>
            <ul>
                <li><a href="#">Course 1</a></li>
                <li><a href="#">Course 2</a></li>
                <li><a href="#">Course 3</a></li>
            </ul>
        </div>

        <div class="logout">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>