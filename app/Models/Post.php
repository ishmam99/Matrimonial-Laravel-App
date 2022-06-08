<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_image',
        'status',
        'feeling',
        'video',
        'profile_id',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
}
