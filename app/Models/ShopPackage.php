<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopPackage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function packageProduct()
    {
        return $this->hasMany(PackageProduct::class);
    }
    public function shopPackageOrder()
    {
        return $this->hasMany(ShopPackageOrder::class);
    }
}
