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

        <form class="form" action="{{ route('lawyer.update',$user->lawyer->id) }}" id="profile_update_form" method="post" enctype="multipart/form-data">
          @csrf
        
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
