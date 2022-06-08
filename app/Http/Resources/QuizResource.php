<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
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
            'course_name'   => $this->load('course')->course->title,
            'quiz_title'    => $this->name,
            'details'       => $this->quiz,
            'point'         => $this->point,
            'type'          => $this->type==1? 'MCQ':'Written',
            'mcq_1'         => $this->mcq_1,
            'mcq_2'         => $this->mcq_2,
            'mcq_3'         => $this->mcq_3,
            'mcq_4'         => $this->mcq_4,
                           
        ];
    }
}
