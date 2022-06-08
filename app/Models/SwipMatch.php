<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SwipMatch extends Model
{
    const FAVOURITE = 1 ;
    const FOLLOW = 2;
    const MATCHING = 3; 
    use HasFactory;
    protected $fillable=['profile_id','favourite_id','type'];

    public function favourite() : HasOne
    {
        return $this->hasOne(Profile::class,'id');
    }
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
