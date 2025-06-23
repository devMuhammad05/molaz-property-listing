<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'name' => ['required', 'string', 'max:255',],
            'category' => ['required', 'string'],
            'description' => ['required', 'string', 'max:600'],
            'image' => ['nullable', 'image'],
            'city' => ['nullable', 'string', 'max:255',],
            'amount' => ['required', 'numeric'],
            'condition' => ['nullable', 'string', 'max:255',],
            'seller' => ['nullable', 'string', 'max:255',],
            'units_left' => ['required', 'string'],
            'other_images' => ['nullable', 'array'],
            'other_images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ];
    }
}
