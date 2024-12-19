<?php

// app/Http/Controllers/TeacherController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherDetails;
use App\Models\Booking;


class TeacherController extends Controller
{
    public function index()
    {   
        
        $teacherDetails = auth()->user()->teacherDetails;
        if (!$teacherDetails) {
            return redirect()->route('teacher.edit'); // Redirect to the edit profile route
        }
        $teacherId = auth()->id();
       $bookings = Booking::where('teacher_id',$teacherId )->get();
    //    dd($teacherId, $bookings);
        return view('teacher.dashboard', compact('teacherDetails','bookings'));
    }
    public function showProfile()
    {   
        $teacherDetails = auth()->user()->teacherDetails;

        if (!$teacherDetails) {
            return redirect()->route('teacher.edit');
        }

        $bookings = Booking::where('teacher_id', auth()->id())->get();

      

            // Fetch the teacher's profile details
            // $teacherDetails = TeacherDetails::where('user_id', auth()->id())->first();
    
            // // Fetch the bookings for the logged-in teacher
            // $bookings = Booking::where('teacher_id', auth()->id())->get(); // Adjust according to your relationship  
            return view('teacher.profile', compact('teacherDetails', 'bookings', ));
        
    }
    public function edit()
    {
        $teacherDetails = auth()->user()->teacherDetails; // Fetch the teacher's details
        return view('teacher.edit', compact('teacherDetails'));
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'qualifications' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Limit file size to 2MB
            'schedule_availability_start' => 'nullable|date',
            'schedule_availability_end' => 'nullable|date|after:schedule_availability_start',
        ]);

        // Handle file upload and save details
        $teacherDetails = auth()->user()->teacherDetails ?? new TeacherDetails();
        $teacherDetails->user_id = auth()->id();
        $teacherDetails->qualifications = $request->qualifications;
        $teacherDetails->description = $request->description;

        if ($request->hasFile('image')) {
            // Handle image upload
            $path = $request->file('image')->store('teacher_images', 'public');
            $teacherDetails->image = $path;
        }

        $teacherDetails->schedule_availability_start = $request->schedule_availability_start;
        $teacherDetails->schedule_availability_end = $request->schedule_availability_end;
        $teacherDetails->save();

        return redirect('/teacher/dashboard')->with('success', 'Profile created successfully.');
    }
    public function showBookings()
    {
        $bookings = Booking::where('teacher_id', auth()->id())->with('student')->get(); // Eager load student information
        return view('teacher.bookings.index', compact('bookings'));
    }

    // Method to accept a booking
    public function acceptBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'accepted';
        $booking->save();

        return redirect()->back()->with('success', 'Booking accepted successfully!');
    }

    // Method to reject a booking
    public function rejectBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->back()->with('success', 'Booking rejected successfully!');
    }
}

