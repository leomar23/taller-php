<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{


    public function rules()
    {

    	$id = $this->route()->parameter('id'); //** ATENTO **//
        
        return [
            //'name' => 'required|unique:categories,name'.$id, //** FUNCA **//
            'name' => 'required', //** FUNCA **//
            'description' => 'required',
        ];
    }
}
