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
@php
 $disabled = null;
if($order->status==0)
    {$btn='primary';
   
  }
elseif ($order->status==1) 
  $btn='warning';
elseif ($order->status==2) {
  $disabled = 'disabled'; 
  $btn='success';
}
 
elseif ($order->status==3) 
  $btn='danger';

@endphp
  <section>
    <div class="card card-custom mb-5">
      <div class="card-header">
      <form action="{{route('shopPackage.order-status',$order->id)}}" method="POST">
        @csrf
        <select name="status" id="status" class="btn btn-{{$btn}}"  {{$disabled}}>
          <option value="0" class="btn btn-primary" {{$order->status==0?'selected':''}}>Order Placed</option>
           <option value="1" class="btn btn-warning" {{$order->status==1?'selected':''}}>Processing</option>
           <option value="2" class="btn btn-success" {{$order->status==2?'selected':''}}>Delivered</option>
           <option value="3" class="btn btn-danger" {{$order->status==3?'selected':''}}>Cancelled</option>
          
        </select>
        <button type="submit" class="btn btn-secondary">Save</button>
      </form>
      </div>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-4">
            <p><b>Package :</b> {{ $order->shopPackage->name }}</p>
            <p><b>User :</b> {{$order->profile->name}}</p>
            <p><b>Price :</b> {{$order->shopPackage->price}}</p>
            <p><b>Quantity :</b> {{$order->quantity}}</p>
            <p><b>Order Status :</b> @if ($order->status==0)
                      <span class="badge badge-primary">Order Placed</span>
            @elseif ($order->status==1)
                <span class="badge badge-warning">Processing</span>
            @elseif ($order->status==2)
                <span class="badge badge-success">Delivered</span>
            @else <span class="badge badge-danger">Cancelled</span></p>
            @endif
           
            
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
      <div class="col-8">
        <div class="row">
          @foreach ($order->shopPackage->packageProduct as $item)
              
               <div class="card col-3" style="background-color: rgb(177, 255, 246)">
                    <div class="card-header text-center">
                    <h4>{{$item->product->title}}</h4>
                  </div>
                  <div class="card-body ">
                    <div class="text-center">
                    <img src="{{setImage($item->product->image_one)}}" height="50px" width="50px" alt="">
                    <p>Price : {{$item->product->price}}$</p>
                    <p>Stock :{{$item->product->stock}}</p>
                   </div> <hr>
                   <p>Details <br>{!!$item->product->content!!}</p>
                    
                  </div>
                  </div>
          @endforeach
         
        </div>
      </div>
      
    </div>
  </section>
@endsection
