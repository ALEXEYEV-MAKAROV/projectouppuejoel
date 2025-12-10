@extends('layouts.app')

@section('title', 'Administrar Equipo')
@section('page-title', 'Equipo Académico')

@section('content')
<div class="bg-white shadow-sm rounded-lg">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Miembros del Equipo</h2>
        <a href="{{ route('admin.team.create') }}" class="bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Nuevo Miembro
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre / Área</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Institución</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Orden</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($members as $member)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($member->photo_path)
                            <img src="{{ asset('storage/' . $member->photo_path) }}" 
                                 class="h-12 w-12 rounded-full object-cover" 
                                 alt="{{ $member->name }}">
                        @else
                            <div class="h-12 w-12 rounded-full bg-gray-300 flex items-center justify-center">
                                <i class="fas fa-user text-gray-500"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $member->name }}</div>
                        <div class="text-sm text-gray-500">{{ $member->area }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $member->institution ?? 'N/A' }}</div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($member->is_active)
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
                        <span class="text-sm text-gray-900">{{ $member->sort_order }}</span>
                    </td>
                    <td class="px-6 py-4 text-center text-sm font-medium">
                        <a href="{{ route('admin.team.edit', $member->id) }}" 
                           class="text-gray-600 hover:text-gray-900 mr-3">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('admin.team.destroy', $member->id) }}" 
                              method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('¿Estás seguro de eliminar este miembro?');">
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
                        No hay miembros registrados. <a href="{{ route('admin.team.create') }}" class="text-gray-900 font-semibold">Crear uno nuevo</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $members->links() }}
    </div>
</div>
@endsection