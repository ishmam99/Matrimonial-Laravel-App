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
      <div class="card-toolbar">
         
            <form action="{{ route('professional-package.orderStatus', $order->id) }}" method="POST">
              @csrf
              <div class="form-group d-flex align-items-center">
                <label for="order_status" class="text-nowrap mr-2">Order Status</label>
                <select class="form-control" name="status" id="status" >
                  <option value="0" {{ $order->status == '0' ? 'selected' : null }}>Processing</option>
                  <option value="1" {{ $order->status == '1' ? 'selected' : null }}>Payment Received</option>
                  <option value="2" {{ $order->status == '2' ? 'selected' : null }}>Delivered</option>
                  <option value="2" {{ $order->status == '3' ? 'selected' : null }}>Rejected</option>
                </select>
                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </form>
        
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-8">
            <p><b>Package :</b> {{ $order->professionalPackage->name }}</p>
            <p><b>User :</b> {{$order->profile->name}}</p>
            <p><b>Fee :</b> {{$order->professionalPackage->price}}</p>
            <p><b>Discount :</b> {{$order->professionalPackage->discount}}%</p>
            <p><b>Paid Status :</b>@if ($order->status==1)
                <span class="badge badge-primary">Paid</span>
            @elseif($order->status==2)
                <span class="badge badge-success">Delivered</span>
                @elseif($order->status==3)
                <span class="badge badge-danger">Rejected</span>
                @else
                <span class="badge badge-warning">Pending</span>
            @endif </p>
            <p class="bg-light-primary p-2 d-inline-block" style="border-radius: 6px">
              <b>Package Request Status :</b>
              <span>@if($order->status == 0) Pending @elseif($order->status == 1) Payment Done @elseif($order->status == 2) Delivered @else Rejected @endif</span>
            </p>
            <hr>
            <div>
              
              
          {{-- <div class="col-md-7">
            <img src="{{setImage($order->transaction->prove_document)}}" alt="document" class="img-fluid">
            <h6 class="mb-10 mt-4">Transaction ID : {{ $order->transaction->trx_id }}</h6>
            <h6 class="mb-10 mt-4">Amount : {{$order->transaction->amount}}</h6>
            <div>
            
            </div>
          </div> --}}

         
        </div>
      </div>
      <div class="col-4">
        @foreach ($order->professionalPackage->services as $service)
            <div class="card p-2 m-3">
              <h5>Service Name : {{$service->name}}</h5>
              <p>Service Details : {{$service->services}}</p>
            </div>
        @endforeach
      </div>
      {{-- <div class="col-md-4">
        @if ($order->status==App\Models\order::APPROVED)
             <a href="#" class="btn btn-success">Approved</a>
        @elseif($order->status==App\Models\order::CANCELLED)
         <a href="#" class="btn btn-danger">Cancelled</a>
        @else
             <a href="{{route('packageOrder.approve',$order->id)}}" class="btn btn-primary">Pending</a>
        <a href="{{route('packageOrder.cancel',$order->id)}}" class="btn btn-warning">Cancel</a>
        @endif
       
      </div> --}}
    </div>
  </section>
@endsection
