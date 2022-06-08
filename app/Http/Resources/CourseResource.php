<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'title'         =>$this->title,
            'instructor'    =>$this->instructor_name,
            'instructor_image'    => setImage($this->instructor_image),
            'instructor_designation'=>$this->instructor_designation,
            'description'   =>$this->description,
            'start_date'    => Carbon::parse($this->start_date)->isoFormat('MMM Do YY'),
            'end_date'      => Carbon::parse($this->end_date)->isoFormat('MMM Do YY'),
            'price'         =>$this->price,
            'category'      =>$this->category->name,
            'status'        =>$this->status,
        ];
    }
}
