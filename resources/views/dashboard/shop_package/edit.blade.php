@extends('layouts.dashboard')

@section('content')

  <div class="card card-custom">
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{session()->get('success')}}
      </div>
    @elseif(session()->has('error'))
      <div class="alert alert-danger">
        {{session()->get('error')}}
      </div>
    @endif
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
      <div class="card-title">
        <h3 class="card-label">Edit Package</h3>
      </div>
    
    </div>
    <div class="card-body">
     
      <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Package Details</h5>
       
      </div>
      <div class="modal-body">
          <form action="{{route('shopPackage.update',$shopPackage->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
       <div class="form-group">
          <label for="name">Package Name</label>
           <input name="name" class="form-control" id="name" value="{{$shopPackage->name}}" type="text" required>
           
       </div>
        <div class="form-group">
           <label for="fee">Package Price</label>
           <input type="number" name="price" value="{{$shopPackage->price}}"  class="form-control">
       </div>
          <div class="form-group">
                <label class="col-md-6 col-form-label" for="type">Products<span class="text-danger">*</span></label>
               
                 <select width="100%" class="js-example-placeholder-multiple js-states form-control" name="products[]"  multiple="multiple">
                  
                   @foreach (App\Models\Product::all() as $product)
                         <option value="{{$product->id}}">{{$product->title}}</option> 
                   @endforeach
               
                  
                </select>
             
                  @error('type')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                 
                
              </div>
              <div class="form-group">
                <label for="expired_at">Expired At</label>
                <input type="date" name="expired_at" class="form-control" value="{{Carbon\Carbon::parse($shopPackage->expired_at)->format('Y-m-d')}}"  id="expired_at">
              </div>
               <div class="form-group">
                <label for="image" class="d-block">{{ __('Banner') }}</label>
                 @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                <div class="image-input image-input-empty image-input-outline" id="image" style="background-image: url('{{setImage($shopPackage->banner)}}')">
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div></form>
    </div>
  </div>
      {{-- {{ $cities->links() }} --}}
    </div>
  </div>

</div>
@endsection
@push('script') <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
             $(document).ready(function() {
      
  
                    $(".js-example-placeholder-multiple").select2().val({{ json_encode($shopPackage->packageProduct()->pluck('product_id')) }}).trigger('change');
           
        });
       
    </script>
    <script src="{{ asset('assets/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
  <script>
    let avatar5 = new KTImageInput('image');
    let avatar6 = new KTImageInput('footerLogo');
    $(document).ready( function() {
    // Correct bug to show placeholder
    $('.select2-search__field').css({"width":"200px"});
});
  </script>
@endpush