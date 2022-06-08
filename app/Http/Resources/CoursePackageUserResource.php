<?php

namespace App\Http\Resources;

use App\Models\CoursePackage;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursePackageUserResource extends JsonResource
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
            'id'        => $this->id,
            'package'   => CoursePackageResource::make()
        ];
    }
}
