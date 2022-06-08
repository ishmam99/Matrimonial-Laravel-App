@extends('layouts.dashboard')

@section('content')
  {{-- @if($errors->any())
     @foreach ($errors->all() as $item)
        <p class="text-danger">{{ $item }}</p>
  @endforeach
  @endif --}}
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
          Add Post
        </h3>
      </div>
      <div class="card-toolbar">
        <a href="{{ route('blog.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
        <div class="btn-group">
          <button type="submit" form="kt_form" class="btn btn-primary font-weight-bolder submit">
            <i class="ki ki-check icon-sm"></i>
            Update Post
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <!--begin::Form-->
      <form class="form" id="kt_form" method="post" action="{{ route('blog.update',$post->id) }}" enctype="multipart/form-data">
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
          <div class="col-xl-2"></div>
          <div class="col-xl-8">
            <div class="my-5">

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="url">Url <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="url" value="{{ old('url', $post->url) }}" id="url" class="form-control form-control-solid @error('url') is-invalid @enderror" type="text">
                  @error('url')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="da">DA <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="da" value="{{ old('da', $post->da) }}" id="da" class="form-control form-control-solid @error('da') is-invalid @enderror" type="text">
                  @error('da')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="pa">PA <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="pa" value="{{ old('pa', $post->pa) }}" id="pa" class="form-control form-control-solid @error('pa') is-invalid @enderror" type="text">
                  @error('pa')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="dr">DR <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="dr" value="{{ old('dr', $post->dr) }}" id="dr" class="form-control form-control-solid @error('dr') is-invalid @enderror" type="text">
                  @error('dr')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="cbd_casino">CBD, Casino <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="cbd_casino" value="{{ old('cbd_casino', $post->cbd_casino) }}" id="cbd_casino" class="form-control form-control-solid @error('cbd_casino') is-invalid @enderror" type="text">
                  @error('cbd_casino')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="language">Language <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="language" value="{{ old('language', $post->language) }}" id="language" class="form-control form-control-solid @error('language') is-invalid @enderror" type="text">
                  @error('language')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label" for="links"> Links <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                  <select class="form-control form-control-solid" id="links" name="links">
                    <option value="0">Nofollow</option>
                    <option value="1">Dofollow</option>
                  </select>
                  @error('links')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="monthly_traffic">Monthly Traffic <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="monthly_traffic" value="{{ old('monthly_traffic', $post->monthly_traffic) }}" id="monthly_traffic" class="form-control form-control-solid @error('monthly_traffic') is-invalid @enderror" type="text">
                  @error('monthly_traffic')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="country">Country <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="country" value="{{ old('country', $post->country) }}" id="country" class="form-control form-control-solid @error('country') is-invalid @enderror" type="text">
                  @error('country')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="buyer_price">Buyer Price <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="buyer_price" value="{{ old('buyer_price', $post->buyer_price) }}" id="buyer_price" class="form-control form-control-solid @error('buyer_price') is-invalid @enderror" type="text">
                  @error('buyer_price')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="reseller_price">Reseller Price <span class="text-danger">*</span></label>
                <div class="col-md-9">
                  <input name="reseller_price" value="{{ old('reseller_price', $post->reseller_price) }}" id="reseller_price" class="form-control form-control-solid @error('reseller_price') is-invalid @enderror" type="text">
                  @error('reseller_price')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="ads_from">Ads From</label>
                <div class="col-md-9">
                  <input name="ads_from" id="ads_from" value="{{ old('ads_from', $post->ads_from) }}" class="form-control form-control-solid @error('ads_from') is-invalid @enderror" type="text">
                  @error('ads_from')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label" for="category_id"> Category <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                  <select class="form-control select2" id="category_id" name="category_id">
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label" for="tag_id">Tags</label>
                <div class="col-lg-9">
                  <select class="form-control select2-withTag" id="tag_id" multiple name="tag_id[]">
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}" {{ $post->Tags->contains($tag->id) ? 'selected' : null }}>{{ $tag->name }}</option>
                    @endforeach
                  </select>
                  @error('tag_id')
                  <span class="text-danger"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12" for="last_active">Last Active No </label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                  <input name="last_active" value="{{ old('last_active', $post->last_active) }}" id="last_active" type="date" class="form-control" placeholder="Select last_active"/>
                  @error('last_active')
                  <span class="text-danger"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-3 col-form-label" for="status">Publish</label>
                <div class="col-md-9">
                  <input type="hidden" value="0" name="status"/>
                  <span class="switch switch-icon">
                  <label>
                    <input type="checkbox" {{ $post->status == 1 ?'checked':'' }} value="1" name="status"/>
                    <span></span>
                  </label>
                </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-2"></div>
        </div>
      </form>
    </div>
  </div>

@endsection
