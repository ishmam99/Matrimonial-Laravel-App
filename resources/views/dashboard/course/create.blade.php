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
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder submit">
            <i class="ki ki-check icon-sm"></i>
            Save Course
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form class="form" id="kt_form" method="post" action="{{ route('course.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="my-5">
              <h4>Instructor Information</h4>
              <hr>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="image">Instructor Image <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="image" id="image" value="{{ old('image') }}" class="form-control form-control-solid @error('image') is-invalid @enderror" type="file">
                  @error('image')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="instructor_name">Instructor Name <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="instructor_name" id="instructor_name" value="{{ old('instructor_name') }}" class="form-control form-control-solid @error('instructor_name') is-invalid @enderror" type="text">
                  @error('instructor_name')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="instructor_designation">Instructor Designation <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="instructor_designation" id="instructor_designation" value="{{ old('instructor_designation') }}" class="form-control form-control-solid @error('instructor_designation') is-invalid @enderror" type="text">
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
                  <input name="title" id="title" value="{{ old('title') }}" class="form-control form-control-solid @error('title') is-invalid @enderror" type="text">
                  @error('title')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="category">Category&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-8">
                  <div class="form-group">
                    <select class="form-control select2" name="category_id" id="">
                      @foreach($categories as $category)
                        <option value="{{ $category->id}}">{{ $category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('category')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Date <span class="text-danger">*</span></label>
                <div class="col-md-5 d-flex align-items-center">
                  <label for="start_date" class="mr-4">Start</label>
                  <input name="start_date" id="start_date" value="{{ old('start_date') }}" class="form-control form-control-solid @error('start_date') is-invalid @enderror" type="date">
                </div>
                <div class="col-md-5 d-flex align-items-center">
                  <label for="end_date" class="mr-4">End</label>
                  <input name="end_date" id="end_date" value="{{ old('end_date') }}" class="form-control form-control-solid @error('end_date') is-invalid @enderror" type="date">
                </div>
                @error(['start_date', 'end_date'])
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="price" id="price" value="{{ old('price') }}" class="form-control form-control-solid @error('price') is-invalid @enderror" type="number" step="0.01">
                  @error('price')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="description">Description <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <textarea name="description" id="description" class="form-control form-control-solid @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                  @error('description')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
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
