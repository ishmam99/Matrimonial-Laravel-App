<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BadgeAgent extends Model
{
    protected $guarded =  ['id'];
    use HasFactory;

    public function badge()
    {
    return $this->belongsTo(Badge::class,'badge_id');
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }
}
