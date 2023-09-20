<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'website' => 'required',
            'logo' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please enter email.',
            'password.required' => 'Please enter password.',
            'name.required' => 'Please enter name.',
            'website.required' => 'Please enter website.',
            'logo.required' => 'Please select logo.',
        ];
    }
}
