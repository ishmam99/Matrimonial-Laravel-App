<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAgent extends Model
{
    const PENDING = 0;
    const HOLD = 1;
    const RUNNING = 2;
    const DISMISSED = 3;
    const CLOSED = 4;
    use HasFactory;
    protected $guarded =['id'];
    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id');
    }
}
