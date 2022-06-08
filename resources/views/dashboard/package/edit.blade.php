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
          <form action="{{route('package.update',$package->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
       <div class="form-group">
           <label for="name">Package Name</label>
           <input type="text" name="name" value="{{$package->name}}" class="form-control">
       </div>
        <div class="form-group">
           <label for="badge_image">Package Type</label>
         <select name="type" class="form-control" id="type">
          <option value="1" {{ $package->type == 1 ? 'selected' : '' }}>1 Month</option>
          <option value="2" {{ $package->type == 2 ? 'selected' : '' }}>3 Months</option>
          <option value="3" {{ $package->type == 3 ? 'selected' : '' }}>6 Months</option>
          <option value="4" {{ $package->type == 4 ? 'selected' : '' }}>1 Year</option>
         </select>
       </div>
        <div class="form-group">
           <label for="fee">Package Fee</label>
           <input type="number" value="{{$package->fee}}" name="fee" class="form-control">
       </div>
          <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Status</label>
                <div class="col-md-10">
                  <input type="hidden" value="1" name="status"/>
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" {{ $package->status == 0 ? 'checked' : '' }} value="0" name="status"/>
                    <span></span>
                  </label>
                </span>
                </div>
              </div>
      </div>
      <div class="modal-footer">
      
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div></form>
    </div>
  </div>
      {{-- {{ $cities->links() }} --}}
    </div>
  </div>

</div>
@endsection
