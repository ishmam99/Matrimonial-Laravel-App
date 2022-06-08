<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalPackage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function services()
    {
        return $this->hasMany(PackageService::class);
    }
    public function userProfessionalPackage()
    {
        return $this->hasMany(UserProfessionalPackage::class);
    }
}
