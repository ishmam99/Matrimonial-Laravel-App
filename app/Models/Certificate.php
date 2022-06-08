<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    const PENDING=0;
    const VERIFIED=1;
    const REJECTED=2;
    const RESUBMIT=3;
    protected $fillable = [
        'certificate_image',
        'status',
        'type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
