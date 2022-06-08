<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use  HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'status'
    ];

    
}
