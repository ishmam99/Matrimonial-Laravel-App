<?php

namespace App\Http\Controllers;

use App\Models\QuizAnswer;
use App\Models\UserCase;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = UserCourse::where('status',1)->paginate(10);

        return view('dashboard.course-order.users',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function show(UserCourse $userCourse)
    {
        return view('dashboard.course_quizz_result.view',compact('userCourse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCourse $userCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCourse $userCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCourse $userCourse)
    {
        //
    }
    public function quizResult()
    {
        $userCourses = UserCourse::with('course.quizzes','profile')->paginate(10);
        return view('dashboard.course_quizz_result.index',compact('userCourses'));
    }
    public function quizResultUpdate(QuizAnswer $quizAnswer,$id)
    {
      $userCourse = $quizAnswer->userCourse;
        $quizAnswer->update(['status' => $id]);
        
      
           
        
        $d=0;
        $q=0;
        $a=0;
        foreach($userCourse->quizAnswer as $quiz)
        {
           
            if($quiz->status==1)
            $d++;
            elseif($quiz->status==2)
            $q++;
            elseif($quiz->status==0)
            $a++;
        }
        if($q==0 && $d>0 && $a==0)
        {
                $userCourse->update(['status'=>1]);
        }
        $total = $userCourse->course->quizzes->count();
        $done = $userCourse->quizAnswer->count();
       
        if($total==$done && $q>0)
                $userCourse->update(['status' => 2]);
    
        
       return back()->with('success','Quiz Answer status updated');
    }
}
