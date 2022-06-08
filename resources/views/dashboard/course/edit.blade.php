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
          Add Course
        </h3>
      </div>
      <div class="card-toolbar">
        <a href="{{ route('course.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder submit mr-2">
            <i class="ki ki-check icon-sm"></i>
            Update Course
          </button>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-warning m-2" data-toggle="modal" data-target="#exampleModal">
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
      <form class="form" id="kt_form" method="post" action="{{ route('course.update', $course->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
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
                    <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                    <input type="hidden" name="photo_remove"/>
                  </label>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
                </div>
                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
              </div>
            </div>


              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="instructor_name">Instructor Name <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="instructor_name" id="instructor_name" value="{{ old('instructor_name', $course->instructor_name) }}" class="form-control form-control-solid @error('instructor_name') is-invalid @enderror" type="text">
                  @error('instructor_name')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="instructor_designation">Instructor Designation <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="instructor_designation" id="instructor_designation" value="{{ old('instructor_designation', $course->instructor_designation) }}" class="form-control form-control-solid @error('instructor_designation') is-invalid @enderror" type="text">
                  @error('instructor_designation')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <h4 class="mt-15">Course Information</h4>
              <hr>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="title">Title <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="title" id="title" value="{{ old('title', $course->title) }}" class="form-control form-control-solid @error('title') is-invalid @enderror" type="text">
                  @error('title')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

               <div class="form-group row">
                <label class="col-md-2 col-form-label" for="productCategory">Category&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <div class="form-group">
                    <select class="form-control select2" name="category_id" id="">
                      @foreach(App\Models\Category::all() as $productCategory)
                        <option value="{{ $productCategory->id}}" {{ $productCategory->id==$course->category_id ? 'selected' : null }}>{{ $productCategory->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('productCategory_id')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Date <span class="text-danger">*</span></label>
                <div class="col-md-5 d-flex align-items-center">
                  <label for="start_date" class="mr-4">Start</label>
                  <input name="start_date" id="start_date" value="{{ old('start_date', $course->start_date) }}" class="form-control form-control-solid @error('start_date') is-invalid @enderror" type="date">
                </div>
                <div class="col-md-5 d-flex align-items-center">
                  <label for="end_date" class="mr-4">End</label>
                  <input name="end_date" id="end_date" value="{{ old('end_date', $course->end_date) }}" class="form-control form-control-solid @error('end_date') is-invalid @enderror" type="date">
                </div>
                @error(['start_date', 'end_date'])
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="price" id="price" value="{{ old('price', $course->price) }}" class="form-control form-control-solid @error('price') is-invalid @enderror" type="number" step="0.01">
                  @error('price')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="description">Description <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <textarea name="description" id="description" class="form-control form-control-solid @error('description') is-invalid @enderror">{{ old('description', $course->description) }}</textarea>
                  @error('description')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Publish</label>
                <div class="col-md-10">
                  <input type="hidden" value="0" name="status"/>
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" {{ $course->status == 1 ? 'checked' : '' }} value="1" name="status"/>
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
  </script>
@endpush

