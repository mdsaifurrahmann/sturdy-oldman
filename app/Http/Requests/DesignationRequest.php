<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesignationRequest extends FormRequest
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
            'designation' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            "designation.required" => "Designation name is required",
            "designation.string" => "Designation name must be string"
        ];
    }
}
