<?php

namespace App\Http\Resources;

use App\Models\Lawyer;
use Illuminate\Http\Resources\Json\JsonResource;

class LawyerResource extends JsonResource
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
            'fee'           =>$this->fee,
            'phone'         =>$this->phone,
            'email'         =>$this->email,
            'badge'         => $this->badge ? BadgeResource::make($this->badge->badge) : null,
            'profile_photo' => setImage($this->profile_photo, 'user'),
            'status'        =>$this->status==Lawyer::REGULAR ? 'Regular' : ($this->status==Lawyer::BESTRATED ? 'Best Rated' : 'Top-Rated'),
            'reviews'       =>ReviewResource::collection($this->user->reviews)

        ];
    }
}
