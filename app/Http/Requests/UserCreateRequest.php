<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
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
