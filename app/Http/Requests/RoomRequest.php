<?php

namespace App\Http\Requests;

class RoomRequest extends Request
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
        if ($this->has('id')) {
            return [
                'room_no' => 'required|unique:rooms,room_no,' . $this->get('id'),
                'room_type' => 'required'
            ];
        }

        return [
            'room_no' => 'required|unique:rooms,room_no',
            'room_type' => 'required'
        ];
    }
}
