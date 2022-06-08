<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'name'          =>['required','string'],
        'intro'         =>['nullable','string'],
        'gender'         =>['nullable'],
        'country_id'    =>['nullable','exists:countries,id'],
        'city_id'       =>['nullable','exists:cities,id'],  
        'birthdate'     =>['nullable','string'],    
        'job_id'        =>['nullable'],
        'relation_status'=>['nullable'],
        'salary'        =>['nullable'],
        'education_level'=>['nullable'],    
        'birthplace'    =>['nullable','string'],
        'ancestry'      =>['nullable','string'] ,
        'hobby_id'      =>['nullable'],
        'political_view'=>['nullable','string'],
        'religion'      =>['nullable'],
        'favourite_show'=>['nullable','string'],
        'favourite_band' =>['nullable','string'],
        'favourite_sport'=>['nullable','string'],
        'medical_history'=>['nullable','string'],
        'profile_photo'=> ['nullable','file'],
        'cover_photo'   =>['nullable','file'],
        'profile_type'  =>['nullable'],
        'package_id'    =>['nullable'],
        'nid_photo'     =>['nullable'],
        'skin_tone_id'  =>['nullable'],
        ];
    }
}
