<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'category_id' => 'required',
            'status_product_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'bar_code' => 'required',
            'image' => 'required',
            'price' => 'required'
        ];
    }
}
