<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrincipalRequest extends FormRequest
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
            'principal_name' => 'required|string',
            'qop' => 'required|string',
            'position' => 'required|string',
            'institute' => 'required|string',
            'pi' => 'required|mimes:jpeg,jpg,png|max:1024',
            'pip' => 'required|mimes:jpeg,jpg,png|max:1024',
            'description' => 'required|string',
            'message' => 'required|string',
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
            'principal_name.required' => 'Principal name is required',
            'qop.required' => 'Qualification of Principal is required',
            'position.required' => 'Position is required',
            'institute.required' => 'Institute Name is required',
            'pi.required' => 'Principal image is required',
            'pip.max' => 'Principal image (Passport Size) must be less than 1MB',
            'pi.max' => 'Principal image must be less than 1MB',
            'pi.mimes' => 'Principal image must be a file of type: jpeg, jpg, png',
            'pip.mimes' => 'Principal image (Passport Size) must be a file of type: jpeg, jpg, png',
            'pip.required' => 'Principal image (Passport Size) is required',
            'description.required' => 'Description is required',
            'message.required' => 'Message is required',
        ];
    }
}
