<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'year_started',
        'year_ended',
        'description',
        'user_id',
    ];

    protected $casts = [
        'year_started' => 'datetime',
        'year_ended' => 'datetime',
      ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
