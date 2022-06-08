<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCase extends Model
{
    use HasFactory;
    const PENDING =0;
    const HOLD=1;
    const RUNNING=2;
    const DISMISSED=3;
    const CLOSED=4;
    protected $fillable=[
        'profile_id',
        'lawyer_id',
        'name',
        'status',
        'fee',
        'details',
        'attachment'
    ];

    public function profile() : BelongsTo
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function lawyer() :BelongsTo
    {
        return $this->belongsTo(Lawyer::class,'lawyer_id');
    }
}
