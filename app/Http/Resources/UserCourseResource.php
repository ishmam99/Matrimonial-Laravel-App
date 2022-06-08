<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCourseResource extends JsonResource
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
            'id'                    => $this->id,
            'total_quizzes'         => $this->course->quizzes->count(),
            'quiz_completed'        => $this->quiz_completed,
            'status'                => $this->status,
            'course'                => CourseResource::make($this->course),
            'contents'              => CourseContentResource::collection($this->course->courseContent)        
        ];
    }
}
