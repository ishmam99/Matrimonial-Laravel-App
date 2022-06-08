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
              <th>Package Type</th>
              <th>Duration</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $list)
              <tr>
                <td>{{ $loop->iteration + $orders->firstItem()-1}}</td>
                <td>{{ $list->created_at->format('F d, Y') }}</td>
                <td>{{ $list->package->name }} </td>
                 <td>{{ $list->user->name }} </td>
                 <td>{{$list->package->type==0 ? 'Profile Boost' : 'Status Boost'}}</td>
                 <td>
                   <?php
                     $duration = $list->package->duration ;

                      switch ($duration) {
                        case 0:
                          echo "1 week";
                          break;
                        case 1:
                          echo "15 days";
                          break;
                        case 2:
                          echo "1 month";
                          break;
                           case 3:
                          echo "3 month";
                          break;
                           case 4:
                          echo "6 months";
                          break;
                        default:
                          echo "1 year";
                      }
                      ?>
                 </td>
                <td>
                  @if ($list->status==0)
                      <span class="badge badge-warning">Pending</span>
                  @elseif($list->status == 1)
                      <span class="badge badge-success">Accepted</span>
                  @else
                    <span class="badge badge-danger">Rejected</span>
                  @endif
                    
                  
                </td>
                
                <td >
                
                    <form action="{{ route('profileStatusPackage.packageOrder', $list->id) }}" method="POST" >
                      @csrf
                      <div class="row">
                        <div class="col-8">
                      <select name="type" id="type" class="form-control">
                        <option value="0">Pending</option>
                        <option value="1">Accept</option>
                        <option value="3">Reject</option>
                      </select></div>
                    <button type="submit" class="btn btn-primary"> Send <span class="svg-icon svg-icon-primary svg-icon-2x">
                        </button></div>
                    </form>
                
                  <a href="{{route('notification.pay',$list->user->user->id)}}" class="btn btn-primary"><i class="fa fa-bell"></i> Pay</a>
                  <a href="{{route('notification.upgrade',$list->user->user->id)}}" class="btn btn-warning"><i class="fa fa-bell"></i> Upgrade</a>
                
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
