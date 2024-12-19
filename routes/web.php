<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BookingController;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/student/teachers/search', [StudentController::class, 'searchTeachers'])->name('student.teachers.search');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('/teacher/profile', [TeacherController::class, 'showProfile'])->name('teacher.profile');
    Route::get('/teacher/profile/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('/teacher/profile', [TeacherController::class, 'updateProfile'])->name('teacher.profile.update');
});

// Routes for Booking
Route::post('/bookings/{teacher}', [BookingController::class, 'book'])->name('student.bookings.book');
Route::get('/teacher/bookings', [BookingController::class, 'index'])->name('teacher.bookings.index');
Route::post('/bookings/accept/{id}', [BookingController::class, 'accept'])->name('booking.accept');
Route::post('/bookings/reject/{id}', [BookingController::class, 'reject'])->name('booking.reject');
// routes/web.php

