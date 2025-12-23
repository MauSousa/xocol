<?php

namespace App\Http\Requests\HeroSlide;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeroSlide extends FormRequest
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
            'subtitle' => 'nullable|string|max:255',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cta_text' => 'nullable|string|max:100',
        ];
    }

    public function messages(): array
    {
        // TODO: mensajes personalizados en español
        return [
            'title.required' => 'Título es obligatorio.',
            'title.max' => 'Título debe ser de 255 caracteres como máximo.',
            'subtitle.max' => 'Subtítulo debe ser de 255 caracteres como máximo.',
            'image_path.max' => 'Imagen debe ser de 2048 KB como máximo.',
            'cta_text.max' => 'Texto de CTA debe ser de 100 caracteres como máximo.',
        ];
    }
}
