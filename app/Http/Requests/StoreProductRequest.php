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
            'sku' => 'required|unique:products,sku,' . $this->product_id,
            'category_id' => 'required',
            'brand' => 'required|max:150',
            'weight' => 'required|max:150',
            'dimensions' => 'required|max:100',
            'capacity' => 'nullable|max:100',
            'capacity_watts' => 'nullable|max:100',
            'technology' => 'nullable|max:100',
            'processing_speed' => 'nullable|max:100',
            'no_of_ports' => 'nullable|max:100',
            'memory' => 'nullable|max:100',
            'storage' => 'nullable|max:100',
            'screen_size' => 'nullable|max:100',
            'form_factor' => 'nullable|max:150',
            'generation' => 'nullable|max:100',
            'product_type' => 'nullable|max:100',
            'cache_type' => 'nullable|max:100',
            'screen_resolution' => 'nullable|max:150',
            'price' => [ new ProductPriceRule($this->refurbished_price)],
            'refurbished_price' => [ new ProductPriceRule($this->price)],
            'retail_price' => 'nullable|numeric',
            'product_section' => 'required',
//            'feature_image' => $featureImage,
//            'product_upload.*' => 'mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=360,height=360',
//            'image_thumbnail' => 'required|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=360,height=360'
        ];
    }

    public function messages()
    {
        return [
            'feature_image.dimensions' => $this->message,
        ];
    }
}
