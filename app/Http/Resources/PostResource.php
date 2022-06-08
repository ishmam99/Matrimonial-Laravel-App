<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            =>$this->id,
            'status'        =>$this->status,
            'feeling'       =>$this->feeling,
            'posted_by'     =>$this->profile->name,
            'post_image'    =>setImage($this->post_image),
            'video'         =>setImage($this->video),
            'posted_at'     =>$this->updated_at->diffForHumans()
        ];
    }
}
