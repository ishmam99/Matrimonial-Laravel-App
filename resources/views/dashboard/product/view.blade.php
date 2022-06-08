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
      
      <div class="card-toolbar">
        <a href="{{ route('product.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
         <a href="{{route('product.edit',$product->id)}}"><button  class="btn btn-primary font-weight-bolder submit">
            <i class="ki ki-check icon-sm"></i>
            Update Product
          </button></a> 
        </div>
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
     
        <div class="row">
          <div class="col-xl-12">
            <div class="my-5">
            <div class="my-5">
              
              <div class="form-group row">
                <div class="col-md-3 ">
                  <img src="{{setImage($product->image_one)}}" alt="" style="width: 150px" height="150px">
                </div>
             
                <div class="col-md-3">
                  <img src="{{setImage($product->image_two)}}" alt="" style="width: 150px" height="150px">
                </div>
              
                <div class="col-md-3">
                  <img src="{{setImage($product->image_three)}}" alt="" style="width: 150px" height="150px">
                </div>
              
              
                <div class="col-md-3">
                  <img src="{{setImage($product->image_four)}}" alt="" style="width: 150px" height="150px">
                </div>
             
            </div>
            </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="title">Title <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p>{{$product->title }}</p>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p >{{ $product->price }} </p>
                 
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Stock <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p >{{ $product->stock }} </p>
                 
                </div>
              </div>
              
               <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Discount Percentage <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <p >{{ $product->percentage }}% </p>
                 
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="productCategory">Category&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <div class="form-group">
                    <p>{{ $product->productCategory->name }}</p>
                  </div>
                  @error('product_category_id')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="content">Content <span class="text-danger">*</span></label>
                <div class="col-md-10">
                 <p>{!! $product->content !!}</p>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Publish</label>
                <div class="col-md-10">
                  <input type="hidden" value="0" name="status"/>
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" disabled {{ $product->status == 1 ? 'checked' : '' }} value="1" name="status"/>
                    <span></span>
                  </label>
                </span>
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
