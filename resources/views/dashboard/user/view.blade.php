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
         
          </div>
          <div class="card-toolbar">
            @if ($user->profile)
               <a href="{{route('user.edit',$user->id)}}"><button type="submit" class="btn btn-success mr-2" form="profile_update_form">Edit Profile</button></a> 
            @elseif ($user->lawyer)
               <a href="{{route('lawyer.edit',$user->id)}}"><button type="submit" class="btn btn-success mr-2" form="profile_update_form">Edit Lawyer</button></a> 
            @elseif ($user->kazi)
               <a href="{{route('kazi.edit',$user->id)}}"><button type="submit" class="btn btn-success mr-2" form="profile_update_form">Edit Kazi</button></a> 
            @elseif ($user->agent)
               <a href="{{route('user.edit',$user->id)}}"><button type="submit" class="btn btn-success mr-2" form="profile_update_form">Edit Profile</button></a> 

          @endif
          
          
          </div>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="col-12">
                <h5 class="font-weight-bold mb-6">Basic Info</h5> 
                <div class="row">
                  <label class="col-xl-2 col-lg-2 col-form-label" for="name"> Name : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->name}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="name"> Email : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->email}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="name"> Phone : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->phone}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="name"> NID : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->nid}}</h5>
                  </div>
                  
                  
                </div>
              </div>
              @if ($user->profile)
                  
            
              <div class="col-12">
                <h5 class="font-weight-bold mb-6">Personal Info</h5> 
                <div class="row">
                    <label class="col-xl-2 col-lg-2 col-form-label" for="email">Gender : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">   
                    <h5>{{$user->profile->gender!=null ?$user->profile->gender == App\Models\Profile::MALE ? 'Male':( $user->profile->gender == App\Models\Profile::FEMALE ? 'Female' : 'Other'):'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Age : </label>
                   <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->birthdate!=null ? (Carbon\Carbon::parse($user->profile->birthdate)->age): 'N\A'}}</h5>
                  </div>
                  <label class="col-xl-2 col-lg-2 col-form-label" for="name"> Intro : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->intro!=null ? $user->profile->intro:'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Address : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->country!=null  ?($user->profile->city->name) :'N\A'}}, {{ $user->profile->country!=null ? ($user->profile->country->name) :'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Occupation : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->job!=null ?$user->profile->job->name:'N\A'}}</h5>
                  </div>
                    <label class="col-xl-2 col-lg-2 col-form-label" for="email">Relationship Status : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->relation_status!=null ?($user->profile->relation_status == App\Models\Profile::MARRIED ? 'Married': 'Unmarrired') :'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Birthplace : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->birthplace!=null ?$user->profile->birthplace:'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Education Level : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->education_level!=null ?
                        ($user->profile->education_level == 1 ?
                         'SSC' :($user->profile->education_level == 2 ?
                          'HSC' :( $user->profile->education_level == 3 ? 
                          'Bachelor' :( $user->profile->education_level == 4 ? 
                          'Master' : ($user->profile->education_level == 5 ? 
                          'Phd' :  'N\A'))))): 'N\A'}}</h5>
                  </div>
                  <label class="col-xl-2 col-lg-2 col-form-label" for="email">Salary : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->salary!=null ?$user->profile->salary:'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Ancestry : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->ancestry!=null ?$user->profile->ancestry:'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Favourite Hobby: </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->hobby!=null ?$user->profile->hobby->name:'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Political Point Of View : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->political_view!=null ?$user->profile->political_view :'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Religious Point Of View : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->religion!=null ?($user->profile->religion==App\Models\Profile::ISLAM ? 'Islam' : ($user->profile->religion==App\Models\Profile::HINDU ? 'Hindu':($user->profile->religion==App\Models\Profile::CHRISTIAN ? 'Christian' : ($user->profile->religion==App\Models\Profile::BUDDHIST ? 'Buddhist' : 'Other')))):'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Favourite Band : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->favourite_band!=null ?$user->profile->favourite_band :'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Favourite TV Show: </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->favourite_show!=null ?$user->profile->favourite_show :'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Favourite Sport : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->favourite_sport!=null ?$user->profile->favourite_sport :'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Medical History : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$user->profile->medical_history!=null ?$user->profile->medical_history :'N\A'}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="email">Education : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    @if ($user->profile->education)
                         @foreach ($user->profile->education as $education)
                         <div class="card p-3 m-3">
                             <div class="row p-3 m-3">
                              
                                 <label class="col-xl-3 col-lg-3 col-form-label" for="email">Degree : </label>
                                 <div class="col-xl-8 col-lg-6 col-form-label text-left">
                                    <h5>{{$education->degree}}</h5>
                                  </div>
                                  <label class="col-xl-3 col-lg-3 col-form-label" for="email">Institute : </label>
                                 <div class="col-xl-8 col-lg-6 col-form-label text-left">
                                    <h5>{{$education->institute_name}}</h5>
                                  </div>
                                  <label class="col-xl-3 col-lg-3 col-form-label" for="email">Duration : </label>
                                 <div class="col-xl-8 col-lg-6 col-form-label text-left">
                                    <h5>{{$education->year_started}} to {{$education->year_ended}}</h5>
                                  </div>
                                  <label class="col-xl-3 col-lg-3 col-form-label" for="email">Description : </label>
                                 <div class="col-xl-8 col-lg-6 col-form-label text-left">
                                    <h5>{{$education->description}}</h5>
                                  </div>
                                <label class="col-xl-3 col-lg-3 col-form-label" for="email">Certificate : </label>
                                <div class="col-5"><img src="  {{ setImage(($education->education_certificate!=null ? $education->education_certificate : null) ) }}" class="img-thumbnail" alt=""></div>
                             </div>
                             </div>
                         @endforeach
                    @endif
                  </div>
                </div>
              </div>
              @else
              <h3>User Profile Not Available!!</h3>
                @endif
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
