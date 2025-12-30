<?php

namespace App\Http\Requests\Project;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProject extends FormRequest
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
        $rules = (new StoreProject())->rules();
        $project = $this->route('project');
        $projectId = $project instanceof Project ? $project->id : $project;

        $rules['slug'] = 'nullable|string|max:255|unique:projects,slug,' . $projectId;
        $rules['existing_gallery_images'] = 'nullable|array';
        $rules['existing_gallery_images.*'] = 'string';
        $rules['remove_gallery_images'] = 'nullable|array';
        $rules['remove_gallery_images.*'] = 'string';

        return $rules;
    }
}
