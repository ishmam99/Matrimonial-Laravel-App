<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileStatusBoostPackage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function package()
    {
        return $this->belongsTo(ProfileStatusBoostPackage::class,'package_id');
    }
    public function user()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
}
