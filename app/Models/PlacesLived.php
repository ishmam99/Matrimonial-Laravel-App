<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacesLived extends Model
{
    use HasFactory;

    protected $fillable = [
        'places_lived',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
