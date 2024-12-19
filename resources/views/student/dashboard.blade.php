<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }
        .card {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            border: none;
            border-radius: 15px;
            transition: transform 0.2s;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.15);
        }
        .card img {
            width: 100%;
            height: auto;
            max-height: 150px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .welcome-message {
            margin-bottom: 30px;
            color: #343a40;
        }
        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .collapse {
            margin-top: auto;
        }
        .bookings-container {
            margin-top: 40px;
        }
        .booking-card {
            height: 220px; /* Adjusted height for a better layout */
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .text-success {
            font-weight: bold;
        }
        .search-form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="welcome-message text-center">
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
        </div>

        <div class="bookings-container">
            <h2>Your Bookings</h2>
            <div class="row">
                @foreach($bookings as $booking)
                    <div class="col-md-4">
                        <div class="card booking-card">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title text-primary">Subject: {{ $booking->subject }}</h5>
                                <p class="card-text">Teacher:{{$booking->teacher->name}}</p>
                                <p class="card-text">Start Time: {{ optional($booking->teacher->teacherDetails)->schedule_availability_start }}</p>
                                <p class="card-text">End Time: {{ optional($booking->teacher->teacherDetails)->schedule_availability_end }}</p>
                                <p class="card-text text-success">Status: {{ ucfirst($booking->status) }}</p>

                                @if($booking->status == 'accepted')
                                    <p class="card-text"><strong>Contact Info:</strong> {{ optional($booking->teacher)->phone }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <h2 class="text-center mb-4">Available Teachers</h2>

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
                <div class="col-12">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                @if($teacher->image)
                                    <img src="{{ asset('storage/' . $teacher->image) }}" class="card-img" alt="{{ $teacher->user->name }}'s Profile Image">
                                @else
                                    <img src="https://via.placeholder.com/150" class="card-img" alt="Placeholder Image">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $teacher->user->name }}</h5>
                                    <p class="card-text"><strong>Qualifications:</strong> {{ $teacher->qualifications }}</p>
                                    
                                    <div class="collapse" id="collapse{{ $teacher->id }}">
                                        <div class="mt-2">
                                            <p class="card-text"><strong>Description:</strong> {{ $teacher->description }}</p>
                                            <p class="card-text">
                                                <strong>Availability:</strong> 
                                                {{ $teacher->schedule_availability_start }} to {{ $teacher->schedule_availability_end }}
                                            </p>
                                            <form action="{{ route('student.bookings.book', $teacher->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                                                <div class="form-group">
                                                    <label for="subject">Subject</label>
                                                    <input type="text" name="subject" class="form-control" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm">Book</button>
                                            </form>
                                        </div>
                                    </div>

                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $teacher->id }}" aria-expanded="false" aria-controls="collapse{{ $teacher->id }}">
                                        View More
                                    </button>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>