@extends('layouts.dashboard')

@section('content')

  <div class="d-flex flex-row">
    <!--begin::Aside-->
  
    <!--end::Aside-->

    <div class="flex-row-fluid ml-lg-8">
      <div class="card card-custom card-stretch">
        <div class="card-header py-3">
          <div class="card-title align-items-start flex-column">
            <h3 class="card-label font-weight-bolder text-dark">Lawyer Information</h3>
         
          </div>
          <div class="card-toolbar">
              <a href="{{route('lawyer.case',$lawyer->id)}}"><button type="submit" class="btn btn-primary mr-2" >Case List</button></a> 
               <a href="{{route('lawyer.edit',$lawyer->id)}}"><button type="submit" class="btn btn-success mr-2" >Edit Lawyer</button></a> 
            
          </div>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="col-12">
                <h5 class="font-weight-bold mb-6">Basic Info</h5> 
                <div class="row">
                  <label class="col-xl-2 col-lg-2 col-form-label" for="name"> Name : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$lawyer->user->name}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="name"> Email : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$lawyer->user->email}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="name"> Phone : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$lawyer->user->phone}}</h5>
                  </div>
                   <label class="col-xl-2 col-lg-2 col-form-label" for="name"> NID : </label>
                  <div class="col-xl-9 col-lg-6 col-form-label text-left">
                    <h5>{{$lawyer->user->nid}}</h5>
                  </div>
                  
                  
                </div>
              </div>
            
            
            <div class="col-6 ">
                <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
                 <h5 class="mb-0 mb-4">Professional Info</h5>
                <div class="row ">
                   <label class="col-xl-4 col-lg-4 col-form-label" for="name"> Fee : </label>
                  <div class="col-xl-6 col-lg-6 col-form-label text-left">
                    <h5>{{$lawyer->fee}}</h5>
                  </div>
                  <label class="col-xl-4 col-lg-4 col-form-label" for="name"> Active Cases : </label>
                  <div class="col-xl-6 col-lg-6 col-form-label text-left">
                    <h5>{{$lawyer->userCase->where('status',App\Models\UserCase::RUNNING)->count()}}</h5>
                  </div>
                  <label class="col-xl-4 col-lg-4 col-form-label" for="name"> Hold Cases : </label>
                  <div class="col-xl-6 col-lg-6 col-form-label text-left">
                    <h5>{{$lawyer->userCase->where('status',App\Models\UserCase::HOLD)->count()}}</h5>
                  </div>
                  <label class="col-xl-4 col-lg-4 col-form-label" for="name"> Pending Cases : </label>
                  <div class="col-xl-6 col-lg-6 col-form-label text-left">
                    <h5>{{$lawyer->userCase->where('status',App\Models\UserCase::PENDING)->count()}}</h5>
                  </div>
                  <label class="col-xl-4 col-lg-4 col-form-label" for="name"> Dismissed Cases : </label>
                  <div class="col-xl-6 col-lg-6 col-form-label text-left">
                    <h5>{{$lawyer->userCase->where('status',App\Models\UserCase::DISMISSED)->count()}}</h5>
                  </div>
                  <label class="col-xl-4 col-lg-4 col-form-label" for="name"> Closed Cases : </label>
                  <div class="col-xl-6 col-lg-6 col-form-label text-left">
                    <h5>{{$lawyer->userCase->where('status',App\Models\UserCase::CLOSED)->count()}}</h5>
                  </div></div>
            </div></div>  @php
                        $total= $lawyer->user->reviews->count();
                        $totals = $lawyer->user->reviews->sum('rating')/5;
                       if($lawyer->reviews){
                        $five = round(($agent->user->reviews->where('rating','5')->count())/$total*100);
                       $four = round(($agent->user->reviews->where('rating','4')->count())/$total*100);
                       $three = round(($agent->user->reviews->where('rating','3')->count())/$total*100);
                       $two = round(($agent->user->reviews->where('rating','2')->count())/$total*100);
                       $one = round(($agent->user->reviews->where('rating','1')->count())/$total*100);
                        }
                        else {
                          
                           $five = 0;
                       $four = 0;
                       $three =0;
                       $two = 0;
                       $one = 0;
                        }
                      
                    @endphp
            <div class="col-6">
                <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
                    <h5 class="mb-0 mb-4">Ratings and Reviews</h5>
                    <div class="graph-star-rating-header">
                        <div class="star-rating">
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating"></i></a> <b class="text-black ml-2">Total {{$lawyer->user->reviews->count()}}</b>
                        </div>
                        <p class="text-black mb-4 mt-2">Rated {{$totals}} out of 5  </p>
                    </div>
                  
                    <div class="graph-star-rating-body">
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                              <i class="fa fa-star text-success"></i> <i class="fa fa-star text-success"></i> <i class="fa fa-star text-success"></i> <i class="fa fa-star text-success"></i> <i class="fa fa-star text-success"></i>
                            </div>
                            <div class="row">
                              <div class="rating-list-center col-10">
                                <div class="progress">
                                    <div style="width: {{$five}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black col-2 text-center">{{$five}}%</div>
                            </div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                              <i class="fa fa-star text-success"></i> <i class="fa fa-star text-success"></i> <i class="fa fa-star text-success"></i> <i class="fa fa-star text-success"></i> <i class="fa fa-star "></i>
                            </div>
                            <div class="row">
                              <div class="rating-list-center col-10">
                                <div class="progress">
                                    <div style="width: {{$four}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black col-2 text-center">{{$four}}%</div>
                            </div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                <i class="fa fa-star text-success"></i> <i class="fa fa-star text-success"></i> <i class="fa fa-star text-success"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            </div>
                            <div class="row">
                              <div class="rating-list-center col-10">
                                <div class="progress">
                                    <div style="width: {{$three}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black col-2 text-center">{{$three}}%</div>
                            </div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                <i class="fa fa-star text-success"></i> <i class="fa fa-star text-success"></i> <i class="fa fa-star "></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            </div>
                            <div class="row">
                              <div class="rating-list-center col-10">
                                <div class="progress">
                                    <div style="width: {{$two}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black col-2 text-center">{{$two}}%</div>
                            </div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                <i class="fa fa-star text-success"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star "></i>
                            </div>
                            <div class="row">
                              <div class="rating-list-center col-10">
                                <div class="progress">
                                    <div style="width: {{$one}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black col-2 text-center">{{$one}}%</div>
                            </div>
                        </div>
                        

                      
                    </div>
                    
                </div>
            </div>
         
          
              <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews col-12">
                   
                    <h5 class="mb-1">All Ratings and Reviews</h5>
                    @foreach ($lawyer->user->reviews->load('profile') as $review)
                        
                    
                    <div class="reviews-members pt-4 pb-4">
                        <div class="media">
                            <a href="#"><img style="height:50px; width:50px;" alt="Generic placeholder image" src="{{setImage($review->profile->profile_photo,'user')}}" class="mr-3 rounded-pill"></a>
                            <div class="media-body">
                                <div class="reviews-members-header">
                                   
                                    <h6 class="mb-1"><a class="text-black" href="#">{{$review->profile->name}}</a></h6>
                                    <p class="text-gray">{{$review->created_at->diffForHumans()}}</p>
                                </div>
                                <div class="reviews-members-body">
                                    <p>{{$review->details}} </p>
                                   
                                        
                                    @for( $i=0; $i<$review->rating; $i++)
                                        <i class="fa fa-star text-success"></i> 
                                       
                                    @endfor
                                   
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                  
                    <hr>
                    
                </div>
      </div>
    </div>
   </div>
 </div>
  </div>
@endsection

@push('script')
  <script src="{{ asset('assets/dashboard/js/pages/crud/file-upload/image-input.js') }}"></script>
  <script>
    let avatar5 = new KTImageInput('user_image');
  </script>
@endpush
