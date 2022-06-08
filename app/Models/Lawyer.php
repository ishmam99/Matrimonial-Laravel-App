<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lawyer extends Model
{
    use HasFactory;
    const REGULAR=0;
    const BESTRATED=1;
    const TOP=2;
    const PENDING = 0;
    const ACCEPTED = 1;

    protected $guarded=['id'];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(LawyerCategory::class,'lawyer_category_id');
    }
    public function userCase() :HasMany
    {
        return $this->hasMany(UserCase::class);
    }
    public function badge()
    {
        return $this->hasOne(BadgeLawyer::class);
    }
}
