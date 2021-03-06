<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRec extends FormRequest
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
            'id' => 'required|integer|min:1',
            'name' => 'required|string|min:3|max:64',
            'gender' => 'required|string|min:4|max:6',
            'class' => 'required|integer|min:1',
            'section' => 'required|string|min:1',
            'address' => 'required|string|min:1',
            'dob' => 'required|date|min:4',
            'schedule' => 'required|exists:schedules,slug',
        ];
    }
}
