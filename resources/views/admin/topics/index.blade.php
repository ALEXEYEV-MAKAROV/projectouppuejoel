@extends('layouts.app')

@section('title', 'Administrar Temas de Interés')
@section('page-title', 'Temas de Interés')

@section('content')
<div class="bg-white shadow-sm rounded-lg">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Temas de Interés</h2>
        <a href="{{ route('admin.topics.create') }}" class="bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Nuevo Tema
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icono</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título / Descripción</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Enlace</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Orden</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($topics as $topic)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-center">
                        @if($topic->icon_class)
                            <i class="{{ $topic->icon_class }} text-2xl text-gray-600"></i>
                        @else
                            <i class="fas fa-file text-2xl text-gray-400"></i>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $topic->title }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($topic->description, 60) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        @if($topic->resource_url)
                            <a href="{{ $topic->resource_url }}" target="_blank" class="text-gray-600 hover:text-gray-900 text-xs">
                                <i class="fas fa-external-link-alt"></i> Ver recurso
                            </a>
                        @else
                            <span class="text-gray-400 text-xs">Sin enlace</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($topic->is_active)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Activo
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Inactivo
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="text-sm text-gray-900">{{ $topic->sort_order }}</span>
                    </td>
                    <td class="px-6 py-4 text-center text-sm font-medium">
                        <a href="{{ route('admin.topics.edit', $topic->id) }}" 
                           class="text-gray-600 hover:text-gray-900 mr-3">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('admin.topics.destroy', $topic->id) }}" 
                              method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('¿Estás seguro de eliminar este tema?');">
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
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        No hay temas registrados. <a href="{{ route('admin.topics.create') }}" class="text-gray-900 font-semibold">Crear uno nuevo</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $topics->links() }}
    </div>
</div>
@endsection