<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function course()
    {
       return $this->belongsTo(Course::class,'course_id');
    }
    public function contentMedia()
    {
        return $this->belongsTo(ContentMedia::class,'content_media_id');
    }
}
