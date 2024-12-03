<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-bottom: 20px;
        }
        .card img {
            width: 100%; /* Full width */
            height: auto; /* Maintain aspect ratio */
            max-height: 100px; /* Maximum height for uniformity */
            object-fit: contain; /* Ensure the entire image is visible */
            border-radius: 4px; /* Optional: Rounded corners for the image */
        }
        .welcome-message {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="welcome-message text-center">
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
        </div>
        
        <h2 class="text-center mb-4">Available teachers</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="search-form mb-4">
            <form action="{{ route('student.teachers.search') }}" method="GET" class="form-inline justify-content-center">
                <input type="text" name="name" class="form-control mr-2" placeholder="Search by name" value="{{ request('name') }}">
                <input type="text" name="qualifications" class="form-control mr-2" placeholder="Search by qualifications" value="{{ request('qualifications') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <div class="row">
            @foreach($teachers as $teacher)
                <div class="col-12"> <!-- Full width for each card -->
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                @if($teacher->image)
                                    <img src="{{ asset('storage/' . $teacher->image) }}" class="card-img" alt="{{ $teacher->user->name }}'s Profile Image">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $teacher->user->name }}</h5>
                                    <p class="card-text"><strong>Qualifications:</strong> {{ $teacher->qualifications }}</p>
                                    <p class="card-text"><strong>Description:</strong> {{ $teacher->description }}</p>
                                    <p class="card-text"><strong>Availability:</strong> 
                                        {{ $teacher->schedule_availability_start }} to {{ $teacher->schedule_availability_end }}
                                    </p>
                                    <a href="{{ route('teacher.profile', $teacher->id) }}" class="btn btn-info">More Info</a> <!-- More Info button -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>