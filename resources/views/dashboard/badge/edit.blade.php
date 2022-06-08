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
        <h3 class="card-label">Edit Badge</h3>
      </div>
    
    </div>
    <div class="card-body">
     
      <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Badge Details</h5>
       
      </div>
      <div class="modal-body">
          <form action="{{route('badge.update',$badge->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
       <div class="form-group">
           <label for="name">Badge Name</label>
           <input type="text" name="name" value="{{$badge->name}}" class="form-control">
       </div>
        <div class="form-group">
           <label for="badge_image">Badge Logo</label>
           <img src="{{setImage($badge->badge_image)}}" width="50px" alt="">
           <input type="file" name="badge_image" class="form-control">
       </div>
         <div class="form-group">
                        <input type="hidden" name="status" value="0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="status" class="custom-control-input" id="customSwitch1"
                                {{ $badge->status == 1 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch1">Status</label>
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
