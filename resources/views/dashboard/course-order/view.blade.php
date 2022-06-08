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
          <h3 class="card-label">Order Number : {{ $courseOrder->id }}</h3>
        </div>
        <div class="card-toolbar">
          @canany(['admin', 'order.all', 'order.edit'])
            <form action="{{ route('changeCourseOrderStatus', $courseOrder->id) }}" method="post">
              @csrf
              <div class="form-group d-flex align-items-center">
                <label for="order_status" class="text-nowrap mr-2">Order Status</label>
                <select class="form-control" name="order_status" id="order_status" onchange="this.form.submit()">
                  <option value="0" {{ $courseOrder->status == '0' ? 'selected' : null }}>Processing</option>
                  <option value="1" {{ $courseOrder->status == '1' ? 'selected' : null }}>Delivered</option>
                  <option value="2" {{ $courseOrder->status == '2' ? 'selected' : null }}>Canceled</option>
                </select>
                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </form>
          @endcanany
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-9">
            @if($courseOrder->Course->hasMedia('instructor_image'))
              <img src="{{ $courseOrder->Course->getFirstMediaUrl('instructor_image') }}" alt="document" class="w-100px">
            @endif
            <p class="mt-4"><b>Instructor Name :</b> {{ $courseOrder->Course->instructor_name }}</p>
            <p class="mb-10"><b>Instructor Designation :</b> {{ $courseOrder->Course->instructor_designation }}</p>

              <h3>Course Description</h3>
              <hr>
            <h4 class="mb-10 mt-4">{{ $courseOrder->Course->title }}</h4>
            <div>
              {!! nl2br($courseOrder->Course->description) !!}
            </div>
          </div>

          <div class="col-md-3">
            <p><b>Price :</b> {{ $courseOrder->price }}$</p>
            <p><b>Paid Status :</b> @if($courseOrder->paid_status) <span class="badge badge-success">Paid</span> @else <span class="badge badge-danger">Unpaid</span> @endif</p>
            <p class="bg-light-primary p-2 d-inline-block" style="border-radius: 6px">
              <b>Order Status :</b>
              <span>@if($courseOrder->status == 0) Processing @elseif($courseOrder->status == 1) Delivered @elseif($courseOrder->status == 2) Canceled @endif</span>
            </p>
            <hr>
            <div>
              <div class="form-group">
                {{-- <p><b>Account Type : </b> {{ $courseOrder->account_type }}</p> --}}
                <p><b>Amount : </b> {{ $courseOrder->transaction->amount }}</p>
                <p><b>Prove Document : </b> <img src="{{ setImage($courseOrder->transaction->prove_document) }}" width="200px" height="200px" alt=""></p>
                <p><b>Transaction Id : </b> {{ $courseOrder->transaction->trx_id }}</p>
              </div>
              @if($courseOrder->paid_status == 0)
                <div class="form-group d-flex align-items-center">
                  <b>Payment Verified : &nbsp;</b>
                  <div>
                    <form action="#" method="post">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="order_for" value="course_order">
                      <span class="switch switch-icon">
                        <label>
                          <input type="checkbox" value="1" name="status" onchange="this.form.submit()"/>
                          <span></span>
                        </label>
                      </span>
                    </form>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
