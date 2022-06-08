<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->load('profile');
        return [
            'id'            => $this->id,
            'rating'        => $this->rating,
            'details'       => $this->details,
            'reviewed_by'   => $this->profile->name,
        ];
    }
}
