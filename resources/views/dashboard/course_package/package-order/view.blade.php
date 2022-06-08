@extends('layouts.dashboard')

@section('content')

  @if(session()->has('success'))
    <div class="alert alert-success">
      {{session()->get('success')}}
    </div>
  @elseif(session()->has('error'))
    <div class="alert alert-danger">
      {{session()->get('error')}}
    </div>
  @endif

  <section>
    <div class="card card-custom mb-5">
      <div class="card-header">
      
      </div>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-8">
            <p><b>Package :</b> {{ $packageCourseUser->coursePackage->name }}</p>
            <p><b>User :</b> {{$packageCourseUser->profile->name}}</p>
            <p><b>Fee :</b> {{$packageCourseUser->coursePackage->fee}}</p>
            <p><b>Paid Status :</b>@if ($packageCourseUser->status==0)
                <span class="badge badge-danger">Not Paid</span>
            @else
                <span class="badge badge-success">Paid</span></p>
            @endif 
            <p class="bg-light-primary p-2 d-inline-block" style="border-radius: 6px">
              <b>Package Request Status :</b>
              <span>@if($packageCourseUser->status == 0) Pending @elseif($packageCourseUser->status == 1) Approved @elseif($packageCourseUser->status == 2) Canceled @endif</span>
            </p>
            <hr>
            <div>
              
              
          {{-- <div class="col-md-7">
            <img src="{{setImage($packageCourseUser->transaction->prove_document)}}" alt="document" class="img-fluid">
            <h6 class="mb-10 mt-4">Transaction ID : {{ $packageCourseUser->transaction->trx_id }}</h6>
            <h6 class="mb-10 mt-4">Amount : {{$packageCourseUser->transaction->amount}}</h6>
            <div>
            
            </div>
          </div> --}}

         
        </div>
      </div>
      <div class="card col-10">
        <div class="card-header">
          <h4>Package Title : {{$packageCourseUser->coursePackage->name}}</h4>
          <p>Price : {{$packageCourseUser->coursePackage->fee}}</p>
        </div>
        <div class="card-body">
          <div class="row">
            @foreach ($packageCourseUser->coursePackage->packageCourse->load('course.category') as $package)
                <div class="col-4">
                  <div class="card-header">
                    <h5>{{$package->course->title}}</h5>
                    <div class="text-center"><img src="{{setImage($package->course->instructor_image)}}" height="50px" style="border-radius: 50%" width="50px" alt=""></div>
                  </div>
                  <div class="card-body">
                    <p><i class="fa fa-user" style="color: blueviolet"></i>  {{$package->course->instructor_name}} </p>
                    <p><i class="fa fa-tags" style="color: rgb(62, 95, 218)"></i> {{$package->course->category->name}}</p>
                    <p><i class="fa fa-list" style="color: rgb(43, 226, 205)"></i>  {!!$package->course->description!!}</p>
                    <p><i class="fa fa-calendar" style="color: rgb(9, 159, 44)"></i>  {{Carbon\Carbon::parse($package->course->start_date)->format('Y-M-d')}}</p>
                    <p><i class="fa fa-calendar" style="color: rgb(176, 14, 79)"></i>  {{Carbon\Carbon::parse($package->course->end_date)->format('Y-M-d')}}</p>
                  </div>
                </div>
            @endforeach
            
          </div>
        </div>
      </div>
      {{-- <div class="col-md-4">
        @if ($packageCourseUser->status==App\Models\PackageCourseUser::PENDING)
             <a href="#" class="btn btn-success">Pending</a>
        @elseif($packageCourseUser->status==App\Models\PackageCourseUser::PAID)
         <a href="#" class="btn btn-danger">Paid</a>
        @else
             <a href="{{route('packageOrder.approve',$packageCourseUser->id)}}" class="btn btn-primary">Pending</a>
        <a href="{{route('packageOrder.cancel',$packageCourseUser->id)}}" class="btn btn-warning">Cancel</a>
        @endif
       
      </div> --}}
    </div>
  </section>
@endsection
