<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KaziResource extends JsonResource
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
            'id'        => $this->id,
            'name'      => $this->name,
            'phone'     => $this->phone,
            'email'     => $this->email,
            'badge'         => $this->badge ? BadgeResource::make($this->badge->badge) : null,
            'profile_photo' => setImage($this->profile_photo, 'user'),
            'reviews'   => ReviewResource::collection($this->user->reviews)
        ];
    }
}
