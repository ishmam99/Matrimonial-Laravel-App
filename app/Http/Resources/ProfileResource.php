<?php

namespace App\Http\Resources;

use App\Http\Controllers\CityController;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        $this->load('country', 'city', 'hobby', 'job', 'education', 'skinTone');
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            'intro'             => $this->intro,
            'country'           => $this->country ? CountryResource::make($this->country) : 'N\A',
            'city'              => $this->city ? CityResource::make($this->city) : 'N\A',
            'birthdate'         => Carbon::parse($this->birthdate)->toDateString(),
            'job_id'            => $this->job ? $this->job->id  : 'N\A',
            'relation_status'   => $this->relation_status,
            'birthplace'        => $this->birthplace,
            'ancestry'          => $this->ancestry,
            'education_level'    => $this->education_level,
            'salary'            => $this->salary,
            'hobby_id'          => $this->hobby ? $this->hobby->id : 'N\A',
            'political_view'    => $this->political_view,
            'religion'          => $this->religion,
            'favourite_show'    => $this->favourite_show,
            'favourite_band'    => $this->favourite_band,
            'favourite_sport'   => $this->favourite_sport,
            'medical_history'   => $this->medical_history,
            'profile_photo'     => setImage($this->profile_photo, 'user'),
            'cover_photo'       => setImage($this->cover_photo),
            'profile_type'      => $this->profile_type,
            'package_id'        => $this->package_id,
            'nid_photo'         => $this->nid_photo,
            'skin_tone'         => $this->skinTone ? $this->skinTone->id : 'N\A',
            'gender'            => $this->gender,
            'education'         => $this->education ? EducationResource::collection($this->education) : 'N\A'
        ];
    }
}
