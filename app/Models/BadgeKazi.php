<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgeKazi extends Model
{
    protected $guarded =  ['id'];
    use HasFactory;

    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badge_id');
    }
    public function kazi()
    {
        return $this->belongsTo(Kazi::class, 'kazi_id');
    }
}
