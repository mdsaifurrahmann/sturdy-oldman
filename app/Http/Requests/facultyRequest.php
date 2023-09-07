<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class facultyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'designation' => 'required|string',
            'technology' => 'nullable|string',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'mobile' => 'required',
            'image' => 'max:512|mimes:jpeg,jpg,png',
            'type' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name should be a string',
            'designation.required' => 'Designation is required',
            'designation.string' => 'Designation should be a string',
            'technology.string' => 'Technology should be a string',
            'email.email' => 'Email should be a valid email',
            'mobile.required' => 'Mobile is required',
            'image.max' => 'Image size should be less than 512kb',
            'image.mimes' => 'Image should be in png, jpg, jpeg format',
            'type.required' => 'Type is required',
        ];
    }
}
