<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessUpdateRequest extends FormRequest
{
    

    public function rules()
    {
        $id = $this->route()->parameter('business');
        
        return [
            'name' => 'required|unique:businesses,name'.$id,            
            'owner_id' => 'required',
            'location' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize()
    {
        return false;
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    /*public function rules()
    {
        return [
            //
        ];
    }*/
}
