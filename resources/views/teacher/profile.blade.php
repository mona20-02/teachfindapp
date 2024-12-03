<!-- resources/views/teacher/profile.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Teacher Profile</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="/teacher/profile" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="qualifications">Qualifications:</label>
                <input type="text" name="qualifications" id="qualifications" value="{{ old('qualifications', $teacherDetails->qualifications ?? '') }}">
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description">{{ old('description', $teacherDetails->description ?? '') }}</textarea>
            </div>

            <div>
                <label for="image">Profile Image:</label>
                <input type="file" name="image" id="image">
                @if($teacherDetails && $teacherDetails->image)
                    <img src="{{ asset('storage/' . $teacherDetails->image) }}" alt="Profile Image" width="100">
                @endif
            </div>

            <div>
                <label for="schedule_availability">Schedule Availability:</label>
                <input type="text" name="schedule_availability" id="schedule_availability" value="{{ old('schedule_availability', $teacherDetails->schedule_availability ?? '') }}">
            </div>

            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>