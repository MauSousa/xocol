<x-layouts.app>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            {{ isset($heroSlide) ? 'Editar Hero Slide' : 'Crear Hero Slide' }}
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            {{ isset($heroSlide) ? 'Editar los detalles del hero slide.' : 'Rellena el formulario para crear un nuevo hero slide.' }}
        </p>
    </div>

    {{-- Errors --}}
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

    <form action="{{ isset($heroSlide) ?
            route('admin.hero_slides.update', $heroSlide) :
            route('admin.hero_slides.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white dark:bg-gray-800 shadow rounded-lg p-6"
    >
        @csrf

        @if (isset($heroSlide))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title', $heroSlide->title ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100  py-2">
        </div>

        <div class="mb-4">
            <label for="image_path" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen</label>
            <input type="file" name="image_path" id="image_path"
                   class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-100
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-md file:border-0
                   file:text-sm file:font-semibold
                   file:bg-indigo-600 file:text-white
                   hover:file:bg-indigo-700"
                   required>
        </div>

        <div class="mb-4">
            <label for="cta_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Texto del CTA</label>
            <input
                type="text"
                name="cta_text"
                id="cta_text"
                value="{{ old('cta_text', $heroSlide->cta_text ?? '') }}"
                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100 py-2"
                >
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
            <select
                name="status"
                id="status"
                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100 py-2"
            >
                <option value="active" {{ old('status', $heroSlide->status ?? '') == 'active' ? 'selected' : '' }}>Activo</option>
                <option value="inactive" {{ old('status', $heroSlide->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">
                {{ isset($heroSlide) ? 'Actualizar Hero Slide' : 'Crear Hero Slide' }}
            </button>
        </div>
</x-layouts.app>