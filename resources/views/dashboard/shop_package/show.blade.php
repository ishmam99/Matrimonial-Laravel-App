@extends('layouts.dashboard')

@section('content')
  <div class="card card-custom" id="kt_page_sticky_card">
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
                <span>{{$shopPackage->name}}</span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Package Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <span >{{ $shopPackage->price}}</span>
                  
                </div>
              </div>

             
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Expires At <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <span >{{ Carbon\Carbon::parse($shopPackage->expired_at)->format('Y-m-d')}}</span>
                  
                </div>
              </div>
              


              <div class="form-group row">
                <label class="col-md-2 col-form-label">Products <span class="text-danger">*</span></label>
                <div class="col-md-10">
                
               <div class="row">
                @foreach ($shopPackage->packageProduct->load('product') as $packageProduct)
                  <div class="card col-4" style="background-color: rgb(177, 255, 246)">
                    <div class="card-header text-center">
                    <h4>{{$packageProduct->product->title}}</h4>
                  </div>
                  <div class="card-body ">
                    <div class="text-center">
                    <img src="{{setImage($packageProduct->product->image_one)}}" height="50px" width="50px" alt="">
                    <p>Price : {{$packageProduct->product->price}}$</p>
                    <p>Stock :{{$packageProduct->product->stock}}</p>
                   </div> <hr>
                   <p>Details <br>{!!$packageProduct->product->content!!}</p>
                    
                  </div>
                  </div>
                   
                @endforeach
               </div>
             
              </div>
              </div>
             

             

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Status</label>
                <div class="col-md-10">
                 
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" disabled {{ $shopPackage->status == 0 ? 'checked' : '' }} value="1" name="status"/>
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

