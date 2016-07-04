<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ScheduleRequest extends Request
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
        return [
            'instructor_id' => 'required|integer|exists:instructors,id',
            'subject_id'    => 'required|integer|exists:subjects,id',
            'room_id'       => 'required',
            'from_time'     => 'required',
            'to_time'       => 'required',
            'day'           => 'required'


        ];
    }
}
