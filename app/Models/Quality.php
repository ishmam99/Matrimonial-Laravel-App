<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    use HasFactory;

    protected $fillable = [
        'quality',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
