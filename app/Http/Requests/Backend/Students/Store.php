<?php

namespace App\Http\Requests\Backend\Students;

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
            'first_name'            =>  'required|string|max:15',
            'second_name'           =>  'required|string|max:15',
            'third_name'            =>  'required|string|max:15',
            'address'               =>  'required|string',
            'guardian'              =>  'required|string|max:30',
            'phone'                 =>  'numeric|required',
            'photo'                 =>  'required|image',
            'other_files.*'           =>  'sometimes|nullable',
            'gender'                =>  'required|in:boy,girl',
        ];
    }
}
