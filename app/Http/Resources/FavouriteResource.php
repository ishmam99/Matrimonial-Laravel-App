<?php

namespace App\Http\Resources;

use App\Models\Favourite;
use Illuminate\Http\Resources\Json\JsonResource;

class FavouriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->type==Favourite::LAWYER ? $name = 'lawyer' : $name = 'agent';
        $this->load('user.agent','user.lawyer');
        return 
        [
            'id'    => $this->id,
            $name  => $this->type == Favourite::LAWYER ? LawyerResource::make($this->user->lawyer) : AgentResource::make($this->user->agent)
        ];
    }
}
