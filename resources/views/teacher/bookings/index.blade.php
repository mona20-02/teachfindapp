
<div class="container">
    <h2>Your Bookings</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
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
                    <td>{{ $booking->student->name }}</td>
                    <td>{{ $booking->subject }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>
                        @if($booking->status == 'pending')
                            <form action="{{ route('teacher.bookings.accept', $booking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Accept</button>
                            </form>
                            <form action="{{ route('teacher.bookings.reject', $booking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>