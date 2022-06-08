@extends('layouts.dashboard')

@section('content')

  @if(session()->has('success'))
    <div class="alert alert-success">
      {{session()->get('success')}}
    </div>
  @elseif(session()->has('error'))
    <div class="alert alert-danger">
      {{session()->get('error')}}
    </div>
  @endif
  <div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
      <div class="card-title">
        <h3 class="card-label">
          Edit Service
        </h3>
      </div>
      <div class="card-toolbar">
        <a href="{{ route('services.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
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
      <form class="form" id="kt_form" method="post" action="{{ route('services.update', $service->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-xl-2"></div>
          <div class="col-xl-8">
            <div class="my-5">

              @if($service->hasMedia('icon'))
                <div class="form-group row">
                  <div class="col-md-9 offset-3">
                    <h4>Icon</h4>
                    <a href="{{ $service->getFirstMediaUrl('icon') }}" target="_blank">
                      <img src="{{ $service->getFirstMediaUrl('icon') }}" class="img-fluid" width="200" alt="">
                    </a>
                  </div>
                </div>
              @endif
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="icon">Icon</label>
                <div class="col-md-9">
                  <input name="icon" id="icon" value="{{ old('icon') }}" class="form-control form-control-solid @error('icon') is-invalid @enderror" type="file">
                  @error('icon')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="name">Name&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="name" id="name" value="{{ old('name', $service->name) }}" class="form-control form-control-solid @error('name') is-invalid @enderror" type="text">
                  @error('name')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              {{--<div class="form-group row">
                <label class="col-md-3 col-form-label" for="description">Description&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <textarea name="description" id="description" rows="3" class="form-control form-control-solid @error('description') is-invalid @enderror">{{ old('description', $service->description) }}</textarea>
                  @error('description')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>--}}

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="url">Url</label>
                <div class="col-md-9">
                  <input name="url" id="url" value="{{ old('url', $service->url) }}" class="form-control form-control-solid @error('url') is-invalid @enderror" type="text">
                  @error('url')
                  <div class="text-danger">{{ $message }}</div>
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
                   <input type="checkbox" {{ old('status', $service->status) ? 'checked' : null }} value="1" name="status"/>
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
