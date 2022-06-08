<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'instructor_name',
        'instructor_designation',
        'instructor_image',
        'title',
        'description',
        'start_date',
        'end_date',
        'price',
        'category_id',
        'status',
    ];

    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('instructor_image')->singleFile();
    // }

    public function orders(): HasMany
    {
        return $this->hasMany(CourseOrder::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function packageCourse() :HasMany
    {
        return $this->hasMany(PackageCourse::class);
    }
    public function quizzes()
    {
        return $this->hasMany(CourseQuiz::class);
    }
    public function reviews()
    {
        return $this->hasMany(CourseReview::class);
    }
    public function userCourse()
    {
        return $this->hasMany(UserCourse::class,'course_id');
    }
    public function courseContent()
    {
        return $this->hasMany(CourseContent::class);
    }
}
