<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchingResource;
use App\Http\Resources\MatchListResource;
use App\Http\Resources\ProfileResource;
use App\Models\Matching;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Match_;

class MatchmakingController extends Controller
{
    public function find(Request $request)
    {
        $matchings = [];
        $suggested = Profile::where([
            ['city_id', $request->city_id],
            ['gender', $request->gender],
            ['relation_status', $request->maritial_status],
            ['religion', $request->religion],
            // ['skin_tone_id',$request->skin_tone_id],
            // ['hobby_id',$request->hobby_id],
            // ['salary','<=',$request->max_salary],
            // ['salary','>=',$request->min_salary],
            // ['education_level',$request->education_level]
        ])
            ->whereBetween('birthdate', [Carbon::now()->addYears(-$request->max_age), Carbon::now()->addYears(-$request->min_age)])
            ->where('id', '!=', auth()->user()->profile->id)->get();
        foreach ($suggested as $profile) {
            $matching = new Matching();
            if (auth()->user()->profile->sender) {
                $matched = Matching::where([['sent_id', auth()->user()->profile->id], ['receive_id', $profile->id]])->first();
                if ($matched)
                    $matching->status = $matched->status;
                else
                    $matching->status = 2;
            }
            $matching->profile = $profile;
            $matchings[] = $matching;
        }

        return $this->apiResponseResourceCollection(200, 'Suggested List', MatchListResource::collection($matchings));
    }




    public function senderList()
    {

        $profile = auth()->user()->profile->senders->load('receiver', 'sender')->where('status', 0);


        return $this->apiResponseResourceCollection(200, 'Matching Request Sent List', MatchingResource::collection($profile));
    }
    public function receiverList()
    {

        $profile = auth()->user()->profile->receivers->load('sender')->where('status', 0);

        return $this->apiResponseResourceCollection(200, 'Matching Request List', ProfileResource::collection($profile));
        // return $this->apiResponseResourceCollection(200,'Follower List',FollowResource::collection($profile));
    }
    public function requestMatch(Request $request)
    {
        auth()->user()->profile->senders()->create(['receive_id' => $request->profile_id]);
        return $this->apiResponse(201, 'Matching Request Send');
    }
    public function myMatchings()
    {
        $profile = Matching::whereOr('sent_id', auth()->user()->profile_id)->whereOr('receive_id', auth()->user()->profile_id)->where('status', 1)->with('sender', 'receiver')->get();

        return $this->apiResponseResourceCollection(200, 'Sender List', MatchingResource::collection($profile));
    }
    public function acceptCancel(Request $request, Matching $matching)
    {
        if ($request->status == 1) {
            $matching->update(['status' => 1]);
            return $this->apiResponse(201, 'Matching Request Accepted');
        } elseif ($request->status == 2) {
            $matching->delete();
            return $this->apiResponse(201, 'Matching Request Cancelled');
        }
    }
}
