<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
     
    $id = $this->route()->parameter('id'); //** ATENTO **//
     
        return [
            
            'user_id' => 'required|unique:orders,user_id', 
            'shipping_place' => 'required',

        ];
    }
}
