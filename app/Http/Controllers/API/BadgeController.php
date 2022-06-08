<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BadgeResource;
use App\Http\Resources\PackageResource;
use App\Http\Resources\ProfessionalPackageResource;
use App\Models\Badge;
use App\Models\Package;
use App\Models\ProfessionalPackage;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    public function index()
    {
        $badges=Badge::where('status',1)->get();
        return $this->apiResponseResourceCollection(200,'Badges List',BadgeResource::collection($badges));

    }
    public function package()
    {
        $packages=Package::where('status',Package::ACTIVE)->get();
        return $this->apiResponseResourceCollection(200,'Package List',PackageResource::collection($packages));
    }
    public function professionalPackage()
    {
        $package = ProfessionalPackage::paginate(10);
        return $this->apiResponseResourceCollection(200,'Package List',ProfessionalPackageResource::collection($package));
    }
}     
