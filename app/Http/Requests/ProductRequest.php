<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'image_one'          => 'nullable|mimes:jpg,jpeg,png,gif,webp,svg|max:1024',
            'image_two'          => 'nullable|mimes:jpg,jpeg,png,gif,webp,svg|max:1024',
            'image_three'        => 'nullable|mimes:jpg,jpeg,png,gif,webp,svg|max:1024',
            'image_four'         => 'nullable|mimes:jpg,jpeg,png,gif,webp,svg|max:1024',
            'percentage'         => 'nullable',
            'title'              => 'required|string|max:255',
            'content'            => 'required|string',
            'product_category_id'=> 'required|integer|exists:product_categories,id',
            'price'              => 'required|string|max:255',
            'status'             => 'required|boolean',
            'stock'              => 'required|numeric'   
        ];
    }
}
