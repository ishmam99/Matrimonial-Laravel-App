@extends('layouts.dashboard')

@section('content')
  <div class="card card-custom card-sticky" id="kt_page_sticky_card">
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{session()->get('success')}}
      </div>
    @elseif(session()->has('error'))
      <div class="alert alert-danger">
        {{session()->get('error')}}
      </div>
    @endif
    <div class="card-header">
      <div class="card-title">
        
        <h3 class="card-label">
           Course Info
        </h3>
      </div>
      <div class="card-toolbar">
        
        
        <div class="btn-group">
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
          Add Quiz
          </button>
        </div>
       <div class="btn-group">
          <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#exampleModal1">
          Add Content
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
     
        <div class="row">
          <div class="col-xl-12">
            <div class="my-5">

              <h4>Instructor Information</h4>
              <hr>

             <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label">Instructor Image</label>
              <div class="col-lg-9 col-xl-6">
                <div class="image-input image-input-outline image-input-circle" id="kt_image_4">
                  <div class="image-input-wrapper" style="width: 150px; height:150px; background-position: center; background-image: url('{{ setImage($course->instructor_image) }}')"></div>
                  <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                   
                  </label>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
                </div>
                
              </div>
            </div>


              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="instructor_name">Instructor Name <span class="text-danger">*</span></label>
                <div class="col-md-10">
                <span>{{$course->instructor_name}}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="instructor_designation">Instructor Designation <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <span  id="instructor_designation"  class="form-control form-control-solid">{{ $course->instructor_designation}}</span>
                  
                </div>
              </div>

              <h4 class="mt-15">Course Information</h4>
              <hr>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="title">Title <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p class="form-control form-control-solid">
                    {{$course->title}}
                  </p>
                </div>
              </div>

               <div class="form-group row">
                <label class="col-md-2 col-form-label" for="productCategory">Category&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <div class="form-group">
                   <span>{{$course->category->name}}</span>
                  </div>
                 
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Date <span class="text-danger">*</span></label>
                <div class="col-md-5 d-flex align-items-center">
                  <label for="start_date" class="mr-4">Start</label>
                  <span name="start_date"  class="form-control form-control-solid">{{ $course->start_date }} </span>
                 <label for="start_date" class="mr-4">End</label>
                  <span name="start_date"  class="form-control form-control-solid">{{ $course->end_date }} </span> </div>
                
             
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <span>{{$course->price}}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="description">Description <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p>{!!$course->description!!}</p>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Status</label>
                <div class="col-md-10">
                 
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" disabled {{ $course->status == 1 ? 'checked' : '' }} value="1" name="status"/>
                    <span></span>
                  </label>
                </span>
                </div>
              </div>
              <div class="row">
              @foreach ($course->quizzes as $quiz)
                     <div class="col-4 p-2" style="background-color: wheat">
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
                                        <div class="col-6 text-right">

                                            <p>B){{ $quiz->mcq_2 }}</p>
                                        </div>
                                        <div class="col-6 text-left">

                                            <p>C){{ $quiz->mcq_3 }}</p>
                                        </div>
                                        <div class="col-6 text-right">

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
                                         <div class="col-3">

                                            <p>Quiz Answer :</p>
                                        </div>
                                        <div class="col-9 text-right">
                                           
                                            <p>{{ $quiz->answer }}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
              @endforeach
                          </div>
            </div>
          </div>
          <div class="col-10">
            
  <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Course Content Thumbnail Gallery</h1>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-start">
@foreach ($course->courseContent as $content)
    

    <div class="col-lg-3 col-md-4 col-6">
        <h6>{{$content->contentMedia->name}}</h6>
        
      <a href="{{route('contentMedia.show',$content->id)}}" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail" src="{{setImage($content->contentMedia->thumb)}}" alt="">
      </a>
    </div>
    @endforeach
   
          </div>
        </div>
      
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('quiz.store',$course->id)}}" method="POST">
              @csrf
       <div class="form-group">
           <label for="name">Quiz Name</label>
           <input type="text" name="name" class="form-control">
       </div>
       <div class="form-group">
           <label for="quiz">Quiz Details</label>
           <textarea name="quiz" id="quiz" cols="30" rows="10" class="form-control"></textarea>
          
       </div>
       <div class="form-group">
           <label for="type">Quiz Type</label>
           <select name="type" id="type" class="form-control" onchange="mcq('hideValuesOnSelect', this)">
             <option value="2">Written</option>
             <option value="1">MCQ</option>
           </select>
       </div>
       <div class="mcq" id="mcq" style="display: none">
       <div class="form-group">
           <label for="point">Quiz MCQ 1</label>
           <input type="text" name="mcq_1" class="form-control">
       </div><div class="form-group">
           <label for="point">Quiz MCQ 2</label>
           <input type="text" name="mcq_2" class="form-control">
       </div><div class="form-group">
           <label for="point">Quiz MCQ 3</label>
           <input type="text" name="mcq_3" class="form-control">
       </div><div class="form-group">
           <label for="point">Quiz MCQ 4</label>
           <input type="text" name="mcq_4" class="form-control">
       </div>
      </div>
       <div class="form-group">
           <label for="answer">Quiz Answer</label>
           <input type="text" name="answer" class="form-control">
       </div>
       <div class="form-group">
           <label for="point">Quiz Point</label>
           <input type="number" name="point" class="form-control">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div></form>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('course.content.add',$course->id)}}" method="POST">
              @csrf
      
     
       <div class="form-group">
           <label for="point">Content Name</label>
           <select name="content_media_id" id="content_media_id" class="form-control">
             @foreach (App\Models\ContentMedia::all() as $item)
                 <option value="{{$item->id}}">{{$item->name}}</option>
             @endforeach
           </select>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div></form>
    </div>
  </div>
</div>
@endsection

@push('script')
  <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create( document.querySelector( '#description' ) )
      .catch( error => {
        console.error( error );
      } );
  </script>
  <script src="{{ asset('assets/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
  <script>
  //  let avatar5 = new KTImageInput('user_image');
     let avatar4 = new KTImageInput('instructor_image');
     document.getElementById('type').addEventListener('change', function () {
    var style = this.value == 1 ? 'block' : 'none';
    document.getElementById('mcq').style.display = style;
});
  </script>
@endpush

