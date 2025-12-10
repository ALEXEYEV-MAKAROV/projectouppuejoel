@extends('layouts.app')

@section('title', 'Editar Tema de Interés')
@section('page-title', 'Editar Tema de Interés')

@section('content')
<div class="bg-white shadow-sm rounded-lg">
    <div class="p-6">
        <form action="{{ route('admin.topics.update', $topic->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Título --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Título del Tema *</label>
                <input type="text" name="title" value="{{ old('title', $topic->title) }}" 
                       placeholder="Implementación de sistema ERP en las PyME's"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200 @error('title') border-red-500 @enderror" 
                       required>
                @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Icono --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Clase de Icono</label>
                <input type="text" name="icon_class" value="{{ old('icon_class', $topic->icon_class) }}" 
                       placeholder="mai-code-outline"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                <p class="text-xs text-gray-500 mt-1">
                    Ejemplos: <code>mai-code-outline</code>, <code>mai-people-outline</code>, <code>mai-cart-outline</code>, etc.
                    <br>Ver iconos: <a href="https://iconify.design/icon-sets/majesticons/" target="_blank" class="text-gray-900 underline">MajesticIcons</a>
                </p>
            </div>

            {{-- Descripción --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea name="description" rows="3" 
                          placeholder="Guía sobre la implementación de sistemas de planificación..."
                          class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">{{ old('description', $topic->description) }}</textarea>
            </div>

            {{-- URL del recurso --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Enlace al Recurso</label>
                <input type="url" name="resource_url" value="{{ old('resource_url', $topic->resource_url) }}" 
                       placeholder="https://drive.google.com/file/..."
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                <p class="text-xs text-gray-500 mt-1">URL completa al documento, presentación o recurso</p>
            </div>

            {{-- Fila: Estado y Orden --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                    <div class="flex items-center space-x-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="1" class="form-radio text-gray-900" 
                                   {{ old('is_active', $topic->is_active) == 1 ? 'checked' : '' }}>
                            <span class="ml-2">Activo</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="0" class="form-radio text-gray-900"
                                   {{ old('is_active', $topic->is_active) == 0 ? 'checked' : '' }}>
                            <span class="ml-2">Inactivo</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Orden de Aparición</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $topic->sort_order) }}" 
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
                    <i class="fas fa-save mr-1"></i> Actualizar Tema
                </button>
            </div>
        </form>
    </div>
</div>
@endsection