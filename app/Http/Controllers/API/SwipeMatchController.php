<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SwipeResource;
use App\Http\Resources\SwipeSuggestResource;
use App\Models\Profile;
use App\Models\SwipMatch;
use Illuminate\Http\Request;

class SwipeMatchController extends Controller
{
    public function index()
    {
        $swipe = auth()->user()->profile->swipe->load('favourite');
        return $this->apiResponseResourceCollection(200, 'Swipe & Match List', SwipeResource::collection($swipe));
    }
 
    public function store(Request $request)
    {
        
        $check  = SwipMatch::where([['profile_id',auth()->user()->profile->id],['favourite_id',$request->favourite_id]])->first();
        if($check == null){
        auth()->user()->profile->swipe()->create([
            'favourite_id' => $request->favourite_id,
            'type'  => $request->type
        ]);
        $message = 'Favourite Added';
        if($request->type == SwipMatch::MATCHING)
        {
            auth()->user()->profile->senders()->create(['receive_id' => $request->favourite_id]);
            $message = 'Favourite Added with Matching Request';
        }
        if ($request->type == SwipMatch::FOLLOW)
        {
            auth()->user()->profile->followings()->create(['following_id' => $request->favourite_id]);
            $message = 'Favourite Added and Follow Requested';
        }
       
        return $this->apiResponse(201,$message);
        }
        else
        return $this->apiResponse(404, 'Already Added as Swipe');
    }
    public function swipeList()
    {
        $profile=auth()->user()->profile;
      if($profile->birthdate && $profile->religion){
            $swipList=Profile::where('id', '!=',$profile->id)->whereBetween('birthdate',[$profile->birthdate->addYears(-5), $profile->birthdate->addYears(5)] )->whereOr(['hobby_id',$profile->hobby_id],['country_id',$profile->country_id],['city_id',$profile->city_id],['skin_tone_id',$profile->skin_tone_id])->where('religion',$profile->religion)->with('city','country')->get();
       
      }
      else 
      $swipList=Profile::where('id','!=',auth()->user()->profile->id)->where('birthdate','!=',null)->get();
      return $this->apiResponseResourceCollection(200,'Suggestions', SwipeSuggestResource::collection($swipList));
    }
}
