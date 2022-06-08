<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SkinTone extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'skin_tone_id');
    }
}
