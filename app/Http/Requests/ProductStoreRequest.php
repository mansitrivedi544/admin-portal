<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'mrp' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name.',
            'mrp.required' => 'Please enter mrp.',
            'price.required' => 'Please enter price.',
        ];
    }
}
