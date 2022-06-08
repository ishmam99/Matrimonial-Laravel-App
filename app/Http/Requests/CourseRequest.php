<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'image'                  => ['nullable', 'mimes:jpg,jpeg,png,svg,webp', 'max:2600'],
            'title'                  => ['required', 'string', 'max:255'],
            'description'            => ['required', 'string'],
            'price'                  => ['required', 'string'],
            'instructor_name'        => ['required', 'string', 'max:255'],
            'instructor_designation' => ['required', 'string', 'max:255'],
            'start_date'             => ['required', 'date'],
            'end_date'               => ['required', 'date'],
            'category_id'            => ['required', 'integer'],
            'status'                 => ['required', 'boolean'],
        ];
    }
}
