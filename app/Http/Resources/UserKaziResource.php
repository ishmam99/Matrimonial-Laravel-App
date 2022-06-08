<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserKaziResource extends JsonResource
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
            'kazi_name'     =>  $this->kazi->name,
            'client_name'   =>  $this->profile->name,
            'details'       =>  $this->details,
            'attachment'    =>  setImage($this->attachment),
            'fee'           =>  $this->fee,
            'status'        =>  $this->status
        ];
    }
}
