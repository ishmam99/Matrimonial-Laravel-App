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
                <span>{{$profileStatusBoostPackage->name}}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Package Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <span >{{ $profileStatusBoostPackage->price}}</span>
                  
                </div>
              </div>

             

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="title">Details <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p >
                    {{$profileStatusBoostPackage->details}}
                  </p>
                </div>
              </div>

               <div class="form-group row">
                <label class="col-md-2 col-form-label" for="productCategory">Type<span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <div class="form-group">
                    @if ($profileStatusBoostPackage->type==0)
                        <span>Profile Boost Package</span>
                    @else
                    <span>Status Boost Package</span>
                    @endif
                   
                  </div>
                 
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Discount <span class="text-danger">*</span></label>
                <div class="col-md-10">
                
                  <span name="discount">{{ $profileStatusBoostPackage->discount}}% </span>
               
             
              </div>
              </div>
             

             

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Status</label>
                <div class="col-md-10">
                 
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" disabled {{ $profileStatusBoostPackage->status == 0 ? 'checked' : '' }} value="1" name="status"/>
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

