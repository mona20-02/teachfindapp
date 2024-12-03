<?php

// app/Http/Controllers/TeacherController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherDetails;

class TeacherController extends Controller
{
    public function index()
    {
        $teacherDetails = auth()->user()->teacherDetails;
        return view('teacher.dashboard', compact('teacherDetails'));
    }
    public function showProfile()
    {
        $teacherDetails = auth()->user()->teacherDetails; // Assuming you set up the relationship
        return view('teacher.profile', compact('teacherDetails'));
    }
    public function edit()
    {
        $teacherDetails = auth()->user()->teacher; // Fetch the teacher's details
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

        return redirect('/teacher/dashboard')->with('success', 'Profile updated successfully.');
    }
    
}

