<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FollowResource;
use App\Http\Resources\ProfileResource;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function followerList()
    {
        $profile_list = [];
        $profile = auth()->user()->profile->followingList->load('follower');
        foreach ($profile as $profiles) {
            $profile_list[] = $profiles->follower;
        }
        return $this->apiResponseResourceCollection(200, 'Follower List', ProfileResource::collection($profile_list));
    }
    public function followingList()
    {   $profile_list=[];
        $profile=auth()->user()->profile->followerList->load('following')->where('status',0);
        foreach($profile as $profiles)
        {
            $profile_list[]=$profiles->following;
        }
        return $this->apiResponseResourceCollection(200, 'Follower List', ProfileResource::collection($profile_list));
        // return $this->apiResponseResourceCollection(200,'Follower List',FollowResource::collection($profile));
    }
    public function acceptedFollowingList()
    {
        $profile_list = [];
        $profile = auth()->user()->profile->followerList->load('following')->where('status',1);
        foreach ($profile as $profiles) {
            $profile_list[] = $profiles->following;
        }
        return $this->apiResponseResourceCollection(200, 'Follower List', ProfileResource::collection($profile_list));
        // return $this->apiResponseResourceCollection(200,'Follower List',FollowResource::collection($profile));
    }
    public function requestFollow(Request $request)
    {
        $check = Follow::where([['follower_id',auth()->user()->profile->id],['following_id',$request->profile_id]])->first();
        if($check==null)
       auth()->user()->profile->followings()->create(['following_id'=>$request->profile_id]);
       return $this->apiResponse(201,'Follow Request Send');
    }
    public function requestList()
    {
        $profile = auth()->user()->profile->followingList->where('status',0)->load('follower');
        return $this->apiResponseResourceCollection(200,'Follower List',FollowResource::collection($profile));
    }
   public function acceptCancel(Request $request, Follow $follow)
   {
       if($request->status==1)
       {
           $follow->update(['status'=>1]);
           return $this->apiResponse(201,'Follow Request Accepted');
       }
       elseif($request->status == 2)
       {
            $follow->delete();
            return $this->apiResponse(201, 'Follow Request Cancelled');
       }
   }
}
