<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function quizAnswer()
    {
       return $this->hasMany(QuizAnswer::class);
    }

}
