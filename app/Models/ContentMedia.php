<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentMedia extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function courseContent()
    {
        return $this->hasMany(CourseContent::class);
    }
}
