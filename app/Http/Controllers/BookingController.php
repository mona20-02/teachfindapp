<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Method to book an appointment
    public function book(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:users,teacher_id', // Ensure the teacher exists
            'subject' => 'required|string|max:255',
        ]);

        Booking::create([
            'student_id' => auth()->user()->student_id, // Assuming the user is authenticated as a student
            'teacher_id' => User::where('teacher_id', $request->teacher_id)->first()->id,
            'subject' => $request->subject,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Booking made successfully!');
    }

    // Method to show the teacher's bookings
    public function index()
    {
        $bookings = Booking::with(['student', 'teacher'])->where('teacher_id', auth()->id())->get();
    
        return view('teacher.bookings.index', compact('bookings'));
    }
    

    // Method to accept a booking
    public function accept($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'accepted';
        $booking->save();
        session()->flash('success', 'Your booking for ' . $booking->subject . ' has been accepted!');
        return redirect()->back()->with('success', 'Booking accepted successfully!');
    }

    // Method to reject a booking
    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'rejected';
        $booking->save();
        session()->flash('success', 'Your booking for ' . $booking->subject . ' has been rejected.');
        return redirect()->back()->with('success', 'Booking rejected successfully!');
    }
}