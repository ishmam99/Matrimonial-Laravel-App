<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agent extends Model
{
    const PENDING = 0;
    const ACCEPTED = 1;
    use HasFactory;
    protected $guarded = ['id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(AgentCategory::class,'agent_category_id');
    }
    public function contracts()
    {
        return $this->hasMany(UserAgent::class);
    }
    public function badge()
    {
        return $this->hasOne(BadgeAgent::class);
    }
}
