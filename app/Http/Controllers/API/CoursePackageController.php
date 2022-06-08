<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoursePackageResource;
use App\Http\Resources\CoursePackageUserResource;
use App\Models\CoursePackage;
use App\Models\PackageCourseUser;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CoursePackageController extends Controller
{
    public function index()
    {
        $packages = CoursePackage::with('packageCourse.course.category')->paginate(10);
        return $this->apiResponseResourceCollection(200,'Course Package List',CoursePackageResource::collection($packages));
    }

    public function show(CoursePackage $coursePackage)
    {
        $coursePackage->load('packageCourse.course.category');
        return $this->apiResponse(200,'Course Package Details',CoursePackageResource::make($coursePackage));
    }
    public function store(Request $request)
    {
       $input = $request->validate([
           'course_package_id'  => 'required|exists:course_packages,id'
       ]);
       auth()->user()->profile->coursePackageUser()->create($input);
       return $this->apiResponse(201,'Course Package Ordered Successfully');
    }
    public function myOrders()
    {
        $orders = auth()->user()->profile->coursePackageUser;
        return $this->apiResponseResourceCollection(200,'My Orders',CoursePackageUserResource::collection($orders));
    }
    public function makePayment(Request $request)
    {
        $input = $request->validate([
            'trx_id'        => 'required',
            'prove_document'=> 'required',
            'package_course_user_id'    => 'required'    
        ]);
        $package = PackageCourseUser::findOrfail($request->package_course_user_id);
        
        $fileName = uploadFile($request->prove_document);
        $transaction = Transaction::create([
            'trx_id'    => $request->trx_id,
            'prove_document' => $fileName,
            'amount'        => $package->coursePackage->fee
        ]);
        foreach($package->coursePackage->packageCourse->load('course') as $course)
        {
            
            auth()->user()->profile->userCourse()->create(['course_id' => $course->course->id]);
            $course->course->increment('enrolled',1);
        }
        $package->update(['status'=>PackageCourseUser::DELIVERED]);
        return $this->apiResponse(201,'Payment Completed');        
    }
}
