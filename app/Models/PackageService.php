<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageService extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function package()
    {
        return $this->belongsTo(ProfessionalPackage::class,'professional_package_id');    
    }
}
