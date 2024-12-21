<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'subject',
        'status',
        
    ];

    // Relationship with Student
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'student_id');
    }

    // Relationship with Teacher
    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id', 'teacher_id');
    }
}