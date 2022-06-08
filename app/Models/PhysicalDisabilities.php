<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalDisabilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'physical_disabilities',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
