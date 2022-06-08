@extends('layouts.dashboard')

@section('content')

  <div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">
          Add New Client
        </h3>
      </div>
      <div class="card-toolbar">
        <a href="{{ route('clients.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder">
            <i class="ki ki-check icon-sm"></i>
            Save Form
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
      <form class="form" id="kt_form" method="post" action="{{ route('clients.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-xl-2"></div>
          <div class="col-xl-8">
            <div class="my-5">
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="logo">Logo&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="logo" id="logo" value="{{ old('logo') }}" class="form-control form-control-solid @error('logo') is-invalid @enderror" type="file">
                  @error('logo')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="name">Client Name&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="name" id="name" value="{{ old('name') }}" class="form-control form-control-solid @error('name') is-invalid @enderror" type="text">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="status">Status</label>
                <div class="col-md-9">
                  <input type="hidden" checked value="0" name="status"/>
                  <span class="switch switch-icon">
                  <label>
                   <input type="checkbox" {{ old('status', 1) ? 'checked' : null }} value="1" name="status"/>
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
