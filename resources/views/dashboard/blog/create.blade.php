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
          Add Post
        </h3>
      </div>
      <div class="card-toolbar">
        <a href="{{ route('blog.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder submit">
            <i class="ki ki-check icon-sm"></i>
            Save Post
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
      <form class="form" id="kt_form" method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-xl-12">
            <div class="my-5">

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="image">Image <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="image" id="image" value="{{ old('image') }}" class="form-control form-control-solid @error('image') is-invalid @enderror" type="file" required>
                  @error('image')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

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
                <label class="col-md-2 col-form-label" for="content">Content <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <textarea name="content" id="content" class="form-control form-control-solid @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                  @error('content')
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
      .create( document.querySelector( '#content' ) )
      .catch( error => {
        console.error( error );
      } );
  </script>
@endpush
