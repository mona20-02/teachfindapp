<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-image {
            max-width: 150px; 
            border-radius: 8px; 
        }
        .welcome-message {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="welcome-message text-center">
            <h1>Your Profile</h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        
        <div class="card mb-4">
            <div class="card-body">
                @if($teacherDetails)
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="{{ $teacherDetails->image ? asset('storage/' . $teacherDetails->image) : 'https://via.placeholder.com/150' }}" alt="Profile Image" class="profile-image">
                        </div>
                        <div class="col-md-8">
                          <h2>{{ auth()->user()->name }}</h2>
                            <p><strong>{{ $teacherDetails->qualifications }}</strong></p>
                            <p><strong>Description:</strong> {{ $teacherDetails->description }}</p>
                            <p><strong>Schedule Availability:</strong> 
                                {{ $teacherDetails->schedule_availability_start }} to {{ $teacherDetails->schedule_availability_end }}
                            </p>
                            <a href="{{ route('teacher.profile') }}" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                @else
                    <p>You have not provided any profile information yet. <a href="{{ route('teacher.profile') }}">Create your profile</a></p>
                @endif
            </div>
        </div>

        <!-- Button to Show Bookings -->
        <div class="text-center mb-4">
            <button class="btn btn-info" data-toggle="modal" data-target="#bookingsModal">
                View Bookings
            </button>
        </div>

        <!-- Bookings Modal -->
        <div class="modal fade" id="bookingsModal" tabindex="-1" role="dialog" aria-labelledby="bookingsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingsModalLabel">Your Bookings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if($bookings->isEmpty())
                            <p>No bookings available.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{ optional($booking->student)->name }}</td>
                                            <td>{{ $booking->subject }}</td>
                                            <td>{{ ucfirst($booking->status) }}</td>
                                            <td>
                                                @if($booking->status == 'pending')
                                                    <form action="{{ route('booking.accept', $booking->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                                    </form>
                                                    <form action="{{ route('booking.reject', $booking->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <div class="text-center">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>