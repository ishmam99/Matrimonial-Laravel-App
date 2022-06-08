<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoursePackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        $courses = $this->packageCourse->map(function ($q) {
            return $q->course;
        });
        return [
            'id'                    => $this->id,
            'fee'                 => $this->fee,
            'package_list'          => CourseResource::collection($courses),
        ];
    }
}
