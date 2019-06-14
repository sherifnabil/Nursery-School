<?php

namespace App\Http\Requests\Backend\Classrooms;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'level'             =>  'required|numeric',
            'room_num'          =>  'required|numeric',
            'seats_number'      =>  'required|numeric',
        ];
    }
}
