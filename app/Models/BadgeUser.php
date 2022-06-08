<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BadgeUser extends Model
{
    use HasFactory;
    protected $fillable=['profile_id','badge_id','status'];

    public function user() : HasOne
    {
        return $this->hasOne(Profile::class,'profile_id');
    }
    public function badge():BelongsTo
    {
        return $this->belongsTo(Badge::class,'badge_id');
    }
}
