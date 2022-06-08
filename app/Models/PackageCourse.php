<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PackageCourse extends Model
{
    use HasFactory;
    protected $fillable=['course_package_id','course_id'];
    public function course() : BelongsTo
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function coursePackage() :BelongsTo
    {
       return $this->belongsTo(CoursePackage::class,'course_package_id');
    }
}
