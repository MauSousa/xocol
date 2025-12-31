<x-layouts.app>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
            {{ isset($testimonial) ? 'Editar Testimonio' : 'Crear Testimonio' }}
        </h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            {{ isset($testimonial) ? 'Actualiza la informacion del testimonio.' : 'Completa el formulario para crear un nuevo testimonio.' }}
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
        action="{{ isset($testimonial) ?
            route('admin.testimonials.update', $testimonial) :
            route('admin.testimonials.store')
        }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        @csrf

        @if (isset($testimonial))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="author_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Autor</label>
            <input type="text" name="author_name" id="author_name" value="{{ old('author_name', $testimonial->author_name ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100 py-2">
        </div>

        <div class="mb-4">
            <label for="author_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cargo</label>
            <input type="text" name="author_title" id="author_title" value="{{ old('author_title', $testimonial->author_title ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100 py-2">
        </div>

        <div class="mb-4">
            <label for="quote" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Testimonio</label>
            <textarea name="quote" id="quote" rows="4"
                      class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                      focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                      text-gray-900 dark:text-gray-100 py-2">{{ old('quote', $testimonial->quote ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="avatar_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Avatar</label>
            <input type="file" name="avatar_url" id="avatar_url" accept="image/*"
                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                   focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                   text-gray-900 dark:text-gray-100 py-2">
            @if (isset($testimonial) && $testimonial->avatar_url)
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                    Imagen actual:
                </p>
                <img src="{{ $testimonial->avatar_url }}" alt="Avatar actual"
                    class="mt-2 w-16 h-16 rounded-full object-cover">
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rating</label>
                <select name="rating" id="rating"
                        class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                        focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                        text-gray-900 dark:text-gray-100 py-2">
                    @for ($value = 1; $value <= 5; $value++)
                        <option value="{{ $value }}" {{ old('rating', $testimonial->rating ?? 5) == $value ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endfor
                </select>
            </div>

            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Orden</label>
                <input type="number" name="sort_order" id="sort_order" min="0"
                       value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}"
                       class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                       focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                       text-gray-900 dark:text-gray-100 py-2">
            </div>
        </div>

        <div class="mt-4">
            <label for="is_active" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado</label>
            <select name="is_active" id="is_active"
                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm
                    focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-700
                    text-gray-900 dark:text-gray-100 py-2">
                <option value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('is_active', $testimonial->is_active ?? true) ? '' : 'selected' }}>Inactivo</option>
            </select>
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">
                {{ isset($testimonial) ? 'Actualizar Testimonio' : 'Crear Testimonio' }}
            </button>
        </div>
    </form>
</x-layouts.app>
