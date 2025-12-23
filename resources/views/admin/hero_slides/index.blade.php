<x-layouts.app>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Hero Slides</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            Gestión de hero slides.
        </p>
    </div>

    {{-- Botón para crear proyecto --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.hero_slides.form') }}"
           class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">
            Crear Hero Slide
        </a>
    </div>

    {{-- Tabla de Proyectos --}}
    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Título</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Imagen</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">CTA</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Status</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($heroSlides as $slide)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $slide->title }}</td>
                        <td class="px-4 py-3">
                            <img src="{{ $slide->image_path }}" alt="Imagen del Hero Slide" class="w-24 h-auto rounded">
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                            {{ $slide->cta_text }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                {{ $slide->is_active ?? 'Activo' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('admin.hero_slides.edit', $slide) }}"
                                class="text-indigo-600 hover:text-indigo-800 font-medium mr-4"
                            >
                                Editar
                            </a>
                            <form
                                action="{{ route('admin.hero_slides.destroy', $slide) }}"
                                method="POST"
                                class="inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este hero slide?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>