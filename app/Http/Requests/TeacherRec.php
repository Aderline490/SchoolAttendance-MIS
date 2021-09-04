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
            'name' => 'required|string|min:3|max:64|alpha_dash',
            'gender' => 'required|string|min:4|max:6|alpha_dash',
            'address' => 'required|string|min:1|alpha_dash',
            'dob' => 'required|date|min:4|alpha_dash',
            'phone' => 'integer|min:10|alpha_dash',
            'email' => 'email|min:1|alpha_dash',
        ];
    }
}
