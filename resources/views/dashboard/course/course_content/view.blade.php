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
        <a href="{{ route('contentMedia.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-sm"></i>
          Back
        </a>
      </div>
      </div>
      <div class="card-body">
        <div class="row">
          
          <div class="col-md-8">
            <p><b>Name :</b> {{ $contentMedia->name }}</p>
           
            <hr>
            <div>
              @if ($contentMedia->media)
                  <div style="text-align:center"> 
  <button onclick="playPause()">Play/Pause</button> 
  <button onclick="makeBig()">Big</button>
  <button onclick="makeSmall()">Small</button>
  <button onclick="makeNormal()">Normal</button>
  <br><br>
  <video id="video1" width="420">
    <source src="{{setImage($contentMedia->media)}}" type="video/mp4">
  
   
  </video>
</div> 
              @endif
           @if ($contentMedia->link)
                 <div class="content"> 
                  <iframe src="{{$contentMedia->link}}" frameborder="0" width="100%" height="300"></iframe>
                 </div>
           @endif

<script> 
var myVideo = document.getElementById("video1"); 

function playPause() { 
  if (myVideo.paused) 
    myVideo.play(); 
  else 
    myVideo.pause(); 
} 

function makeBig() { 
    myVideo.width = 720; 
} 

function makeSmall() { 
    myVideo.width = 320; 
} 

function makeNormal() { 
    myVideo.width = 420; 
} 
</script> 

         
        </div>
      </div>
     
     
    </div>
  </section>
@endsection
