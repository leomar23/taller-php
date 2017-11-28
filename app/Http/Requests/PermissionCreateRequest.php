<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:permissions,name',
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
