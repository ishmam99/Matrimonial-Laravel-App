<?php

namespace App\Http\Controllers;

use App\Models\CoursePackage;
use App\Models\PackageCourseUser;
use Illuminate\Http\Request;

class CoursePackageController extends Controller
{
    public function index()
    {
        $packages = CoursePackage::paginate(10);
        return view('dashboard.course_package.index',compact('packages'));
    }
    public function create()
    {
        return view('dashboard.course_package.create');
    }
    public function store(Request $request)
    {
      
       $input = $request->validate([
           'name'   => 'required|string',
           'fee'    => 'required|numeric'
       ]);
      $coursePckage =  CoursePackage::create($input);
      
       foreach($request->courses as $course)
       {
        $coursePckage->packageCourse()->create(['course_id'=>$course]);
       }

       return redirect()->route('coursePackage.index')->with('success','Course Package Created Successfully');
    }
    public function show(CoursePackage $coursePackage)
    {
       return view('dashboard.course_package.view',compact('coursePackage'));
    }
    public function edit(CoursePackage $coursePackage)
    {
        return view('dashboard.course_package.edit', compact('coursePackage'));
    }
    public function update(Request $request, CoursePackage $coursePackage)
    {
        $input = $request->validate([
            'name'   => 'required|string',
            'fee'    => 'required|numeric'
        ]);
        $coursePackage->update($input);
        $coursePackage->packageCourse()->delete();
      
        foreach ($request->courses as $course) {
            $coursePackage->packageCourse()->create(['course_id' => $course]);
        }
        return back()->with('success','Course Package Data Updated Successfully');
    }
    public function destroy(CoursePackage $coursePackage)
    {
       $coursePackage->delete();
        return back()->with('success', 'Course Package Deleted Successfully');
    }
    public function requestList()
    {
        $orders = PackageCourseUser::paginate(10);
        return view('dashboard.course_package.package-order.index',compact('orders'));
    }
    public function orderShow(PackageCourseUser $packageCourseUser )
    {
      
        return view('dashboard.course_package.package-order.view',compact('packageCourseUser'));
    }
}
