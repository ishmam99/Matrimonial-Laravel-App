<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseContent;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{
   public function store(Request $request,Course $course)
   {
    //    dd($request);
       $input = $request->validate([
           'content_media_id'  => 'required|exists:content_media,id'
       ]);
    //    dd($input);
       $course->courseContent()->create($input);
       return back()->with('success','Content Added Successfully');
   }
}
