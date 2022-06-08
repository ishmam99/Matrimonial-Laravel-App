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
        <h3 class="card-label">Package List</h3>
      </div>
      <div class="card-toolbar">
        <a href="#" class="btn btn-primary font-weight-bolder">
          <span class="svg-icon svg-icon-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"></rect>
                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                <path
                  d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                  fill="#000000" opacity="0.3"></path>
              </g>
            </svg>
          </span>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add New Package
</button>

        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Banner</th>
              <th>Price</th>
              <th>Products</th>
              <th>Orders</th>
              <th>Expires At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($packages as $package)
              <tr>
                <td>{{ $loop->iteration + $packages->firstItem() - 1 }}</td>
                <td>{{$package->name}}</td>
                <td><img src="{{setImage($package->banner)}}" height="50px" width="50px" alt=""></td>
                <td>{{$package->price}}</td>
                <td>{{$package->packageProduct->count()}}</td>
                <td>{{$package->shopPackageOrder->count()}}</td>
                <td>{{Carbon\Carbon::parse($package->expired_at)->format('Y-m-d')}}</td>
                <td nowrap="nowrap">
                  <a href="{{route('shopPackage.edit',$package->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm ">
                    <span class="svg-icon svg-icon-md svg-icon-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <rect x="0" y="0" width="24" height="24"></rect>
                          <path
                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                            fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                          <path
                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                        </g>
                      </svg>
                    </span>
                  </a>
                  <form method="post" action="{{route('shopPackage.destroy',$package->id)}}" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-icon btn-light btn-hover-danger btn-sm">
                      <span class="svg-icon svg-icon-md svg-icon-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                            <path
                              d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                              fill="#000000" opacity="0.3"></path>
                          </g>
                        </svg>
                      </span>
                    </button>
                  </form>
                   <a href="{{ route('shopPackage.show', $package->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-2">
                    <span class="svg-icon svg-icon-md svg-icon-primary">
                      <img src="https://img.icons8.com/ios/20/000000/view-file.png"/>
                    </span>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $packages->links() }}
    </div>
  </div><div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color: wheat">
          <form action="{{route('shopPackage.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
       <div class="form-group">
          <label for="name">Package Name</label>
           <input name="name" class="form-control" id="name" type="text" required>
           
       </div>
        <div class="form-group">
           <label for="fee">Package Price</label>
           <input type="number" name="price" class="form-control">
       </div>
          <div class="form-group">
                <label class="col-md-2 col-form-label" for="type">Products <span class="text-danger">*</span></label>
               
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
                <input type="date" name="expired_at" class="form-control" id="expired_at">
              </div>
               <div class="form-group">
                <label for="image" class="d-block">{{ __('Banner') }}</label>
                 @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                <div class="image-input image-input-empty image-input-outline" id="image" style="background-image: url()">
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
</div>
@endsection

@push('script')
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