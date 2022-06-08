<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       
         if($this->sent_id != auth()->user()->profile_id ){
            $profile = $this->receiver;
         }

        else
            $profile = ($this->sender);
        //    dd($profile);
        return [
            'id'    =>  $this->id,
            'status'    => $this->status,
            'profile'    =>ProfileResource::make( $profile),
            
        ];
    }
}
