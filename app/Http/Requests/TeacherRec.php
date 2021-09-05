<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRec extends FormRequest
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
            'name' => 'required|string|min:3|max:64',
            'gender' => 'required|string|min:4|max:6',
            'address' => 'required|string|min:1',
            'dob' => 'required|date|min:4',
            'phone' => 'required|regex:/(07)[0-9]{8}/|unique:teachers,phone|min:10',
            'email' => 'required|email|unique:teachers,email|min:1',
        ];
    }
}
