<?php

namespace Taller\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Taller\User;

class UserUpdateRequest extends FormRequest
{

    public function rules()
    {
        $id = $this->route()->parameter('user');
        //$user = User::find($id);
        //dd($user);


        return [
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'numeric',
            'email' => "required|email|unique:users,email,".$id,
            'password' => 'same:confirm-password',
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
