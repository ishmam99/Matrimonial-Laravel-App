@extends('layouts.dashboard')

@section('content')
  <div class="card card-custom " id="kt_page_sticky_card">
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
        <a href="{{ route('professional-package.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder submit mr-2">
            <i class="ki ki-check icon-sm"></i>
            Update Package
          </button>
        </div>
         <div class="btn-group">
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
          Add Services
          </button>
        </div>
       
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
      <form class="form" id="kt_form" method="post" action="{{ route('professional-package.update', $professionalPackage->id) }}" enctype="multipart/form-data">
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
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="my-5">
              <h4>Professional Package Details</h4>
              <hr>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="image">Package Name <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="name" id="name"  value="{{$professionalPackage->name}}" class="form-control form-control-solid @error('name') is-invalid @enderror" type="text">
                  @error('name')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="price" id="price"  value="{{$professionalPackage->price}}"  class="form-control form-control-solid @error('price') is-invalid @enderror" type="text">
                  @error('price')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="discount">Discount <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="discount" id="discount" value="{{$professionalPackage->discount}}"  class="form-control form-control-solid @error('discount') is-invalid @enderror" type="text">
                  @error('discount')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

             

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Publish</label>
                <div class="col-md-10">
                  <input type="hidden" value="1" name="status"/>
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" {{ $professionalPackage->status == 0 ? 'checked' : '' }} value="0" name="status"/>
                    <span></span>
                  </label>
                </span>
                </div>
              </div>

            </div>
          </div>
        </div>
      </form>
    
    <section>
      
      <div class="card-header">
        Services
      </div>  <div class="row">
          @foreach ($professionalPackage->services as $item)
                <div class="col-sm-4 m-2 "> 
                    <div class="card">
                       <form action="{{route('professional-package.serviceUpdate',$item->id)}}" method="POST">
                        @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control form-control-solid" name="name" value="{{$item->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="services">Services</label>
                    <input type="text" class="form-control form-control-solid" name="services" value="{{$item->services}}" class="form-control">
                </div>
                
               
                <div class="footer">
                 
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div> 
              </form>
           
             </div></div>
                @endforeach 
     </div>
    </section>
    </div>
    </div>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Services</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('professional-package.service',$professionalPackage->id)}}" method="POST">
              @csrf
       <div class="form-group">
           <label for="name">Name</label>
           <input type="text" name="name" class="form-control">
       </div>
       <div class="form-group">
           <label for="services">Services</label>
           <input type="text" name="services" class="form-control">
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

