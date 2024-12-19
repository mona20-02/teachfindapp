<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        .container {
            max-width: 600px; /* Limit container width */
            margin-top: 50px; /* Spacing from top */
            padding: 30px;
            background: white;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }
        h2 {
            color: #007bff; /* Primary color for headings */
            margin-bottom: 20px; /* Spacing below heading */
        }
        .form-group label {
            font-weight: bold; /* Bold labels */
        }
        .btn-primary {
            background-color: #007bff; /* Custom primary button color */
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Your Profile</h2>
        <form action="{{ route('teacher.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="qualifications">Qualifications</label>
                <input type="text" name="qualifications" class="form-control" value="{{ old('qualifications') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Profile Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="schedule_availability_start">Availability Start</label>
                <input type="datetime-local" name="schedule_availability_start" class="form-control">
            </div>
            <div class="form-group">
                <label for="schedule_availability_end">Availability End</label>
                <input type="datetime-local" name="schedule_availability_end" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create Profile</button>
        </form>
    </div>
</body>
</html>