<?php

namespace App\Http\Requests;

use App\Rules\ProductPriceRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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

    public $message;

    public function rules()
    {
        if ($this->product_section == 'featureProductSection') {
            $featureImage = 'required|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=1140,height=460';
            $this->message = 'upload the image with above mention size (1140 X 460)';
        } elseif ($this->product_section == 'newProductSection') {
            $featureImage ='required|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=363,height=360';
            $this->message = 'upload the image with above mention size (363 X 360)';
        } elseif ($this->product_section == 'dealOfTheDaySection') {
            $featureImage = 'required|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=320,height=331';
            $this->message = 'upload the image with above mention size (320 X 331)';
        }elseif ($this->product_section == 'featureHeaderSection'){
            $featureImage = 'required|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=460,height=260';
            $this->message = 'upload the image with above mention size (460 X 260)';
        } else {
            $featureImage = '';
        }


        return [
            'product_name' => 'required|unique:products,product_name,' . $this->product_id,
            'category_id' => 'required',
            'technology' => 'nullable|max:100',
            'product_section' => 'required',
//            'feature_image' => $featureImage,
//            'product_upload.*' => 'mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=360,height=360',
//            'image_thumbnail' => 'required|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=360,height=360'
        ];
    }
}
