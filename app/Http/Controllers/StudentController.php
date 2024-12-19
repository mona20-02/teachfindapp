<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TeacherDetails;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
{   $bookings = Booking::where('student_id', auth()->id())->get(); 
    $teachers = TeacherDetails::with('user')->get(); 
    return view('student.dashboard', compact('teachers','bookings', )); 
}
public function searchTeachers(Request $request)
{
    $query = TeacherDetails::query();

    if ($request->filled('name')) {
        $query->where('user_id', function($q) use ($request) {
            $q->select('id')
              ->from('users') // Assuming users table holds teacher names
              ->where('name', 'like', '%' . $request->name . '%');
        });
    }

    // Filter by qualifications if provided
    if ($request->filled('qualifications')) {
        $query->where('qualifications', 'like', '%' . $request->qualifications . '%');
    }

    $teachers = $query->get(); // Get filtered results
    $bookings = Booking::where('student_id', auth()->id())->get(); 
    return view('student.dashboard', compact('teachers', 'bookings')); // Return the same view with updated results
}
}
