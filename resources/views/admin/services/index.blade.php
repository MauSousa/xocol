<x-layouts.app>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Servicios</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            Gestión de servicios disponibles en el panel.
        </p>
    </div>

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.services.create') }}"
           class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">
            Crear Servicio
        </a>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Slug</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Proyectos</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Estado</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Orden</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($services as $service)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $service->name }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $service->slug }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                            {{ $service->projects->pluck('title')->join(', ') ?: 'Sin asignar' }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if ($service->is_active)
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Activo</span>
                            @else
                                <span class="px-2 py-1 bg-gray-200 text-gray-800 rounded-full text-xs font-medium">Inactivo</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $service->sort_order }}</td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('admin.services.edit', $service) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium mr-4">Editar</a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este servicio?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-sm text-gray-600 dark:text-gray-400">
                            No hay servicios registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
