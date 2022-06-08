<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderedCourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->load('course');
        return [
            'id'    =>$this->id,
            'payment_satatus'   =>$this->paid_statu == 0 ? 'Unpaid':'Paid',
            'status'    =>$this->status == 0 ? 'Processing' : ($this->status==1? 'Delivered' : 'Cancelled'),
            'course'=>CourseResource::make($this->course),
        ];
    }
}
