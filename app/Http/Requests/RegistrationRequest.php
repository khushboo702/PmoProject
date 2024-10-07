<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:50|regex:/^[a-zA-Z0-9\s]+$/',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email',
            'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'confirm_password' => 'required|string|min:8|same:password',
            'terms' => 'required',
        ];
    }


    public function messages() //OPTIONAL
    {
        return [
            'name.required' => "The name field is required.",
            'name.min' => "The name field must contain atleast 1 alphabet.",
            'name.max' => "The name field must not contain more than 50 alphabets.",
            'name.regex' => "The name field should only contain alphabets.",
            'email.required' => "The email field is required.",
            'email.regex' => "The email format is invalid.",
            'email.unique' => "The email already exist.",
            'password.required' => "The password field is required.",
            'password.min' => "The password length must be greater than 6 characters.",
            'confirm_password.same' => "The password and confirm Password should be same.",
            'password.regex' => "The password must contain 1 Upper Case,1 Lower Case, 1 Numeric and 1 Special Character.",
            

        ];
    }
}
