@extends('layouts.app')

@section('title', 'Crear Tema de Interés')
@section('page-title', 'Nuevo Tema de Interés')

@section('content')
<div class="bg-white shadow-sm rounded-lg">
    <div class="p-6">
        <form action="{{ route('admin.topics.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Título --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Título del Tema *</label>
                <input type="text" name="title" value="{{ old('title') }}" 
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200 @error('title') border-red-500 @enderror" 
                       required>
                @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Icono --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Clase de Icono</label>
                <input type="text" name="icon_class" value="{{ old('icon_class') }}" 
                       placeholder="fas fa-lightbulb"
                       maxlength="100"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                <p class="text-xs text-gray-500 mt-1">
                    Usa Font Awesome, ej: <code class="bg-gray-100 px-1 rounded">fas fa-lightbulb</code>, 
                    <code class="bg-gray-100 px-1 rounded">fas fa-chart-line</code>, 
                    <code class="bg-gray-100 px-1 rounded">fas fa-users</code>
                </p>
                <div class="mt-2 flex items-center space-x-4 text-2xl text-gray-600">
                    <i class="fas fa-lightbulb" title="fas fa-lightbulb"></i>
                    <i class="fas fa-chart-line" title="fas fa-chart-line"></i>
                    <i class="fas fa-users" title="fas fa-users"></i>
                    <i class="fas fa-briefcase" title="fas fa-briefcase"></i>
                    <i class="fas fa-rocket" title="fas fa-rocket"></i>
                    <i class="fas fa-graduation-cap" title="fas fa-graduation-cap"></i>
                    <i class="fas fa-cogs" title="fas fa-cogs"></i>
                </div>
            </div>

            {{-- Descripción --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea name="description" rows="4" 
                          class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">{{ old('description') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Breve descripción del tema de interés</p>
            </div>

            {{-- URL del recurso --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Enlace al Recurso</label>
                <input type="url" name="resource_url" value="{{ old('resource_url') }}" 
                       placeholder="https://..."
                       maxlength="255"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                <p class="text-xs text-gray-500 mt-1">URL opcional a documento, página o recurso relacionado</p>
            </div>

            {{-- Fila: Estado y Orden --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                    <div class="flex items-center space-x-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="1" class="form-radio text-gray-900" checked>
                            <span class="ml-2">Activo</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="0" class="form-radio text-gray-900">
                            <span class="ml-2">Inactivo</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Orden de Aparición</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" 
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                    <p class="text-xs text-gray-500 mt-1">Número menor aparece primero</p>
                </div>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.topics.index') }}" 
                   class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md font-semibold">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white rounded-md font-bold shadow-sm">
                    <i class="fas fa-save mr-1"></i> Guardar Tema
                </button>
            </div>
        </form>
    </div>
</div>
@endsection