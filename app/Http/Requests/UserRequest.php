<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        if($this->has('id')){
            return [
                'username'      =>  'required|unique:users,username,'. $this->get('id'),
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'email'         =>  'required|email|unique:users,email,'. $this->get('id')


            ];
        }
        return [
            'username'      =>  'required|unique:users,username',
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email'         =>  'required|email|unique:users,email',
            'password'      =>  'required',

        ];
    }
}
