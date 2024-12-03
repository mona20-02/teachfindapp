<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-image {
            max-width: 150px; /* Set a maximum width for the profile image */
            border-radius: 8px; /* Optional: Rounded corners */
        }
        .welcome-message {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="welcome-message text-center">
            <h1>Teacher Dashboard</h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h2>Your Profile Information</h2>
        
        <div class="card mb-4">
            <div class="card-body">
                @if($teacherDetails)
                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if($teacherDetails->image)
                                <img src="{{ asset('storage/' . $teacherDetails->image) }}" alt="Profile Image" class="profile-image">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Placeholder Image" class="profile-image"> <!-- Placeholder if no image -->
                            @endif
                        </div>
                        <div class="col-md-8">
                            <p><strong>Qualifications:</strong> {{ $teacherDetails->qualifications }}</p>
                            <p><strong>Description:</strong> {{ $teacherDetails->description }}</p>
                            <p><strong>Schedule Availability:</strong> 
                                {{ $teacherDetails->schedule_availability_start }} to {{ $teacherDetails->schedule_availability_end }}
                            </p>
                            <a href="{{ route('teacher.edit') }}" class="btn btn-primary">Edit Profile</a> <!-- Edit Profile link -->
                        </div>
                    </div>
                @else
                    <p>You have not provided any profile information yet.</p>
                @endif
            </div>
        </div>

        <div class="text-center">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>