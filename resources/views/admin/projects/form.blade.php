<x-layouts.app>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            {{ isset($project) ? 'Editar Proyecto' : 'Crear Proyecto' }}
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            {{ isset($project) ? 'Actualiza la informacion del proyecto.' : 'Completa el formulario para crear un nuevo proyecto.' }}
        </p>
    </div>

    @if ($errors->any())
        <div class="mb-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">Por favor, corrige los siguientes errores:</span>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form
        action="{{ isset($project) ?
            route('admin.projects.update', $project) :
            route('admin.projects.store')
        }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        @csrf

        @if (isset($project))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titulo</label>
            <input type="text" name="title" id="title" value="{{ old('title', $project->title ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100 py-2">
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $project->slug ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100 py-2">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripcion</label>
            <textarea name="content" id="content" rows="6"
                      class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                      focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                      text-gray-900 dark:text-gray-100 py-2">{{ old('content', $project->content ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="cover_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen principal</label>
            @if (isset($project) && !empty($project->cover_image))
                <div class="mt-2 mb-3">
                    <img src="{{ $project->cover_image }}" alt="Imagen principal" class="w-40 h-auto rounded">
                </div>
            @endif
            <input type="file" name="cover_image" id="cover_image"
                   class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-100
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-md file:border-0
                   file:text-sm file:font-semibold
                   file:bg-indigo-600 file:text-white
                   hover:file:bg-indigo-700">
        </div>

        <div class="mb-4">
            <label for="gallery_images" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Galeria de imagenes</label>
            <input type="file" name="gallery_images[]" id="gallery_images" multiple
                   class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-100
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-md file:border-0
                   file:text-sm file:font-semibold
                   file:bg-indigo-600 file:text-white
                   hover:file:bg-indigo-700">

            @php
                $existingGallery = old('existing_gallery_images', isset($project) ? ($project->gallery_images ?? []) : []);
            @endphp

            @if (!empty($existingGallery))
                <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-3">
                    @foreach ($existingGallery as $image)
                        <div class="border border-gray-200 dark:border-gray-700 rounded p-2">
                            <img src="{{ $image }}" alt="Imagen de galeria" class="w-full h-auto rounded">
                            <input type="hidden" name="existing_gallery_images[]" value="{{ $image }}">
                            <label class="mt-2 flex items-center space-x-2 text-xs text-gray-700 dark:text-gray-200">
                                <input type="checkbox" name="remove_gallery_images[]" value="{{ $image }}"
                                       class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <span>Eliminar</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de publicacion</label>
                <input type="datetime-local" name="published_at" id="published_at"
                       value="{{ old('published_at', isset($project) && $project->published_at ? $project->published_at->format('Y-m-d\\TH:i') : '') }}"
                       class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                       focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                       text-gray-900 dark:text-gray-100 py-2">
            </div>

            <div>
                <label for="is_active" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado</label>
                <select name="is_active" id="is_active"
                        class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                        focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                        text-gray-900 dark:text-gray-100 py-2">
                    <option value="1" {{ old('is_active', $project->is_active ?? true) ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('is_active', $project->is_active ?? true) ? '' : 'selected' }}>Inactivo</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <label for="is_featured" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Destacado</label>
            <select name="is_featured" id="is_featured"
                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                    focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                    text-gray-900 dark:text-gray-100 py-2">
                <option value="1" {{ old('is_featured', $project->is_featured ?? false) ? 'selected' : '' }}>Si</option>
                <option value="0" {{ old('is_featured', $project->is_featured ?? false) ? '' : 'selected' }}>No</option>
            </select>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Servicios asociados</label>
            <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-2">
                @forelse ($services as $service)
                    <label class="flex items-center space-x-2 text-sm text-gray-700 dark:text-gray-200">
                        <input type="checkbox" name="services[]" value="{{ $service->id }}"
                               {{ in_array($service->id, old('services', isset($project) ? $project->services->pluck('id')->all() : [])) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <span>{{ $service->name }}</span>
                    </label>
                @empty
                    <p class="text-sm text-gray-500 dark:text-gray-400">No hay servicios disponibles.</p>
                @endforelse
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">
                {{ isset($project) ? 'Actualizar Proyecto' : 'Crear Proyecto' }}
            </button>
        </div>
    </form>
</x-layouts.app>
