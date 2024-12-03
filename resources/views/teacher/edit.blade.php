<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Your Profile</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('teacher.profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf

            <div class="form-group">
                <label for="qualifications">Qualifications:</label>
                <input type="text" name="qualifications" id="qualifications" 
                       class="form-control" 
                       value="{{ old('qualifications', $teacherDetails->qualifications ?? '') }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $teacherDetails->description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Profile Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
                @if($teacherDetails && $teacherDetails->image)
                    <img src="{{ asset('storage/' . $teacherDetails->image) }}" alt="Profile Image" class="img-thumbnail mt-2" width="100">
                @endif
            </div>

            <div class="form-group">
                <label for="schedule_availability_start">Schedule Availability Start:</label>
                <input type="datetime-local" name="schedule_availability_start" id="schedule_availability_start" 
                       class="form-control" 
                       value="{{ old('schedule_availability_start', $teacherDetails->schedule_availability_start ?? '') }}">
            </div>

            <div class="form-group">
                <label for="schedule_availability_end">Schedule Availability End:</label>
                <input type="datetime-local" name="schedule_availability_end" id="schedule_availability_end" 
                       class="form-control" 
                       value="{{ old('schedule_availability_end', $teacherDetails->schedule_availability_end ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
</html>