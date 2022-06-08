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
        <h3 class="card-label">Package Users List</h3>
      </div>
      <div class="card-toolbar">
        
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Type</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $profile)
              <tr>
                <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                <td>{{$profile->name}}</td>
               
                <td>{{$profile->type == App\Models\Profile::SUSPENDED ? 'Suspended' : ($profile->type== App\Models\Profile::RESTRICTED ? 'Restrcited' :  'Active')}}</td>
                <td>{{$profile->userPackage->status==0 ? 'Pending':($profile->userPackage->status==1?'Approved':'Cancelled')}}</td> 
                <td nowrap="nowrap">
                 
                 <a href="{{route('notification.pay',$profile->user->id)}}" class="btn btn-primary">Pay</a>
                  <a href="{{route('notification.upgrade',$profile->user->id)}}" class="btn btn-warning">Upgrade</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $users->links() }}
    </div>
  
</div>
@endsection
