<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    const LAWYER = 1;
    const AGENT = 2;

    use HasFactory;
    protected $guarded=['id'];

    public function profile() : BelongsTo
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
