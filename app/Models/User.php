<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'student_id', 
        'teacher_id',
    ];
    public function teacherDetails()
    {
        return $this->hasOne(TeacherDetails::class, 'user_id');
    }
    protected static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        if ($user->role == 'student') {
            $user->student_id = User::where('role', 'student')->max('student_id') + 1;
        } elseif ($user->role == 'teacher') {
            $user->teacher_id = User::where('role', 'teacher')->max('teacher_id') + 1;
        }
    });
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
