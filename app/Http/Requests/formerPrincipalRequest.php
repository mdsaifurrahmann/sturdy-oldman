<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formerPrincipalRequest extends FormRequest
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
            'from' => 'required|date',
            'to' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'designation.required' => 'Designation is required',
            'from.required' => 'From date is required',
            'to.required' => 'To date is required',
            'name.string' => 'Name must be a string',
            'designation.string' => 'Designation must be a string',
            'from.date' => 'From date must be a date',
            'to.date' => 'To date must be a date',
        ];
    }
}
