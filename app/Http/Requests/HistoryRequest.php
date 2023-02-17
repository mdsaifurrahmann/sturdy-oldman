<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
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
            'history' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
            'title' => 'required|string',
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
            'history.required' => 'History is required',
            'image.required' => 'Image is required',
            'title.required' => 'Title is required',
            'history.string' => 'History must be a string',
            'title.string' => 'Title must be a string',
            'image.image' => 'Image must be an image',
            'image.mimes' => 'Image must be a file of type: jpeg, png, jpg',
            'image.max' => 'Image may not be greater than 1024 kilobytes',
        ];
    }
}
