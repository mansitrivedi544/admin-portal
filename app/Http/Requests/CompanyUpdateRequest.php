<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'website' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name.',
            'website.required' => 'Please enter website.',
        ];
    }
}
