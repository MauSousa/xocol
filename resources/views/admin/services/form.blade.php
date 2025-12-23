<x-layouts.app>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            {{ isset($service) ? 'Editar Servicio' : 'Crear Servicio' }}
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            {{ isset($service) ? 'Actualiza la información del servicio.' : 'Completa el formulario para crear un nuevo servicio.' }}
        </p>
    </div>

    @if ($errors->any())
        <div class="mb-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Error!</strong>
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
        action="{{ isset($service) ?
            route('admin.services.update', $service) :
            route('admin.services.store')
        }}"
        method="POST"
        class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        @csrf

        @if (isset($service))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name', $service->name ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100 py-2">
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $service->slug ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100 py-2">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descripción</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                      focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                      text-gray-900 dark:text-gray-100 py-2">{{ old('description', $service->description ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="icon" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Icono</label>
            <input type="text" name="icon" id="icon" value="{{ old('icon', $service->icon ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100 py-2">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Orden</label>
                <input type="number" name="sort_order" id="sort_order" min="0"
                       value="{{ old('sort_order', $service->sort_order ?? 0) }}"
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
                    <option value="1" {{ old('is_active', $service->is_active ?? true) ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('is_active', $service->is_active ?? true) ? '' : 'selected' }}>Inactivo</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Proyectos relacionados</label>
            <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-2">
                @forelse ($projects as $project)
                    <label class="flex items-center space-x-2 text-sm text-gray-700 dark:text-gray-200">
                        <input type="checkbox" name="projects[]" value="{{ $project->id }}"
                               {{ in_array($project->id, old('projects', isset($service) ? $service->projects->pluck('id')->all() : [])) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <span>{{ $project->title }}</span>
                    </label>
                @empty
                    <p class="text-sm text-gray-500 dark:text-gray-400">No hay proyectos disponibles.</p>
                @endforelse
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">
                {{ isset($service) ? 'Actualizar Servicio' : 'Crear Servicio' }}
            </button>
        </div>
    </form>
</x-layouts.app>
