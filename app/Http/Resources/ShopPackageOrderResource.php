<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopPackageOrderResource extends JsonResource
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
            'id'            => $this->id,
            'quantity'      => $this->quantity,
            'status'        => $this->status==0?'Order Placed':($this->status==1?'Processing':'Delivered'),
            'package'       => ShopPackageResource::make($this->shopPackage),
        ];
    }
}
