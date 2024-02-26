<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
        ];
    }

    public function messages()
    {
        return [
                'name.required' => 'Please provide your name.',
                'name.string' => 'The name must be alphabetic characters only.',
                'name.max' => 'Your name must not exceed 255:max characters.',
                'email.required' => 'Please provide your email address.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email address is already in use.',
                'password.required' => 'Please create strong password.',
                'password.min' => 'Your password must be at least 5 characters long.',
                'password.confirmed' => 'The password confirmation does not match.',
            ];
    }
}
