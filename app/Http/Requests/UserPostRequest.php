<?php

namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class UserPostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Auth::user();

        $rules = [] ;
        switch($this->method()){
            case 'POST':{
             return [
                'email'      => 'required|email|unique:users,email',
                'password'   => 'required|min:8',
                'contact'    => 'required|numeric',
                'firstname'  => 'required',
                'lastname'   => 'required',
                'middlename' => 'required',
                'address'    => 'required'
             ];

            }
            case 'PUT':{
                return [
                'email'      => 'required|email|unique:users,email,'.$user->id,
                'password'   => 'required|min:8',
                'contact'    => 'required|numeric',
                'firstname'  => 'required',
                'lastname'   => 'required',
                'middlename' => 'required',
                'address'    => 'required'
             ];

            }
            case 'PATCH':{
                return [
                'email'      => 'required|email|unique:users,email,'.$user->id,
                'password'   => 'required|min:8',
                'contact'    => 'required|numeric',
                'firstname'  => 'required',
                'lastname'   => 'required',
                'middlename' => 'required',
                'address'    => 'required'
             ];

            }

        }

    }
}
