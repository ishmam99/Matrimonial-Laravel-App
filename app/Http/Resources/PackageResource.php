<?php

namespace App\Http\Resources;

use App\Models\Package;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'id'        =>$this->id,
            'name'      =>$this->name,
            'type'      =>$this->type==Package::ONE_MONTH ? '1 month' 
                                        : ($this->type==Package::THREE_MONTH ?     '3 Months'
                                        : ($this->type==Package::SIX_MONTH ? '6 Months' 
                                        : '1 Year')),
            'fee'       =>$this->fee
        ];
    }
}
