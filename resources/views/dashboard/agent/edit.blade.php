@extends('layouts.dashboard')

@section('content')

   <div class="card card-custom card-sticky" id="kt_page_sticky_card">
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{session()->get('success')}}
      </div>
    @elseif(session()->has('error'))
      <div class="alert alert-danger">
        {{session()->get('error')}}
      </div>
    @endif
    <!--begin::Aside-->
   {{-- @include('dashboard.user.aside') --}}
    <!--end::Aside-->

    <div class="flex-row-fluid ml-lg-8">
      <div class="card card-custom card-stretch">
        <div class="card-header py-3">
          <div class="card-title align-items-start flex-column">
            <h3 class="card-label font-weight-bolder text-dark">Agent Information</h3>
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
        <form class="form p-5" action="{{ route('agent.update',$agent->id) }}" id="profile_update_form" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
           <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label">Profile Photo</label>
              <div class="col-lg-9 col-xl-6">
                <div class="image-input image-input-outline image-input-circle" id="kt_image_4">
                  <div class="image-input-wrapper" style="width: 120px; background-position: center; background-image: url({{ setImage($agent->profile_photo, 'user') }})"></div>
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
              <div class="col-4">
                 <label for="name" class="form-control">Name</label>
              </div>
             <div class="col-8">
              <input type="text" name="name" class="form-control" value="{{$agent->name}}">
            </div>
            </div>
             <div class="form-group row">
              <div class="col-4">
                 <label for="email"  class="form-control">Email</label>
              </div>
             <div class="col-8">
              <input type="email" name="email" class="form-control" value="{{$agent->email}}">
            </div>
            </div>
             <div class="form-group row">
              <div class="col-4">
                 <label for="phone" class="form-control">Phone</label>
              </div>
             <div class="col-8">
              <input type="text" name="phone" class="form-control" value="{{$agent->phone}}">
            </div>
            </div>
            <div class="form-group row">
              <div class="col-4">
                 <label for="fee" class="form-control">Fee</label>
              </div>
             <div class="col-8">
              <input type="text" name="fee" class="form-control" value="{{$agent->fee}}">
            </div>
            </div>
        </form>
      </div>
     <div class="col-4">

        <form action="{{route('agent.addBadge',$agent->id)}}" method="POST">
        @csrf
        <div class="card ">
          <label for="badge_id">Badge</label>
         @if ($agent->badge==null)
              <p class="text-danger">No Active Badge</p>
          @endif  
          <img src="{{setImage($agent->badge!=null? $agent->badge->badge->badge_image:'')}}" height="50px" width="50px" alt="">
         <select name="badge_id" id="badge_id" class="form-control">
            
            @foreach (App\Models\Badge::all() as $badge)
                <option value="{{ $badge->id}}" {{ $badge->id==$agent->badge?->badge->id ? 'selected' : null }}>{{ $badge->name }}</option>
            @endforeach
          </select>
          <button type="submit" class="btn btn-success ">Add Badge</button>
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
