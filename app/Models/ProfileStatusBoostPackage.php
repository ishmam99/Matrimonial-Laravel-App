<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileStatusBoostPackage extends Model
{
    use HasFactory;
    const PORFILE = 0;
    const STATUS  = 1;
    const ACTIVE = 0 ;
    const INACTIVE = 1;
    protected $guarded = ['id'];

    public function orders()
    {
        return $this->hasMany(UserProfileStatusBoostPackage::class,'package_id');
    }
}

