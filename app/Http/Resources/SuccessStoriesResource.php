<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuccessStoriesResource extends JsonResource
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
            'id'            =>  $this->id,
            'bride_name'    =>  $this->bride_name,
            'groom_name'    =>  $this->groom_name,
            'bride_story'   =>  $this->bride_story,
            'groom_story'   =>  $this->groom_story,
            'bride_image'   =>  setImage($this->bride_image,'user'),
            'groom_image'   =>  setImage($this->groom_image,'user')
        ];
    }
}
