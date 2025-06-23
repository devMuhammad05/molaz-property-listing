<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListing extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:listings,name'],
            'description' => ['required', 'string', 'max:600'],
            'image' => ['required', 'image'],
            'video_url' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string', 'max:400'],
            'amount' => ['required', 'numeric'],
            'intervals' => ['required', 'string'],
            'property_type' => ['required', 'string'],
            'units_left' => ['required', 'string'],
            'tags' => ['nullable', 'string'],
            'other_images' => ['nullable', 'array'],
            'other_images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ];
    }
}
