@extends('layouts.dashboard')

@section('content')

  <div class="d-flex flex-row">
   

    <div class="flex-row-fluid ml-lg-8">
      <div class="card card-custom card-stretch">
        <div class="card-header py-3">
          <div class="card-title align-items-start flex-column">
            <h3 class="card-label font-weight-bolder text-dark">Create New Lawyer</h3>
            <span class="text-muted font-weight-bold font-size-sm mt-1">Insert Lawyer personal information</span>
          </div>
        
        </div>

        <div class="px-8 mt-2">
           @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        </div>

        <form class="form" action="{{ route('user.store') }}" id="profile_create_form" method="post" enctype="multipart/form-data">
          @csrf
         
            
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <h5 class="font-weight-bold mb-6">Lawyer Info</h5>
              </div>
            </div>
           
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="name">First Name</label>
              <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid" placeholder="Name" type="text" id="name" name="name" >
              </div>
            </div>
          
          
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="email">Email Address</label>
              <div class="col-lg-9 col-xl-6">
                  <input type="email" class="form-control form-control-lg form-control-solid" id="email" name="email" placeholder="Email">
              </div>
            </div>
             <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">Phone</label>
              <div class="col-lg-9 col-xl-6">
                  <input type="phone" class="form-control form-control-lg form-control-solid" id="phone" name="phone" placeholder="Phone">
              </div>
            </div>
            
             
             <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">NID</label>
              <div class="col-lg-9 col-xl-6">
                  <input type="nid" class="form-control form-control-lg form-control-solid" id="nid" name="nid" placeholder="NID">
              </div>
            </div>
             <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">Lawyer Category</label>
              <div class="col-lg-9 col-xl-6">
                <select class="form-control form-control-lg form-control-solid" name="category">
                  @foreach (App\Models\LawyerCategory::all() as $cat)
                       <option id="6" value="{{$cat->id}}">{{$cat->name}} </option>
                  @endforeach
                 
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">User Role</label>
              <div class="col-lg-9 col-xl-6">
                <select class="form-control form-control-lg form-control-solid" name="user_role">
               
                 {{-- <option id="1" value="{{App\Models\User::CLIENT}}">Client</option> --}}
                  <option id="2" value="{{App\Models\User::LAWYER}}">Lawyer </option>
                  {{-- <option id="3" value="{{App\Models\User::KAZI}}">Kazi </option> --}}
                  {{-- <option id="4" value="{{App\Models\User::EMPLOYEE}}">Employee </option> --}}
                  {{-- <option id="5" value="{{App\Models\User::SPONSOR}}">Sponsor </option> --}}
                  {{-- <option id="6" value="{{App\Models\User::AGENT}}">Agent </option> --}}
                </select>
              </div>
            </div>
            <div class="form-group row float-right p-10">
            <button type="submit" class="btn btn-success mr-2" form="profile_create_form">Save Changes</button>
            <button type="reset" class="btn btn-secondary" form="profile_create_form">Cancel</button>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script src="{{ asset('assets/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
  <script>
    let avatar5 = new KTImageInput('user_image');
     let avatar4 = new KTImageInput('user_image');
  </script>
@endpush
