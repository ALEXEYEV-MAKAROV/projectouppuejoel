@extends('layouts.app')

@section('title', 'Editar Publicación')
@section('page-title', 'Editar Publicación')

@section('content')
<div class="bg-white shadow-sm rounded-lg">
    <div class="p-6">
        <form action="{{ route('admin.publications.update', $publication->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Fila 1: Año y Título --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Año de Publicación *</label>
                    <input type="number" name="publication_year" value="{{ old('publication_year', $publication->publication_year) }}" 
                           min="1900" max="{{ date('Y') + 1 }}"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200 @error('publication_year') border-red-500 @enderror" 
                           required>
                    @error('publication_year') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="md:col-span-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Título de la Publicación *</label>
                    <input type="text" name="title" value="{{ old('title', $publication->title) }}" 
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200 @error('title') border-red-500 @enderror" 
                           required>
                    @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Fila 2: Autores e ISSN --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Autores</label>
                    <input type="text" name="authors" value="{{ old('authors', $publication->authors) }}" 
                           placeholder="Ramírez, J. y Ortíz, A."
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ISSN</label>
                    <input type="text" name="issn" value="{{ old('issn', $publication->issn) }}" 
                           placeholder="0000-0000"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                </div>
            </div>

            {{-- Información de publicación --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Información de Publicación</label>
                <input type="text" name="publication_info" value="{{ old('publication_info', $publication->publication_info) }}" 
                       placeholder="Revista, Editorial, Volumen, Páginas, etc."
                       maxlength="500"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                <p class="text-xs text-gray-500 mt-1">Máximo 500 caracteres</p>
            </div>

            {{-- Descripción --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea name="description" rows="4" 
                          placeholder="Breve descripción del contenido de la publicación..."
                          class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">{{ old('description', $publication->description) }}</textarea>
            </div>

            {{-- Enlaces --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Enlace Principal</label>
                    <input type="url" name="primary_link" value="{{ old('primary_link', $publication->primary_link) }}" 
                           placeholder="https://drive.google.com/..."
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Enlace Alternativo</label>
                    <input type="url" name="secondary_link" value="{{ old('secondary_link', $publication->secondary_link) }}" 
                           placeholder="https://..."
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                </div>
            </div>

            {{-- Fila: Estado y Orden --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                    <div class="flex items-center space-x-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="1" class="form-radio text-gray-900" 
                                   {{ old('is_active', $publication->is_active) == 1 ? 'checked' : '' }}>
                            <span class="ml-2">Activo</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="0" class="form-radio text-gray-900"
                                   {{ old('is_active', $publication->is_active) == 0 ? 'checked' : '' }}>
                            <span class="ml-2">Inactivo</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Orden de Aparición</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $publication->sort_order) }}" 
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                    <p class="text-xs text-gray-500 mt-1">Dentro del mismo año</p>
                </div>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.publications.index') }}" 
                   class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md font-semibold">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white rounded-md font-bold shadow-sm">
                    <i class="fas fa-save mr-1"></i> Actualizar Publicación
                </button>
            </div>
        </form>
    </div>
</div>
@endsection