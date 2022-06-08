<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;
    const ONE_MONTH=1;
    const THREE_MONTH =2;
    const SIX_MONTH=3;
    const YEAR=4;
    const ACTIVE=0;
    const INACTIVE=1;
    protected $fillable=['name','fee','type','status'];

    public function profile()
    {
        return $this->hasMany(Profile::class);
    }
    public function userPackage(): HasMany
    {
        return $this->hasMany(UserPackage::class);
    }
}
