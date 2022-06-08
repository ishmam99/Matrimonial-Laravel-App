@extends('layouts.dashboard')

@section('content')

  <div class="card card-custom">
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{session()->get('success')}}
      </div>
    @elseif(session()->has('error'))
      <div class="alert alert-danger">
        {{session()->get('error')}}
      </div>
    @endif
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
      <div class="card-title">
        <h3 class="card-label">Ongoing Orders List</h3>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('order.index') }}" method="get">
      <div class="row">
        <div class="col-md-3">
            <div class="form-group">
              <label for="order_filter">Order Filter</label>
              <select name="order_filter" id="order_filter" class="form-control" onchange="this.form.submit()">
                <option value="all" {{ request()->get('order_filter') == 'all' ? 'selected' : null }}>All</option>
                <option value="0" {{ request()->get('order_filter') == '0' ? 'selected' : null }}>Processing</option>
                <option value="1" {{ request()->get('order_filter') == '1' ? 'selected' : null }}>Delivered</option>
                <option value="2" {{ request()->get('order_filter') == '2' ? 'selected' : null }}>Canceled</option>
              </select>
            </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}" onchange="this.form.submit()" />
          </div>
        </div>
      </div>
      </form>

      <div class="table-responsive">
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
          <thead>
            <tr>
              <th>Order Number</th>
              <th>Order Date</th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Total Amount</th>
              <th>Payment</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at->format('F d, Y') }}</td>
                <td>{{$order->product->title}}={{$order->product->price}}$</td>
                <td>{{$order->quantity}}</td>
                <td>{{ $order->amount }} $</td>
                <td>
                  @if($order->paid_status)
                    <span class="badge badge-success">Paid</span>
                  @else
                    <span class="badge badge-warning">Unpaid</span>
                  @endif
                </td>
                <td>
                  @if($order->status == 0)
                    <span class="badge badge-primary">Processing</span>
                  @elseif($order->status == 1)
                    <span class="badge badge-success">Delivered</span>
                  @elseif($order->status == 2)
                    <span class="badge badge-danger">Canceled</span>
                  @endif
                </td>
                <td nowrap="nowrap">
                  @if(auth()->user()->hasRole('Reseller') && $order->paid_status == 0)
                    <a href="{{ route('payLater.update', $order->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-light-primary btn-hover-primary btn-sm">
                      Pay due
                    </a>
                  @endif
                  @canany(['admin', 'order.all', 'order.view'])
                    <a href="{{ route('order.show', $order->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                      <span class="svg-icon svg-icon-primary svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.5"/>
                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.8"/>
                          </g>
                        </svg>
                      </span>
                    </a>
                  @endcanany
                  @canany(['admin', 'order.all', 'order.delete'])
                    <form method="post" action="{{ route('order.destroy', $order->id) }}" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-icon btn-light btn-hover-danger btn-sm">
                        <span class="svg-icon svg-icon-md svg-icon-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"></rect>
                              <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                              <path
                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                fill="#000000" opacity="0.3"></path>
                            </g>
                          </svg>
                        </span>
                      </button>
                    </form>
                  @endcanany
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $orders->links() }}
    </div>
  </div>

@endsection
