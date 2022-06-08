<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'badge_image',
        'status',
    ];
    public function badgeUser() :HasMany
        {
        return $this->hasMany(BadgeUser::class);
    }
}
