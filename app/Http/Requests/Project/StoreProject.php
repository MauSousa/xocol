<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProject extends FormRequest
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
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'content' => 'nullable|string',
            'cover_image' => 'nullable|image|max:5120',
            'grid_image' => 'nullable|image|max:5120',
            'grid_image_size' => 'nullable|in:1,2,3',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|max:5120',
            'published_at' => 'nullable|date',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'services' => 'nullable|array',
            'services.*' => 'integer|exists:services,id',
            'blocks' => 'nullable|array',
            'blocks.*.id' => 'nullable|integer',
            'blocks.*.type' => 'required_with:blocks|string|in:heading,rich_text,image',
            'blocks.*.data' => 'nullable|array',
            'blocks.*.data.text' => 'nullable|string',
            'blocks.*.data.html' => 'nullable|string',
            'blocks.*.data.alt' => 'nullable|string|max:255',
            'blocks.*.existing_image' => 'nullable|string',
            'blocks.*.image' => 'nullable|image|max:5120',
        ];
    }
}
