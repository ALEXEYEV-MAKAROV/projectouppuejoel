@extends('layouts.app')

@section('title', 'Administrar Publicaciones')
@section('page-title', 'Publicaciones Académicas')

@section('content')
<div class="bg-white shadow-sm rounded-lg">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Publicaciones</h2>
        <a href="{{ route('admin.publications.create') }}" class="bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Nueva Publicación
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Año</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título / Autores</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ISSN</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($publications as $publication)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-lg font-bold text-gray-900">{{ $publication->publication_year }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ Str::limit($publication->title, 80) }}</div>
                        <div class="text-sm text-gray-500">{{ $publication->authors }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-sm text-gray-900">{{ $publication->issn ?? 'N/A' }}</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($publication->is_active)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Activo
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Inactivo
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center text-sm font-medium">
                        <a href="{{ route('admin.publications.edit', $publication->id) }}" 
                           class="text-gray-600 hover:text-gray-900 mr-3">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('admin.publications.destroy', $publication->id) }}" 
                              method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('¿Estás seguro de eliminar esta publicación?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        No hay publicaciones registradas. <a href="{{ route('admin.publications.create') }}" class="text-gray-900 font-semibold">Crear una nueva</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $publications->links() }}
    </div>
</div>
@endsection