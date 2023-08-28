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
            'technology' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'image' => 'max:512|mimes:jpeg,jpg,png'
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
            'technology.required' => 'Technology is required',
            'technology.string' => 'Technology should be a string',
            'phone.required' => 'Phone is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email should be a valid email',
            'mobile.required' => 'Mobile is required',
            'image.max' => 'Image size should be less than 512kb',
            'image.mimes' => 'Image should be in png, jpg, jpeg format',
        ];
    }
}
