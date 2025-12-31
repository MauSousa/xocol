<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonial extends FormRequest
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
            'author_name' => 'required|string|max:255',
            'author_title' => 'nullable|string|max:255',
            'quote' => 'required|string',
            'avatar_url' => 'nullable|image|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ];
    }
}
