<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PackageCourseUser extends Model
{
    use HasFactory;
    const PENDING = 0;
    const PAID    = 1;
    const DELIVERED =2;
    const REJECTED =3;
     protected $fillable=['profile_id', 'course_package_id', 'status'];

    public function profile() : BelongsTo
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function coursePackage() : BelongsTo
    {
        return $this->belongsTo(CoursePackage::class,'course_package_id');
    }
}
