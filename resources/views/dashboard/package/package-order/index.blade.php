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
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($lists as $list)
              <tr>
                <td>{{ $loop->iteration + $lists->firstItem()-1}}</td>
                <td>{{ $list->created_at->format('F d, Y') }}</td>
                <td>{{ $list->package->name }} </td>
                 <td>{{ $list->profile->name }} </td>
                <td>
                    <span class="badge badge-warning">Pending</span>
                  
                </td>
                
                <td nowrap="nowrap">
                
                    <a href="{{ route('packageOrder', $list->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                      <span class="svg-icon svg-icon-primary svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.5"/>
                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.8"/>
                          </g>
                        </svg>
                      </span>
                    </a>
                
                 
                
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $lists->links() }}
    </div>
  </div>

@endsection
