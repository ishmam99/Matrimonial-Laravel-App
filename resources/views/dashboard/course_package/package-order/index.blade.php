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
        <h3 class="card-label">Package Order List</h3>
      </div>
    </div>
    <div class="card-body">
    


      <div class="table-responsive">
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
          <thead>
            <tr>
              <th>SL</th>
              <th>Request Date</th>
              <th>Package Name</th>
              <th>User Name</th>
              <th>Courses</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $list)
              <tr>
                <td>{{ $loop->iteration + $orders->firstItem()-1}}</td>
                <td>{{ $list->created_at->format('F d, Y') }}</td>
                <td><a href="{{route('coursePackage.show',$list->coursePackage->id)}}">{{ $list->coursePackage->name }} </a></td>
                 <td>{{ $list->profile->name }} </td>
                
                 <td>{{$list->coursePackage->packageCourse->count()}}</td>
                <td>
                  @if ($list->status==0)
                      <span class="badge badge-warning">Order Placed</span>
                  @elseif($list->status == 1)
                      <span class="badge badge-primary">Payment Done</span>
                  @elseif($list->status == 2)
                    <span class="badge badge-success">Accepted</span>
                  @endif
                    
                  
                </td>
                
                <td class="text-center">
                
                   <a href="{{ route('coursePackageUser.show', $list->id) }}" class="btn btn-success "><i class="fa fa-eye"></i>
                    View
                  </a>
                  
                 <a href="{{route('notification.pay',$list->profile->user->id)}}" class="btn btn-primary"><i class="fa fa-bell"></i> Pay</a>
                  <a href="{{route('notification.upgrade',$list->profile->user->id)}}" class="btn btn-warning"><i class="fa fa-bell"></i> Upgrade</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $orders->links() }}
    </div>
  </div>

@endsection
