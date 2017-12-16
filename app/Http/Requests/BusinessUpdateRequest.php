<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessUpdateRequest extends FormRequest
{
    
    public function rules()
    {
        $id = $this->route()->parameter('id');
        
        return [
            'name' => 'required',            
            //'owner_id' => 'required',
            'location' => 'required'
        ];
    }
}
