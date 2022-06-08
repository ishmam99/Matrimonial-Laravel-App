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
           Package Info
        </h3>
      </div>
      <div class="card-toolbar">
        
        
      
       
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
     
        <div class="row">
          <div class="col-xl-12">
            


              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="name">Package Name <span class="text-danger">*</span></label>
                <div class="col-md-10">
                <span>{{$coursePackage->name}}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Package Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <span >{{ $coursePackage->fee}}</span>
                  
                </div>
              </div>

             

              


              <div class="form-group row">
                <label class="col-md-2 col-form-label">Courses <span class="text-danger">*</span></label>
                <div class="col-md-10">
                
               <div class="row">
                @foreach ($coursePackage->packageCourse->load('course') as $course)
                  <div class="card col-4" style="background-color: rgb(177, 255, 246)">
                    <div class="card-header text-center">
                    <h4>{{$course->course->title}}</h4>
                  </div>
                  <div class="card-body ">
                    <div class="text-center">
                    <img src="{{setImage($course->course->instructor_img,'user')}}" height="50px" width="50px" alt="">
                    <p>{{$course->course->instructor_name}}</p>
                   </div> <hr>
                   <p>{!!$course->course->description!!}</p>
                    
                  </div>
                  </div>
                   
                @endforeach
               </div>
             
              </div>
              </div>
             

             

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Status</label>
                <div class="col-md-10">
                 
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" disabled {{ $coursePackage->status == 0 ? 'checked' : '' }} value="1" name="status"/>
                    <span></span>
                  </label>
                </span>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </form>
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
  </script>
@endpush

