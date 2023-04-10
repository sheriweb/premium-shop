<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_name'=>'required|unique:categories,category_name,'.$this->id,
            'category_image' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'category_home_image' => 'mimes:jpeg,png,jpg,gif',
        ];
    }

    public function messages()
    {
        return [
            'category_image.dimensions' => 'Please image upload 39 X 39 dimensions size',
            'category_home_image.dimensions' => 'Please image upload 317 X 226 dimensions size',
        ];
    }
}
