<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Follow extends Model
{
    use HasFactory;
    protected $fillable=['following_id','follower_id','status'];

    public function following() : BelongsTo
    {
        return $this->belongsTo(Profile::class,'following_id');
    }
    public function follower(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'follower_id');
    }
    public function followingList(): HasMany
    {
        return $this->hasMany(Profile::class,'id' );
    }
    public function followerList(): HasMany
    {
        return $this->hasMany(Profile::class, 'id');
    }
    
}
