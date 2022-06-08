<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CoursePackage extends Model
{
    use HasFactory;
    protected $fillable=['name','fee'];
    public function packageCourse() : HasMany
    {
        return $this->hasMany(PackageCourse::class);
    }
    public function user() : HasMany
    {
        return $this->hasMany(PackageCourseUser::class);
    }

}
