<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SwipeSuggestResource extends JsonResource
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
            'name'          =>$this->name,
            'profile_photo' =>setImage($this->profile_photo),
            'age'           =>$this->birthdate->age,
            'city'          =>$this->city->name,
            'country'       =>$this->country->name
        ];
    }
}
