<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'institute_name',
        'degree',
        'year_started',
        'year_ended',
        'description',
        'education_certificate',
        'profile_id',
    ];

    protected $casts = [
        'year_started' => 'datetime',
        'year_ended' => 'datetime',
      ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
