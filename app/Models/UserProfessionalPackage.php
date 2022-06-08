<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfessionalPackage extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    const PENDING = 0;
    const PAID = 1;
    const DELIVERED = 2;
    const REJETED = 3;
    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function professionalPackage()
    {
        return $this->belongsTo(ProfessionalPackage::class,'professional_package_id');
    }
}
