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
        <h3 class="card-label">
     
          Agent Category Update
          </h3>
      </div>
     
    </div>
    <div class="card-body">
     <form action="{{route('agentCategory.update',$agentCategory->id)}}" method="POST">
              @csrf
              @method('PUT')
       <div class="form-group">
           <label for="name">Category Name</label>
           <input type="text" name="name" value="{{$agentCategory->name}}" class="form-control">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div></form>
    </div>
  </div>

@endsection
