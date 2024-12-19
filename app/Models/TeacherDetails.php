<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TeacherDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'qualifications', 'description', 'image', 'schedule_availability',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // In Teacher.php
public function bookings()
{
    return $this->hasMany(Booking::class, 'teacher_id');
}
}
