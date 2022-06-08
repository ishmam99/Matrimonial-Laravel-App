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
            <p><b>Package :</b> {{ $userPackage->package->name }}</p>
            <p><b>User :</b> {{$userPackage->profile->name}}</p>
            <p><b>Fee :</b> {{$userPackage->package->fee}}</p>
            <p><b>Paid Status :</b> <span class="badge badge-success">Paid</span></p>
            <p class="bg-light-primary p-2 d-inline-block" style="border-radius: 6px">
              <b>Package Request Status :</b>
              <span>@if($userPackage->status == 0) Pending @elseif($userPackage->status == 1) Approved @elseif($userPackage->status == 2) Canceled @endif</span>
            </p>
            <hr>
            <div>
              
              
          <div class="col-md-7">
            <img src="{{setImage($userPackage->transaction->prove_document)}}" alt="document" class="img-fluid">
            <h6 class="mb-10 mt-4">Transaction ID : {{ $userPackage->transaction->trx_id }}</h6>
            <h6 class="mb-10 mt-4">Amount : {{$userPackage->transaction->amount}}</h6>
            <div>
            
            </div>
          </div>

         
        </div>
      </div>
      <div class="col-md-4">
        @if ($userPackage->status==App\Models\UserPackage::APPROVED)
             <a href="#" class="btn btn-success">Approved</a>
        @elseif($userPackage->status==App\Models\UserPackage::CANCELLED)
         <a href="#" class="btn btn-danger">Cancelled</a>
        @else
             <a href="{{route('packageOrder.approve',$userPackage->id)}}" class="btn btn-primary">Pending</a>
        <a href="{{route('packageOrder.cancel',$userPackage->id)}}" class="btn btn-warning">Cancel</a>
        @endif
       
      </div>
    </div>
  </section>
@endsection
