<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRec extends FormRequest
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
            'username' => 'required|string|min:3|max:64',
            'email' => 'required|email|min:1',
            'curr_password' => 'required|string|min:8',
            'password' => 'required|string|min:8',
        ];
    }
}
