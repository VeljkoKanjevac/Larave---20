<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
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
            'name' => 'required|string|min:3|unique:products',
            'description' => 'required|string|min:3',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|integer|min:0',
            'image' => 'required|string',
        ];
    }
}
