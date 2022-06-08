@extends('layouts.dashboard')

@section('content')

  <div class="d-flex flex-row">
    <!--begin::Aside-->
   @include('dashboard.user.aside')
    <!--end::Aside-->

    <div class="flex-row-fluid ml-lg-8">
      <div class="card card-custom card-stretch">
        <div class="card-header py-3">
          <div class="card-title align-items-start flex-column">
            <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
            <span class="text-muted font-weight-bold font-size-sm mt-1">Update User personal information</span>
          </div>
          <div class="card-toolbar">
            <button type="submit" class="btn btn-success mr-2" form="profile_update_form">Save Changes</button>
            <button type="reset" class="btn btn-secondary" form="profile_update_form">Cancel</button>
          </div>
        </div>

        <div class="px-8 mt-2">
          @if ($errors->updateProfileInformation->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->updateProfileInformation->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>

        <form class="form" action="{{ route('user.profileUpdate',$user->profile->id) }}" id="profile_update_form" method="post" enctype="multipart/form-data">
          @csrf
        
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <h5 class="font-weight-bold mb-6">User Info</h5>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label">Profile Photo</label>
              <div class="col-lg-9 col-xl-6">
                <div class="image-input image-input-outline image-input-circle" id="kt_image_4">
                  <div class="image-input-wrapper" style="width: 120px; background-position: center; background-image: url({{ setImage($user->profile->profile_photo, 'user') }})"></div>
                  <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" name="profile_photo" accept=".png, .jpg, .jpeg"/>
                    <input type="hidden" name="photo_remove"/>
                  </label>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
                </div>
                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label">Cover Photo</label>
              <div class="col-lg-9 col-xl-6">
                <div class="image-input image-input-outline " id="kt_image_5">
                  <div class="image-input-wrapper" style="width: 520px; height:200px; background-position: center; background-image: url('{{ setImage($user->profile->cover_photo, 'user') }}')"></div>
                  <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" name="cover_photo" accept=".png, .jpg, .jpeg"/>
                    <input type="hidden" name="photo_remove"/>
                  </label>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
                  <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
                </div>
                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="name">Name</label>
              <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid" type="text" id="name" name="name" value="{{ old('name', $user->profile->name) }}">
              </div>
            </div>
           
            <div class="row">
              <div class="col-12">
                <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">Phone</label>
              <div class="col-lg-9 col-xl-6">
                  <input type="text" class="form-control form-control-lg form-control-solid" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Phone">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="email">Email Address</label>
              <div class="col-lg-9 col-xl-6">
                  <input type="email" class="form-control form-control-lg form-control-solid" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email">
              </div>
            </div>
            
            
              <div class="row">
              <div class="col-12">
                <h5 class="font-weight-bold mt-10 mb-6">Personal Info</h5>
              </div>
            </div>
             <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="gender">Gender</label>
              <div class="col-lg-9 col-xl-6">
                <select class="form-control form-control-lg form-control-solid" name="gender">
               
                 <option id="1" value="1"  <?php if ($user->profile->gender==1) {
                            echo "Selected"; } ?>>Male</option>
                  <option id="2" value="2"  <?php if ($user->profile->gender==2) {
                            echo "Selected"; } ?>>Female </option>
                  <option id="3" value="3"  <?php if ($user->profile->gender==3) {
                            echo "Selected"; } ?>>Other </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">Religion</label>
              <div class="col-lg-9 col-xl-6">
                <select class="form-control form-control-lg form-control-solid" name="religion">
               
                 <option id="1" value="1"  <?php if ($user->profile->religion==App\Models\Profile::ISLAM) {
                            echo "Selected"; } ?>>Muslim</option>
                  <option id="2" value="2"  <?php if ($user->profile->religion==App\Models\Profile::HINDU) {
                            echo "Selected"; } ?>>Hindu </option>
                  <option id="3" value="3"  <?php if ($user->profile->religion==App\Models\Profile::BUDDHIST) {
                            echo "Selected"; } ?>>Buddhist </option>
                  <option id="3" value="3"  <?php if ($user->profile->religion==App\Models\Profile::CHRISTIAN) {
                            echo "Selected"; } ?>>Christian </option>
                  <option id="3" value="3"  <?php if ($user->profile->religion==App\Models\Profile::OTHER) {
                            echo "Selected"; } ?>>Other </option>
                </select>
              </div>
            </div>
               <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">Marital </label>
              <div class="col-lg-9 col-xl-6">
                <select class="form-control form-control-lg form-control-solid" name="relation_status">
               
                 <option id="1" value="1"  <?php if ($user->profile->relation_status==App\Models\Profile::MARRIED) {
                            echo "Selected"; } ?>>Married</option>
                  <option id="2" value="2"  <?php if ($user->profile->relation_status==App\Models\Profile::UNMARRIED) {
                            echo "Selected"; } ?>>Unmarried </option>
                 
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">Country </label>
              <div class="col-lg-9 col-xl-6">
                <select class="form-control form-control-lg form-control-solid" name="country_id">
               @foreach (App\Models\Country::all() as $item)
                   
              
                 <option value="{{$item->id}}"<?php if ($user->profile->country_id==$item->id) {
                            echo "Selected"; } ?> >{{$item->name}}</option>
                @endforeach
                 
                </select>
              </div>
            </div>
             <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">City </label>
              <div class="col-lg-9 col-xl-6">
                <select class="form-control form-control-lg form-control-solid" name="city_id">
               @foreach (App\Models\City::all() as $city)
                   
              
                 <option value="{{$city->id}}"  <?php if($user->profile->city!=null && $user->profile->city->name==$city->name) {
                            echo "Selected"; } ?>>{{$city->name}}</option>
                @endforeach
                 
                </select>
              </div>
            </div>
            
             {{-- <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">Account Type</label>
               <div class="col-lg-9 col-xl-6">
                <select class="form-control form-control-lg form-control-solid" name="profile_type">
               
                 <option id="1" value="2"  <?php if ($user->profile_type==App\Models\Profile::REGUALR) {
                            echo "Selected"; } ?>>Regualr</option>
                  <option id="2" value="1"  <?php if ($user->profile_type==App\Models\Profile::PREMIUM) {
                            echo "Selected"; } ?>>Premium </option>
                 
                </select>
              </div>
            </div> --}}
             <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label" for="phone">NID</label>
              <div class="col-lg-9 col-xl-6">
                  <input type="nid" class="form-control form-control-lg form-control-solid" id="nid" name="nid" value="{{ old('nid', $user->nid) }}" placeholder="NID">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script>
      $(document).ready(function(){
        $('select[name="country_id"]').on('change',function(){
          var country_id = $(this).val();
          if(country_id)
          {
            $.ajax({
              url:"{{url('dashboard/getCity/')}}/"+country_id,
              type:"GET",
              dataType:"json",
              success:function(data){
                var d=$('select[name="city_id"]').empty();
                $.each(data, function(key, value){
                  $('select[name="city_id"]').append('<option value="'+value.id+'">'+value.name+'</option>');
                });
              },
            });
          }else{
            alert('danger');
          }
        });
      });
    </script>
@push('script')
  <script src="{{ asset('assets/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
  <script>
    let avatar5 = new KTImageInput('user_image');
     let avatar4 = new KTImageInput('user_image');
  </script>
@endpush
