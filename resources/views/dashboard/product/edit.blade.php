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
      <div class="card-title">
        <h3 class="card-label">
          Add Product
        </h3>
      </div>
      <div class="card-toolbar">
        <a href="{{ route('product.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder submit">
            <i class="ki ki-check icon-sm"></i>
            Update Product
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
      <form class="form" id="kt_form" method="post" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="row">
          <div class="col-xl-12">
            <div class="my-5">

              <div class="form-group row">
                <div class="col-md-10 offset-md-2">
                  <img src="{{setImage($product->image)}}" alt="" style="width: 200px">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="image">Image <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="image" id="image" class="form-control form-control-solid @error('image') is-invalid @enderror" type="file">
                  @error('image')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="title">Title <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="title" id="title" value="{{ old('title', $product->title) }}" class="form-control form-control-solid @error('title') is-invalid @enderror" type="text">
                  @error('title')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="price" id="price" value="{{ old('price', $product->price) }}" class="form-control form-control-solid @error('price') is-invalid @enderror" type="number" step="0.01">
                  @error('price')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
               <div class="form-group row">
                <label class="col-md-2 col-form-label" for="stock">Stock <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <input name="stock" id="stock" value="{{ old('stock'),$product->stock }}" class="form-control form-control-solid @error('stock') is-invalid @enderror" type="number" step="0.01">
                  @error('stock')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="productCategory">Category&nbsp;<span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <div class="form-group">
                    <select class="form-control select2" name="product_category_id" id="">
                      @foreach(App\Models\ProductCategory::all() as $productCategory)
                        <option value="{{ $productCategory->id}}" {{ $productCategory->id==$product->category_id ? 'selected' : null }}>{{ $productCategory->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('product_category_id')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="content">Content <span class="text-danger">*</span></label>
                <div class="col-md-10">
                  <textarea name="content" id="content" class="form-control form-control-solid @error('content') is-invalid @enderror">{{ old('content', $product->content) }}</textarea>
                  @error('content')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="status">Publish</label>
                <div class="col-md-10">
                  <input type="hidden" value="0" name="status"/>
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" {{ $product->status == 1 ? 'checked' : '' }} value="1" name="status"/>
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
