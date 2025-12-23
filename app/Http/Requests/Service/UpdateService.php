<?php

namespace App\Http\Requests\Service;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;

class UpdateService extends FormRequest
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
        $rules = (new StoreService())->rules();
        $service = $this->route('service');
        $serviceId = $service instanceof Service ? $service->id : $service;

        $rules['slug'] = 'nullable|string|max:255|unique:services,slug,' . $serviceId;

        return $rules;
    }
}
