<!-- resources/views/teacher/create_profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Your Profile</h2>
        <form action="{{ route('teacher.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="qualifications">Qualifications</label>
                <input type="text" name="qualifications" class="form-control" value="{{ old('qualifications') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Profile Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="schedule_availability_start">Availability Start</label>
                <input type="datetime-local" name="schedule_availability_start" class="form-control">
            </div>
            <div class="form-group">
                <label for="schedule_availability_end">Availability End</label>
                <input type="datetime-local" name="schedule_availability_end" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Edit Profile</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>