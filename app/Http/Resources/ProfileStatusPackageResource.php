<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileStatusPackageResource extends JsonResource
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
            'id'                => $this->id,
            'name'              => $this->name,
            'details'           => $this->details,
            'price'             => $this->price,
            'discount'          => $this->discount,
            'duration'          => $this->duration ,
            'type'              => $this->type == 0 ? 'Profile Boost Package': 'Status Boost Package' 
        ];
    }
}
