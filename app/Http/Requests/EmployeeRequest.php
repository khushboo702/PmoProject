<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'emp_name' => 'required|min:1|max:50|regex:/^[a-zA-Z0-9\s]+$/',
            'address' => 'required|string|min:3|max:100000',
            'skill' => 'string|max:50|min:3',
            'dob' => 'required|date|before:today',
            'emp_image' => $this->types == 'edit' ? 'nullable|mimes:jpeg,png,jpg,gif|max:2048' : 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }


    public function message()
    {
        return [
            'emp_name.required' => 'The name field is required .',
            'emp_name.string' => 'The name must be a string.',
            'emp_name.min' => 'The name should be minimum 3 characters.',
            'emp_name.max' => 'The name should not exceed 255 characters.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',
            'address.min' => 'The address should be minimum 3 characters.',
            'address.max' => 'The address should not exceed 1000 characters.',

            'emp_image.required' => 'Please select an image to upload.',
            'emp_image.image' => 'The uploaded file must be an image.',
            'emp_image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'emp_image.max' => 'The image may not be greater than 2 MB in size.',

            'skills.required' => 'Skills are required.',
            'skills.array' => 'Skills must be an array.',
            'skills.*.string' => 'Each skill must be a valid string.',
            'skills.*.max' => 'Each skill may not be greater than 50 characters.',
            'dob.required' => 'Date of Birth is required.',
            'dob.date' => 'Date of Birth must be a valid date.',
            'dob.before' => 'Date of Birth must be a date before today.',

        ];
    }
}