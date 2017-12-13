<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{


    public function rules()
    {
        $id = $this->route()->parameter('category');
        
        return [
            'name' => 'required|unique:categories,name'.$id,
        ];
    }
}
