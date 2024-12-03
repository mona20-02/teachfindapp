<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/student/dashboard', [StudentController::class, 'index'])->middleware('auth');
Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher/profile', [TeacherController::class, 'showProfile'])->middleware('auth');
Route::post('/teacher/profile', [TeacherController::class, 'updateProfile'])->middleware('auth');