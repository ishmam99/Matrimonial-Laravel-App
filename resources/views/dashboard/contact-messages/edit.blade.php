@extends('layouts.dashboard')

@section('content')

  <div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">
          Edit Client
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
            Update Form
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
      <form class="form" id="kt_form" method="post" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-xl-2"></div>
          <div class="col-xl-8">
            <div class="my-5">

              @if($client->hasMedia('logo'))
                <div class="form-group row">
                  <div class="col-md-9 offset-3">
                    <h4>Logo</h4>
                    <a href="{{ $client->getFirstMediaUrl('logo') }}" target="_blank">
                      <img src="{{ $client->getFirstMediaUrl('logo') }}" class="img-fluid" width="200" alt="">
                    </a>
                  </div>
                </div>
              @endif
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="logo">Logo</label>
                <div class="col-md-9">
                  <input name="logo" id="logo" value="{{ old('logo') }}" class="form-control form-control-solid @error('logo') is-invalid @enderror" type="file">
                  @error('logo')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="name">Client Name
                  <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="name" id="name" value="{{ old('name', $client->name) }}" class="form-control form-control-solid @error('name') is-invalid @enderror" type="text">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="status">Status
                  <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input type="hidden" value="0" name="status"/>
                  <span class="switch switch-icon">
                  <label>
                   <input type="checkbox" {{ old('status', $client->status) ? 'checked' : null }} value="1" name="status"/>
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
