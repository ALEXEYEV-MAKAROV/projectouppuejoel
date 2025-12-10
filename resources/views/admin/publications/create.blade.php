@extends('layouts.app')

@section('title', 'Crear Publicación')
@section('page-title', 'Nueva Publicación Académica')

@section('content')
<div class="bg-white shadow-sm rounded-lg">
    <div class="p-6">
        <form action="{{ route('admin.publications.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Fila 1: Año y Título --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Año de Publicación *</label>
                    <input type="number" name="publication_year" value="{{ old('publication_year', date('Y')) }}" 
                           min="1900" max="2100"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200 @error('publication_year') border-red-500 @enderror" 
                           required>
                    @error('publication_year') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="md:col-span-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Título de la Publicación *</label>
                    <input type="text" name="title" value="{{ old('title') }}" 
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200 @error('title') border-red-500 @enderror" 
                           required>
                    @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Fila 2: Autores --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Autores</label>
                <input type="text" name="authors" value="{{ old('authors') }}" 
                       placeholder="García-Pérez, J., López, M., Rodríguez, A."
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                <p class="text-xs text-gray-500 mt-1">Separa los nombres con comas</p>
            </div>

            {{-- Fila 3: Información de publicación e ISSN --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Información de Publicación</label>
                    <input type="text" name="publication_info" value="{{ old('publication_info') }}" 
                           placeholder="Revista Académica, Vol. 12, No. 3, pp. 45-67"
                           maxlength="500"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                    <p class="text-xs text-gray-500 mt-1">Revista, volumen, páginas, etc.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ISSN</label>
                    <input type="text" name="issn" value="{{ old('issn') }}" 
                           placeholder="1234-5678"
                           maxlength="50"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                </div>
            </div>

            {{-- Descripción --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción / Resumen</label>
                <textarea name="description" rows="4" 
                          class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">{{ old('description') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Breve resumen de la publicación</p>
            </div>

            {{-- Fila 4: Enlaces --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-link text-gray-500"></i> Enlace Principal
                    </label>
                    <input type="url" name="primary_link" value="{{ old('primary_link') }}" 
                           placeholder="https://doi.org/10.1234/ejemplo"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                    <p class="text-xs text-gray-500 mt-1">DOI, URL del artículo, etc.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-link text-gray-500"></i> Enlace Secundario
                    </label>
                    <input type="url" name="secondary_link" value="{{ old('secondary_link') }}" 
                           placeholder="https://repositorio.ejemplo.com/123"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                    <p class="text-xs text-gray-500 mt-1">Repositorio, versión alternativa, etc.</p>
                </div>
            </div>

            {{-- Fila 5: Estado y Orden --}}
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
                <a href="{{ route('admin.publications.index') }}" 
                   class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md font-semibold">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white rounded-md font-bold shadow-sm">
                    <i class="fas fa-save mr-1"></i> Guardar Publicación
                </button>
            </div>
        </form>
    </div>
</div>
@endsection