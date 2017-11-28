<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionUpdateRequest extends FormRequest
{

    public function rules()
    {
        $id = $this->route()->parameter('permission');
        return [
            'name' => 'required|unique:permissions,name'.$id,
            'display_name' => 'required',
            'description' => 'required'
        ];
    }

//    public function messages()
//    {
//        return [
//            'name.required' => trans('menu::validation.name is required'),
//            'primary.unique' => trans('menu::validation.only one primary menu'),
//        ];
//    }

}
