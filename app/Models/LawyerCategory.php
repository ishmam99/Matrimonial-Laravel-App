<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function lawyers()
    {
        return $this->hasMany(Lawyer::class);
    }
}
