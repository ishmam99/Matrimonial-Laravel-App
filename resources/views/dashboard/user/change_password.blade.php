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
            <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
            <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
          </div>
          <div class="card-toolbar">
            <button type="submit" class="btn btn-success mr-2" form="profile_update_form">Save Changes</button>
            <button type="reset" class="btn btn-secondary" form="profile_update_form">Cancel</button>
          </div>
        </div>

        <div class="px-8 mt-2">
          @if ($errors->updatePassword->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->updatePassword->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>

        <form class="form" action="{{ route('user-password.update',$user->id) }}" id="profile_update_form" method="post">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label text-alert" for="current_password">Current Password</label>
              <div class="col-lg-9 col-xl-6">
                <input type="password" class="form-control form-control-lg form-control-solid mb-2" value="" id="current_password" name="current_password" placeholder="Current password">
{{--                <a href="#" class="text-sm font-weight-bold">Forgot password ?</a>--}}
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label text-alert" for="password">New Password</label>
              <div class="col-lg-9 col-xl-6">
                <input type="password" class="form-control form-control-lg form-control-solid" value="" id="password" name="password" placeholder="New password">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-xl-3 col-lg-3 col-form-label text-alert" for="password_confirmation">Confirm Password</label>
              <div class="col-lg-9 col-xl-6">
                <input type="password" class="form-control form-control-lg form-control-solid" value="" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
              </div>
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
  </script>
@endpush
