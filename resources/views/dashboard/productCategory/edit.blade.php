@extends('layouts.dashboard')

@section('content')

  <div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">
          Edit Product Category
        </h3>
      </div>
      <div class="card-toolbar">
        <a href="{{ route('productCategory.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder">
            <i class="ki ki-check icon-sm"></i>
            Update Form
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
      <form class="form" id="kt_form" method="post" action="{{ route('productCategory.update', $productCategory->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-xl-2"></div>
          <div class="col-xl-8">
            <div class="my-5">
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="name">Title <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="name" id="name" value="{{ old('name', $productCategory->name) }}" class="form-control form-control-solid @error('name') is-invalid @enderror" type="text" required>
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="image" class="d-block">{{ __('Image') }}</label>
                <div class="image-input image-input-empty image-input-outline" id="image" style="background-image: url('{{ setImage($productCategory->image) }}')">
                  <div class="image-input-wrapper"></div>
                  <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="profile_avatar_remove" />
                  </label>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                  </span>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                  </span>
                </div>
              </div>
              {{-- <div class="form-group row">
                <label class="col-md-3 col-form-label" for="message">Message <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <textarea name="message" id="message" class="form-control form-control-solid @error('message') is-invalid @enderror" required>{{ old('message', $productCategory->message) }}</textarea>
                  @error('message')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div> --}}
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="status">Status
                  <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input type="hidden" value="0" name="status"/>
                  <span class="switch switch-icon">
                  <label>
                   <input type="checkbox" {{ old('status', $productCategory->status) ? 'checked' : null }} value="1" name="status"/>
                   <span></span>
                  </label>
                 </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-2"></div>
        </div>
      </form>
      <!--end::Form-->
    </div>
  </div>

@endsection

@push('script')
  <script src="{{ asset('assets/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
  <script>
    let avatar5 = new KTImageInput('image');
    let avatar6 = new KTImageInput('footerLogo');
  </script>
@endpush
