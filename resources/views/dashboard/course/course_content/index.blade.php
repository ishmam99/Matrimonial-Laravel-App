@extends('layouts.dashboard')

@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
               
            </div>
            <div class="card-toolbar">
                <a href="{{ route('course.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
                @can('web_content.create')
                    <a href="{{ route('contentMedia.create') }}" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                    <path
                                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                        fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </span>
                        Add Course Content
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="container">

  <h1 class="fw-light text-center text-lg-start mt-4 mb-0">Course Content Thumbnail Gallery</h1>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-start">
@foreach ($contents as $content)
    

    <div class="col-lg-3 col-md-4 col-6">
        <h6>{{$content->name}}</h6>
      <a href="{{route('contentMedia.show',$content->id)}}" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail" src="{{setImage($content->thumb)}}" alt="">
      </a>
    </div>
    @endforeach
   
    
  </div>

</div>
        </div>
    </div>

@endsection
