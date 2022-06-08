<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\CourseReview;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    public function index()
    {
        $this->checkPermission('course.access');
        $courses = Course::with('orders')->latest()->paginate($this->itemPerPage);
        $this->putSL($courses);
        return view('dashboard.course.index', compact('courses'));
    }

    public function create()
    {
        $this->checkPermission('course.create');
        $categories=Category::get();
        return view('dashboard.course.create',compact('categories'));
    }
    public function show(Course $course)
    {
        return view('dashboard.course.view',compact('course'));
    }

    public function store(CourseRequest $request): RedirectResponse
    {

        // dd($request->all());
        $this->checkPermission('course.create');
       
        $input= $request->validated();
        // if ($request->hasFile('image')) {
            // $course->addMediaFromRequest('image')->toMediaCollection('instructor_image');
            if ($request->hasFile('image')) {
              
                $input['instructor_image']  = uploadFile($request->file('image'), 'Instructor_images');
            }
            // dd($input);
         Course::create($input);

        return back()->with('success', 'Course Created Successfully.');
    }

    public function edit(Course $course)
    {
        // $this->checkPermission('course.edit');
        $categories = Category::where('status', 1)->get();
        $course->load('category');
        return view('dashboard.course.edit', compact('categories','course'));
    }

    public function update(CourseRequest $request, Course $course): RedirectResponse
    {
        $this->checkPermission('course.edit');
        $input = $request->validated();
      

        if ($request->hasFile('image')) {
            if (file_exists(public_path() . '/images/' . $course->instructor_image))
                unlink(public_path() . '/images/' . $course->instructor_image);
            $input['instructor_image']  = uploadFile($request->file('image'), 'Instructor_images');
        }
        $course->update($input);
        return back()->with('success', 'Course Updated Successfully.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $this->checkPermission('course.delete');
        $course->delete();
        return back()->with('success', 'Deleted Successfully.');
    }

    public function createQuiz(Request $request,Course $course)
    {
        $input = $request->validate([
            'name'  => 'required',
            'quiz'  => 'required',
            'type'  => 'required',
            'answer'=> 'nullable',
            'mcq_1'  => 'nullable',
            'mcq_2'  => 'nullable',
            'mcq_3'  => 'nullable',
            'mcq_4'  => 'nullable',
            'point' => 'nullable|numeric' 
        ]);
        $course->quizzes()->create($input);
        return back()->with('success','Quizz Created For The Course');
    }
    // public function courseReview()
    // {
    //     $reviews = CourseReview::paginate(10);
    //     return view('dashboard.course.review',compact('reviews'));
    // }
}
