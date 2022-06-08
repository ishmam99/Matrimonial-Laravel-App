<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kazi extends Model
{
    const PENDING = 0;
    const ACCEPTED = 1;
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'fee', 'status', 'profile_photo'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function contracts()
    {
        return $this->hasMany(UserKazi::class);
    }
    public function badge()
    {
        return $this->hasOne(BadgeKazi::class);
    }
}
