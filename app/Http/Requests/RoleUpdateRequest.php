<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{

    public function rules()
    {
        $id = $this->route()->parameter('role');
        //dd($user);


        return [
            'name' => 'required|unique:roles,name,'.$id,
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
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
