<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgeLawyer extends Model
{
    protected $guarded =  ['id'];
    use HasFactory;

    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badge_id');
    }
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class, 'lawyer_id');
    }
}
