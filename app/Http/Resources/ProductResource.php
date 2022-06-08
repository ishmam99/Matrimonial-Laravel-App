<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->load('productReviews', 'productCategory');
        if ($this->productReviews->count('id') > 0)
            $total = $this->productReviews->count('id');
        else
            $total = 1;


        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'content'       => $this->content,
            'price'         => $this->price,
            'percentage'    => $this->percentage,
            'image_one'     => setImage($this->image_one),
            'image_two'     => setImage($this->image_two),
            'image_three'   => setImage($this->image_three),
            'image_four'    => setImage($this->image_four),
            'category'      => $this->productCategory->name,
            'status'        => $this->status == 1 ? 'Available' : 'Out of Stock',
            'reviews'       => ProductReviewResource::collection($this->productReviews),
            'rating'        => $this->productReviews->sum('rating') / $total
        ];
    }
}
