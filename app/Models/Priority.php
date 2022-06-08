<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;
    protected $fillable=['profile_id','days'];

    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
}
