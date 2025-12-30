<x-layouts.app>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Proyectos</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-1">
            Gestion de proyectos del sitio.
        </p>
    </div>

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.projects.create') }}"
           class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">
            Crear Proyecto
        </a>
    </div>

    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Titulo</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Slug</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Servicios</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Estado</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Destacado</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Publicacion</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 dark:text-gray-300">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($projects as $project)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $project->title }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">{{ $project->slug }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                            {{ $project->services->pluck('name')->join(', ') ?: 'Sin asignar' }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if ($project->is_active)
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Activo</span>
                            @else
                                <span class="px-2 py-1 bg-gray-200 text-gray-800 rounded-full text-xs font-medium">Inactivo</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if ($project->is_featured)
                                <span class="px-2 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-medium">Destacado</span>
                            @else
                                <span class="text-gray-600 dark:text-gray-300 text-xs">No</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                            {{ $project->published_at ? $project->published_at->format('Y-m-d H:i') : 'Sin fecha' }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('admin.projects.edit', $project) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium mr-4">Editar</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium"
                                    onclick="return confirm('Seguro que deseas eliminar este proyecto?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-sm text-gray-600 dark:text-gray-400">
                            No hay proyectos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
