<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
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
            'id'             =>$this->id,
            'degree'         =>$this->degree,
            'institute_name' =>$this->institute_name,
            'details'        =>$this->description,
            'start_year'     =>$this->year_started,
            'end_year'       =>$this->year_ended,
            'certificate'    =>$this->education_certificate      
        ];
    }
}
