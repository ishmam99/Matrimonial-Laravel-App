@extends('layouts.dashboard')

@section('content')
  <div class="card card-custom card-sticky" id="kt_page_sticky_card">
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{session()->get('success')}}
      </div>
    @elseif(session()->has('error'))
      <div class="alert alert-danger">
        {{session()->get('error')}}
      </div>
    @endif
    <div class="card-header">
      <div class="card-title align-items-start flex-column">
            <h3 class="card-label font-weight-bolder text-dark">Product Return Details</h3>
         
          </div>
      <div class="card-toolbar">
        
         <a href="{{ route('productReturn.index') }}" class="btn btn-light-primary font-weight-bolder m-2 p-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        @if ($productReturn->status == 0)
            
     
          <form action="{{ route('productReturn.update',$productReturn) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="status" value="1">
            <button class="btn btn-success m-2 " type="submit"> 
          Accept</button> 
          </form>
        
         <form action="{{ route('productReturn.update',$productReturn) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="status" value="2">
            <button class="btn btn-danger m-2 " type="submit"> 
          Decline</button> 
          </form>
      
         @endif
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
     
        <div class="row">
          <div class="col-xl-12">
            <div class="my-5">
              @if ($productReturn->status == 0)
            <div class="my-5 text-center bg-warning">
              <h3>Pending</h3>
            </div>
              @elseif ($productReturn->status == 1)
               <div class="my-5 text-center bg-success">
              <h3>Accepted</h3>
               </div>
              @else <div class="my-5 text-center bg-danger">
              <h3>Rejected</h3>
              </div>
              @endif
             
           

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="title">Product Title <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p>{{$productReturn->order->product->title }}</p>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p >{{ $productReturn->order->product->price }}*{{ $productReturn->order->quantity }} = {{$productReturn->order->product->price*$productReturn->order->quantity}}</p>
                 
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Quantity <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p >{{ $productReturn->order->quantity }} </p>
                 
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Stock <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p >{{ $productReturn->order->product->stock }} </p>
                 
                </div>
              </div>
              
              

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="productCategory">Category&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <div class="form-group">
                    <p>{{ $productReturn->order->product->productCategory->name }}</p>
                  </div>
                  @error('product_category_id')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="content">Reason <span class="text-danger">*</span></label>
                <div class="col-md-10">
                 <p>{!! $productReturn->reason !!}</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('script')
  <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create( document.querySelector( '#content' ) )
      .catch( error => {
        console.error( error );
      } );
  </script>
@endpush
