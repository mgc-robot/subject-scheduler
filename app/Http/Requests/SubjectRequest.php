<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SubjectRequest extends Request
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
                'edp_code'      =>  'required|unique:subjects,edp_code,' . $this->get('id'),
                'name'          =>  'required',
                'description'   =>  'required',
                'unit'          =>  'required'
            ];
        }
        return [
            'edp_code'      =>  'required|unique:subjects,edp_code',
            'name'          =>  'required',
            'description'   =>  'required',
            'unit'          =>  'required',
        ];
    }
}
