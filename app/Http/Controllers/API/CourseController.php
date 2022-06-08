<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseReviewResource;
use App\Http\Resources\OrderedCourseResource;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\QuizResource;
use App\Http\Resources\UserCourseResource;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseOrder;
use App\Models\QuizAnswer;
use App\Models\Transaction;
use App\Models\UserCase;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = auth()->user()->orderedCourses;
        return $this->apiResponseResourceCollection(203, 'Ordered Course List', OrderedCourseResource::collection($courses));
       
    }
    public function store(Request $request)
    {
        $chek=CourseOrder::where('user_id',auth()->id())->where('course_id',$request->course_id)->first();
        if($chek==null){
        $input=$request->validate([
            'course_id' =>'required|exists:courses,id'
        ]);
        $input['user_id']=auth()->id();
        CourseOrder::create($input);
        return $this->apiResponse(201,'Enrolled To New Course');
        }
        else
            return $this->apiResponse(200, 'Already Enrolled To ');
    }

    public function allCourses()
    {
        $courses = Course::with('category')->get();

        return $this->apiResponseResourceCollection(200, 'Course List', CourseResource::collection($courses));
    }
    public function show(Course $course)
    {
        $course->load('reviews');
        return response()->json([
            'course_details'=> CourseResource::make($course),
            'course_reviews' => CourseReviewResource::collection($course->reviews)
        ],200 );
    }
    public function coursePayment(Request $request)
    {
        $request->validate([
            'order_id' =>'required|exists:course_orders,id',
            'prove_document'    =>'required',
            'trx_id'            =>'required|string'
        ]);
        $course=CourseOrder::findOrfail($request->order_id);
        // dd($course->course->price);
        $fileName = uploadFile($request->file('prove_document'));
      
       $transaction= Transaction::create([
            'trx_id'    =>$request->trx_id,
            'prove_document'=>$fileName,
            'amount'        =>$course->course->price
        ]);
        $course->update([
            'transaction_id'=>$transaction->id,
            'paid_status'=>1,
            'status'        =>1   
        ]);
        auth()->user()->profile->userCourse()->create(['course_id'=>$course->course->id]);
        return $this->apiResponse(201,'Payment Successfull');
    }
    public function top()
    {
        $courses = Course::with('category')->take(5)->get();

        return $this->apiResponseResourceCollection(200, 'Course List', CourseResource::collection($courses));
    }
    public function reviews(Request $request, Course $course)
    {
        $input= $request->validate([
            'rating'    =>  'required',
            'details'   =>  'nullable'
        ]);
        $input['profile_id']    = auth()->user()->profile->id;
        $course->reviews()->create($input);
        return $this->apiResponse(201,'Course Review Done');
    }

    public function categories()
    {
        $categories  = Category::paginate(10);
        return $this->apiResponseResourceCollection(200,'Course Categories',CategoryResource::collection($categories));
    }
    public function submitAnswer(Request $request)
    {
        $input = $request->validate([
        'course_quiz_id'       => 'required|exists:course_quizzes,id',
        'user_course_id'  => 'required|exists:user_courses,id',
        'answer'            => 'required'
        ]); 
        $check = QuizAnswer::where([['course_quiz_id',$request->course_quiz_id],['user_course_id',$request->user_course_id]])->first();
        if($check)
        return $this->apiResponse(200,'You have already submitted answer to this quiz');
      $quizAnswer =  QuizAnswer::create($input);
        $quizAnswer->userCourse->increment('quiz_completed', 1);
        return $this->apiResponse(201,'Quiz Answer Submitted Successfully');
    }
    public function myCourseList()
    {
        $courses = auth()->user()->profile->userCourse->load('course.quizzes','course.category');
        return $this->apiResponseResourceCollection(200,'My Courses',UserCourseResource::collection($courses));
    }
    public function showQuizzes(UserCourse $userCourse)
    {
        $quizzes = $userCourse->course->quizzes;
        return $this->apiResponseResourceCollection(200,'Quiz Liist',QuizResource::collection($quizzes));
    }
   
}
