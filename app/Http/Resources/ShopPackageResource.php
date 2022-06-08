<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopPackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       
        $products = $this->packageProduct->map(function($q){
            return $q->product;
        });
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'price'         => $this->price,
            'banner'        => setImage($this->banner),
            'expired_at'    => Carbon::parse($this->expired_at)->format('Y-m-d'),
            'products'      => ProductResource::collection($products),
        ];
    }
}
