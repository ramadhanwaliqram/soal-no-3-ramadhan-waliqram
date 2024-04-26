<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_code' => ['required', 'string'],
            'name' => ['required', 'string'],
            'category' => ['required', 'string'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }
}
