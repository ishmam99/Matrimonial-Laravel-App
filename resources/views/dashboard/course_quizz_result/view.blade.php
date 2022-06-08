@extends('layouts.dashboard')

@section('content')
  <div class="card card-custom card-sticky" id="kt_page_sticky_card">
    
    <div class="card-header">
      <div class="card-title">
        
        <h3 class="card-label">
          User Course Info & Quiz Result
        </h3>
      </div>
      <div class="card-toolbar">
        
         <a href="{{ route('userCourse.result') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
       
       
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
     
        <div class="row">
          <div class="col-xl-12">
            <div class="my-5">

              <h4>User Course Information</h4>
              <hr>

             <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label">Instructor Image</label>
              <div class="col-lg-9 col-xl-6">
                <div class="image-input image-input-outline image-input-circle" id="kt_image_4">
                  <div class="image-input-wrapper" style="width: 150px; height:150px; background-position: center; background-image: url('{{ setImage($userCourse->course->instructor_image) }}')"></div>
                  
                </div>
                
              </div>
            </div>


              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="instructor_name">Instructor Name <span class="text-danger">*</span></label>
                <div class="col-md-10">
                <span>{{$userCourse->course->instructor_name}}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="instructor_designation">Instructor Designation <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <span  id="instructor_designation"  class="form-control form-control-solid">{{ $userCourse->course->instructor_designation}}</span>
                  
                </div>
              </div>

              <h4 class="mt-15">Course Information</h4>
              <hr>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="title">Title <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p class="form-control form-control-solid">
                    {{$userCourse->course->title}}
                  </p>
                </div>
              </div>

               <div class="form-group row">
                <label class="col-md-2 col-form-label" for="productCategory">Category&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <div class="form-group">
                   <span>{{$userCourse->course->category->name}}</span>
                  </div>
                 
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Date <span class="text-danger">*</span></label>
                <div class="col-md-5 d-flex align-items-center">
                  <label for="start_date" class="mr-4">Start</label>
                  <span name="start_date"  class="form-control form-control-solid">{{ $userCourse->course->start_date }} </span>
                 <label for="start_date" class="mr-4">End</label>
                  <span name="start_date"  class="form-control form-control-solid">{{ $userCourse->course->end_date }} </span> </div>
                
             
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <span>{{$userCourse->course->price}}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="description">Description <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p>{!!$userCourse->course->description!!}</p>
                </div>
              </div>

             
              <div class="row">
              @foreach ($userCourse->course->quizzes as $quiz)
                     <div class="col-6 p-2" style="background-color: wheat">
                                <div class="bg-white rounded shadow-sm p-5 mb-4 clearfix graph-star-rating" >
                                    <h5 class="mb-0 mb-5 text-center">Quiz Info</h5>
                                    <div class="row ">
                                        
                                        <div class="col-6">
                                            <h6>Quiz Name :</h6>
                                        </div>
                                        <div class="col-6 text-right">
                                            <h6> {{ $quiz->name }}</h6>
                                        </div>
                                        
                                         <div class="col-6">

                                            <p>Type :</p>
                                        </div>
                                        <div class="col-6 text-right">

                                            <p>{{ $quiz->type==1? 'MCQ':'Written' }}</p>
                                        </div>
                                        @if ($quiz->type==1)
                                        <div class="col-6 text-left">

                                            <p>A){{ $quiz->mcq_1 }}</p>
                                        </div>
                                        <div class="col-6 text-left">

                                            <p>B){{ $quiz->mcq_2 }}</p>
                                        </div>
                                        <div class="col-6 text-left">

                                            <p>C){{ $quiz->mcq_3 }}</p>
                                        </div>
                                        <div class="col-6 text-left">

                                            <p>D){{ $quiz->mcq_4 }}</p>
                                        </div>
                                            
                                        @endif
                                        <div class="col-6">

                                            <p>Point :</p>
                                        </div>
                                        <div class="col-6 text-right">

                                            <p>{{ $quiz->point }}</p>
                                        </div>
                                        
                                        <div class="col-3">

                                            <p>Quiz Details :</p>
                                        </div>
                                        <div class="col-9 text-right">
                                           
                                            <p>{{ $quiz->quiz }}</p>
                                        </div>
                                         <div class="col-3 bg-success text-white">

                                            <p>Quiz Answer :</p>
                                        </div>
                                        <div class="col-9 text-right bg-success text-white">
                                           
                                            <p>{{ $quiz->answer }}</p>
                                        </div>
                                         @php
                                $userAnswer = App\Models\QuizAnswer::where([['user_course_id',$userCourse->id],['course_quiz_id',$quiz->id]])->first();
                            @endphp  
                             @if ($userAnswer)
                                      <div class="col-3 bg-primary text-white">

                                            <p>User Quiz Answer:</p>
                                        </div>
                                     
                                            
                                       
                                        <div class="col-9 text-right bg-primary text-white">
                                           
                                            <p>{{ $userAnswer->answer }}</p>
                                        </div>
                                        <div class="col-12 text-right text-white">
                                          @if ($userAnswer->status==1)
                                               <span class="bg-success p-3 d-inline-block rounded">Accepted</span>
                                          @elseif($userAnswer->status==2)
                                              <span class="btn btn-danger p-3 d-inline-block rounded">Wrong</span>
                                          @else

                                          <a href="{{route('userCourse.resultUpdate',[$userAnswer->id,2])}}"> <button class="btn" style="background-color:red;color:white">Incorrect</button></a>
                                          <a href="{{route('userCourse.resultUpdate',[$userAnswer->id,1])}}">   <button class="btn" style="background-color:green;color:white">Correct</button></a>
                                          @endif
                                           
                                        </div>
                                         @endif
                                    </div>
                                </div>
                            </div>

                           

              @endforeach
                          </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  
@endsection



