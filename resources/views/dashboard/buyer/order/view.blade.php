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
        <div class="card-title">
          <h3 class="card-label">Order Number : {{ $order->id }}</h3>
        </div>
        <div class="card-toolbar">
          @canany(['admin', 'order.all', 'order.edit'])
            <form action="{{ route('order.status', $order->id) }}" method="post">
              @csrf
              <div class="form-group d-flex align-items-center">
                <label for="order_status" class="text-nowrap mr-2">Order Status</label>
                <select class="form-control" name="order_status" id="order_status" onchange="this.form.submit()">
                  <option value="0" {{ $order->status == '0' ? 'selected' : null }}>Processing</option>
                  <option value="1" {{ $order->status == '1' ? 'selected' : null }}>Delivered</option>
                  <option value="2" {{ $order->status == '2' ? 'selected' : null }}>Canceled</option>
                </select>
              </div>
            </form>
          @endcanany
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-5">
            <p><b>Price :</b> {{ $order->amount }}$</p>
            <p><b>Product :</b> {{$order->product->title}}</p>
            <p><b>Quantity :</b> {{$order->quantity}}</p>
            <p><b>Paid Status :</b> @if($order->paid_status) <span class="badge badge-success">Paid</span> @else <span class="badge badge-danger">Unpaid</span> @endif</p>
            <p class="bg-light-primary p-2 d-inline-block" style="border-radius: 6px">
              <b>Order Status :</b>
              <span>@if($order->status == 0) Processing @elseif($order->status == 1) Delivered @elseif($order->status == 2) Canceled @endif</span>
            </p>
            <hr>
            <div>
              <div class="form-group">
                <p><b>Transaction Type : </b>  <p class="bg-light-primary p-2 d-inline-block" style="border-radius: 6px">{{ $order->delivery_type==App\Models\Order::ONLINE ? 'Online Payment' : 'Conditional' }}</p></p>
                <p><b>Amount : </b> {{ $order->amount }}</p>
                <p><b>Client Name : </b> {{ $order->consumer->name }}</p>
                <p><b>Transaction Id : </b> {{ $order->bkash_transaction_id }}</p>
              </div>
              @if($order->paid_status ==App\Models\Order::UNPAID )
                <div class="form-group d-flex align-items-center">
                  <b>Payment Verified : &nbsp;</b>
                  <div>
                    <form action="{{ route('order.payment', $order->id) }}" method="post">
                      @csrf
                     
                      <input type="hidden" name="order_for" value="product_order">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" value="1" name="paid_status" onchange="this.form.submit()"/>
                          <span></span>
                        </label>
                      </span>
                    </form>
                  </div>
                </div>
              @endif
            </div>
          </div>
          @if ($order->transaction)
              
          <div class="col-md-7">
            <img src="{{setImage($order->transaction->prove_document)}}" alt="document" class="img-fluid">
            <h6 class="mb-10 mt-4">Transaction ID : {{ $order->transaction->trx_id }}</h6>
            <h6 class="mb-10 mt-4">Amount : {{$order->transaction->amount}}</h6>
            <div>
            
            </div>
          </div>

          @endif
        </div>
      </div>
    </div>
  </section>
@endsection
