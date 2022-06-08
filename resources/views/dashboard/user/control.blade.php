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
            <h3 class="card-label font-weight-bolder text-dark">User Control Panel</h3>
            <span class="text-muted font-weight-bold font-size-sm mt-1">Update User Control</span>
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

     
        
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <h5 class="font-weight-bold mb-6">Priority User </h5>
                
              </div>
            </div>
             <div class="form-group row">
               <form class="row"  action="{{route('user.priority',$user->profile->id)}}"id="priority_form" method="post" >
                @csrf
              <label class="col-xl-4 col-lg-4 col-form-label" for="first_name">Priority User Days remaining</label>
              <div class="col-lg-4 col-xl-4">
                <input class="form-control form-control-lg form-control-solid" required type="text" value="{{$user->profile->priority==null ? '0' :Carbon\Carbon::parse($user->profile->priority->days)->format('d') - Carbon\Carbon::now()->format('d')}}" id="day" name="day" placeholder="Days"> 
              </div>
              <div class="col-lg-4 align-">
                <button type="submit" class="btn btn-success mr-2" form="priority_form">Save Changes</button>
              </div>
            </form>
             
            
            </div>
            <div class="row">
              <div class="col-3">
                <h5 class="font-weight-bold mb-6">User Status</h5>
            </div> 
             <div class="col-9">
              <a href="{{route('user.status',['id'=>$user->profile->id,'status'=>App\Models\Profile::RESTRICTED])}}">
                <button class="btn  @if($user->profile->profile_type==App\Models\Profile::RESTRICTED) 
                   btn-danger @else btn-light @endif
                ">Restricted</button></a> 
                <a href="{{route('user.status',['id'=>$user->profile->id,'status'=>App\Models\Profile::SUSPENDED])}}">
                <button class="btn  @if($user->profile->profile_type==App\Models\Profile::SUSPENDED) 
                   btn-warning @else btn-light @endif
                ">Suspended</button></a>
                 <a href="{{route('user.status',['id'=>$user->profile->id,'status'=>App\Models\Profile::ACTIVE])}}">
                <button class="btn  @if($user->profile->profile_type==App\Models\Profile::ACTIVE) 
                   btn-primary @else btn-light @endif
                ">Active</button></a>
               <button class="btn  @if($user->profile->priority!=null && Carbon\Carbon::parse($user->profile->priority->days)> Carbon\Carbon::now()) 
                   btn-success @else btn-light @endif
                " type="button" >Priority</button>
            
              </div>
            </div>
             <div class="row">
              <div class="col-3">
                <h5 class="font-weight-bold mb-6">User Badge</h5>
            </div> 
             <div class="col-9 p-5">
             @if ($user->profile->badgeUser)
                 <h5>{{$user->profile->badgeUser->badge->name}}</h5>
                 <img src="{{setImage($user->profile->badgeUser->badge->badge_image)}}" width="50px" alt="">                     
             @else
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Badge</button> 
              
             @endif
            
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label">Cover Photo</label>
              <div class="col-lg-9 col-xl-6">
                <div class="image-input image-input-outline " id="kt_image_5">
                  <div class="image-input-wrapper" style="width: 520px; height:200px; background-position: center; background-image: url({{ setImage($user->cover_photo, 'user') }})"></div>
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
            <h3 class="font-weight-bold mb-6">User Plan's</h3>
            <div class="card p-2">
             <div class="row">
           
              
              
              <div class="col-lg-8 col-xl-6">
                <h6 class="font-weight-bold ">Current Package : {{$user->profile->package ? $user->profile->package->name : "No active Package"}}</h6>
              </div>
              <div class="col-12 mb-2">
                <div class="row">
                    <div class="col-lg-3">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#packageModal">Add/Update  Membership Package</button> 
              </div>
              <div class="col-lg-3">
                  <a href="{{route('notification.pay',$user->id)}}"><button class="btn btn-warning">Send Notification to Pay</button></a>
              </div>
              <div class="col-lg-3">
              <a href="{{route('notification.upgrade',$user->id)}}"><button class="btn btn-danger">Send Notification to Upgrade</button></a></div>
                </div>
              </div>
            
               
              <div class="col-lg-10">
              <form action="{{route('notification.custom',$user->id)}}" method="POST">
                @csrf
                <div class="col-8">
                  <label for="message" class="form-control">Notification</label>
                  <textarea type="text" class="form-control" name="details" > </textarea>
                  <label for="url" class="form-control" >URL</label>
                  <input type="text" class="form-control" name="url" id="">
                </div>
              <div class="col-4">
                <button type="submit" class="btn btn-success">Send Notification</button>
              </div>
              </form>
              </div>
             
            </div>
          </div>
          </div>
       
      </div>
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
          <form action="{{route('badge-user',$user->profile->id)}}" method="POST">
              @csrf
             
       <div class="form-group">
           <label for="name">Badge Name</label>
          <select name="badge_id"class="form-control" id="badge_id">
            @foreach (App\Models\Badge::where('status',true)->get() as $item)
                <option value="{{$item->id}}">{{$item->name}} </option>
            @endforeach
          </select>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div></form>
    </div>
  </div>
</div>
<div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add/Upgrade Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{route('user.package',$user->profile->id)}}" method="POST">
              @csrf
             
       <div class="form-group">
           <label for="name">Package Name</label>
          <select name="package_id"class="form-control" id="package_id">
            @foreach (App\Models\Package::where('status',0)->get() as $item)
                <option value="{{$item->id}}">{{$item->name}} </option>
            @endforeach
          </select>
        
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
 
@push('script')
  <script src="{{ asset('assets/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
  <script>
    let avatar5 = new KTImageInput('user_image');
     let avatar4 = new KTImageInput('user_image');
  </script>
@endpush
