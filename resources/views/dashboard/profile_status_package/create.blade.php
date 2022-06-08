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
      <form class="form" id="kt_form" method="post" action="{{ route('profileStatusBoostPackages.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="my-5">
              <h4>Profile/Status Boost Package Details</h4>
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
                <label class="col-md-2 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="price" id="price" type="number" value="{{ old('price') }}" class="form-control form-control-solid @error('price') is-invalid @enderror" >
                  @error('price')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="discount">Discount <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="discount" id="discount" value="{{ old('discount') }}" class="form-control form-control-solid @error('discount') is-invalid @enderror" type="number">
                  @error('discount')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

             <div class="form-group row">
                <label class="col-md-2 col-form-label" for="type">Package Type <span class="text-danger">*</span></label>
                <div class="col-md-10">
                 <select name="type" class="form-control" id="type">
                   <option value="0">Profile Boost Package</option>
                    <option value="1">Status Boost Package</option>
                 </select>
                  @error('type')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="type">Package Duration <span class="text-danger">*</span></label>
                <div class="col-md-10">
                 <select name="duration" class="form-control" id="duration">
                  <option value="0">1 week</option>
                  <option value="1">15 days</option>
                  <option value="2">1 month</option>
                  <option value="3">3 months</option>
                  <option value="4">6 months</option>
                  <option value="5">1 year</option>
                 </select>
                  @error('type')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="details">Details <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <textarea name="details" id="details" class="form-control form-control-solid @error('details') is-invalid @enderror">{{ old('details') }}</textarea>
                  @error('details')
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
