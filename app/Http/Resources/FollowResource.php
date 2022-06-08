<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FollowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
        [
            'id'           =>$this->id, 
            // 'status'    =>$this->status,
            'following'    => ProfileResource::make($this->follower),
            // 'follow_list'  =>ProfileResource::collection($this->followerList),
            // 'following_list'  => ProfileResource::collection(
                // $this->followingList)
        ];
    }
}
