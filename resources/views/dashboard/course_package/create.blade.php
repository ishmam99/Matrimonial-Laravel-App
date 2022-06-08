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
    <div class="card-header" style="background-color: rgba(66, 86, 195, 0.429)">
     
      <div class="card-toolbar">
        <a href="{{ route('profileStatusBoostPackages.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder submit">
            <i class="ki ki-check icon-sm"></i>
            Save Package
          </button>
        </div>
      </div>
    </div>
    <div class="card-body" style="background-color: rgba(160, 198, 234, 0.43)">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form class="form" id="kt_form" method="post" action="{{ route('coursePackage.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="my-5">
              <h4>Course Package Details</h4>
              <hr>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="image">Package Name <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="name" id="name" value="{{ old('name') }}" class="form-control form-control-solid @error('name') is-invalid @enderror" type="text">
                  @error('name')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="fee">Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="fee" id="fee" type="number" value="{{ old('fee') }}" class="form-control form-control-solid @error('fee') is-invalid @enderror" >
                  @error('fee')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

          

             <div class="form-group row">
                <label class="col-md-2 col-form-label" for="type">Courses <span class="text-danger">*</span></label>
                <div class="col-10">
                 <select  class="js-example-placeholder-multiple js-states form-control" name="courses[]"  multiple="multiple">
                  
                   @foreach (App\Models\Course::all() as $course)
                         <option value="{{$course->id}}">{{$course->title}}</option> 
                   @endforeach
               
                  
                </select>
              </div>
                  @error('type')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                 
                
              </div>
              
              
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Publish <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input type="hidden" value="0" name="status"/>
                  <span class="switch switch-icon">
                    <label>
                      <input type="checkbox" checked value="1" name="status"/>
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
   
  </div
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
@endpush
