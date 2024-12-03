<?php

// app/Http/Controllers/TeacherController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherDetails;

class TeacherController extends Controller
{
    public function index()
    {
        return view('teacher.dashboard');
    }
    public function showProfile()
    {
        $teacherDetails = auth()->user()->teacherDetails; // Assuming you set up the relationship
        return view('teacher.profile', compact('teacherDetails'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'qualifications' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Limit file size to 2MB
            'schedule_availability' => 'nullable|string',
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

        $teacherDetails->schedule_availability = $request->schedule_availability;
        $teacherDetails->save();

        return redirect('/teacher/dashboard')->with('success', 'Profile updated successfully.');
    }
}
