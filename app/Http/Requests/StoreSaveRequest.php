<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'store_image' => 'required_if:store_id,null|mimes:jpeg,png,jpg,gif|max:2048',
            'store_thumbnail' => 'required_if:store_id,null|mimes:jpeg,png,jpg,gif'
        ];
    }
}
