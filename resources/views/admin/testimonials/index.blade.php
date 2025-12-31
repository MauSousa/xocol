<x-layouts.app>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Testimonios</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            Gestion de testimonios disponibles en el panel.
        </p>
    </div>

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.testimonials.create') }}"
           class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">
            Crear Testimonio
        </a>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Autor</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Cargo</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Avatar</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Rating</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Estado</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Orden</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($testimonials as $testimonial)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $testimonial->author_name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                            {{ $testimonial->author_title ?: 'Sin cargo' }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                            @if ($testimonial->avatar_url)
                                <img src="{{ $testimonial->avatar_url }}" alt="Avatar"
                                    class="w-12 h-12 rounded-full object-cover">
                            @else
                                <span class="text-xs text-gray-500">Sin imagen</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $testimonial->rating }}</td>
                        <td class="px-4 py-3 text-sm">
                            @if ($testimonial->is_active)
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Activo</span>
                            @else
                                <span class="px-2 py-1 bg-gray-200 text-gray-800 rounded-full text-xs font-medium">Inactivo</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $testimonial->sort_order }}</td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium mr-4">Editar</a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium"
                                    onclick="return confirm('Estas seguro de que deseas eliminar este testimonio?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-sm text-gray-600 dark:text-gray-400">
                            No hay testimonios registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
