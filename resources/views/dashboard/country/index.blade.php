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
        <h3 class="card-label">Country List</h3>
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
 Add New
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
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($countries as $country)
              <tr>
                <td>{{ $loop->iteration + $countries->firstItem() - 1 }}</td>
                <td>{{$country->name}}</td>
              
                <td nowrap="nowrap">
                  <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
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
                  <form method="post" action="#" class="d-inline-block">
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
                  <a href="{{route('country.show',$country->id)}}" class="btn btn-icon btn-light btn-hover-success btn-sm mx-3">

                     <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 20.74C12.9039 20.7541 12.8062 20.7541 12.71 20.74C12.5724 20.6823 12.4551 20.5849 12.3732 20.4602C12.2912 20.3355 12.2484 20.1892 12.25 20.04V16.7H3.00001C2.81189 16.6956 2.63208 16.6216 2.49538 16.4923C2.35868 16.363 2.27481 16.1876 2.26001 16V8.00002C2.25463 7.89856 2.26965 7.79706 2.30417 7.7015C2.3387 7.60595 2.39204 7.51829 2.46103 7.44371C2.53002 7.36913 2.61326 7.30913 2.70584 7.26727C2.79841 7.22542 2.89844 7.20255 3.00001 7.20002H12.25V4.01002C12.2498 3.86106 12.2946 3.71551 12.3784 3.59241C12.4623 3.4693 12.5813 3.37436 12.72 3.32002C12.8551 3.26039 13.0053 3.24376 13.1502 3.27238C13.2951 3.301 13.4277 3.37349 13.53 3.48002L21.53 11.48C21.6705 11.6206 21.7493 11.8113 21.7493 12.01C21.7493 12.2088 21.6705 12.3994 21.53 12.54L13.53 20.54C13.4601 20.6079 13.377 20.6608 13.2858 20.6952C13.1946 20.7296 13.0973 20.7448 13 20.74ZM3.76001 15.2H13C13.1981 15.2026 13.3874 15.2825 13.5275 15.4226C13.6676 15.5626 13.7474 15.7519 13.75 15.95V18.18L19.93 12L13.75 5.83002V8.00002C13.7477 8.19843 13.6689 8.3883 13.53 8.53002C13.3817 8.65257 13.1919 8.71343 13 8.70002H3.76001V15.2Z" fill="#3699FF"/>
                        </svg>
                     
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $countries->links() }}
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('country.store')}}" method="POST">
              @csrf
       <div class="form-group">
           <label for="name">Country Name</label>
           <input type="text" name="name" class="form-control">
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
