@extends('layouts.app')

@section('title', 'Editar Miembro del Equipo')
@section('page-title', 'Editar Miembro del Equipo')

@section('content')
<div class="bg-white shadow-sm rounded-lg">
    <div class="p-6">
        <form action="{{ route('admin.team.update', $member->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Fila 1: Nombre y Área --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo *</label>
                    <input type="text" name="name" value="{{ old('name', $member->name) }}" 
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200 @error('name') border-red-500 @enderror" 
                           required>
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Área de Especialización</label>
                    <input type="text" name="area" value="{{ old('area', $member->area) }}" 
                           placeholder="Ej: Administración y Mercadotecnia"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                </div>
            </div>

            {{-- Fila 2: Institución y Email --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Institución</label>
                    <input type="text" name="institution" value="{{ old('institution', $member->institution) }}" 
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ old('email', $member->email) }}" 
                           placeholder="ejemplo@uppuebla.edu.mx"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                </div>
            </div>

            {{-- Fila 3: ORCID y Researcher ID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ORCID URL</label>
                    <input type="url" name="orcid_url" value="{{ old('orcid_url', $member->orcid_url) }}" 
                           placeholder="https://orcid.org/0000-0000-0000-0000"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Researcher ID</label>
                    <input type="text" name="researcher_id" value="{{ old('researcher_id', $member->researcher_id) }}" 
                           placeholder="L-0000-2018"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                </div>
            </div>

            {{-- Extracto (descripción corta) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción Corta</label>
                <input type="text" name="excerpt" value="{{ old('excerpt', $member->excerpt) }}" 
                       placeholder="Especialista en MyPE's y mercadotecnia de servicios"
                       maxlength="255"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                <p class="text-xs text-gray-500 mt-1">Máximo 255 caracteres</p>
            </div>

            {{-- Perfil completo (textarea) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Perfil Académico Completo</label>
                <textarea name="profile_body" rows="6" 
                          class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">{{ old('profile_body', $member->profile_body) }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Puedes usar HTML básico aquí</p>
            </div>

            {{-- Foto actual y nueva --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fotografía</label>
                
                @if($member->photo_path)
                    <div class="mb-3">
                        <p class="text-sm text-gray-600 mb-2">Foto actual:</p>
                        <img src="{{ asset('storage/' . $member->photo_path) }}" 
                             class="w-32 h-32 rounded-lg object-cover shadow-sm" 
                             alt="{{ $member->name }}">
                    </div>
                @endif

                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 transition">
                    <div class="space-y-1 text-center">
                        <i class="fas fa-camera text-4xl text-gray-400"></i>
                        <div class="flex text-sm text-gray-600">
                            <label for="photo" class="relative cursor-pointer bg-white rounded-md font-medium text-gray-900 hover:text-gray-700 focus-within:outline-none">
                                <span>Cambiar Fotografía</span>
                                <input id="photo" name="photo" type="file" class="sr-only" accept="image/*">
                            </label>
                            <p class="pl-1">o arrastrar aquí</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, WEBP hasta 2MB (opcional)</p>
                    </div>
                </div>
                @error('photo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            {{-- Fila 4: Estado y Orden --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado</label>
                    <div class="flex items-center space-x-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="1" class="form-radio text-gray-900" 
                                   {{ old('is_active', $member->is_active) == 1 ? 'checked' : '' }}>
                            <span class="ml-2">Activo</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="0" class="form-radio text-gray-900"
                                   {{ old('is_active', $member->is_active) == 0 ? 'checked' : '' }}>
                            <span class="ml-2">Inactivo</span>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Orden de Aparición</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $member->sort_order) }}" 
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-gray-900 focus:ring focus:ring-gray-200">
                    <p class="text-xs text-gray-500 mt-1">Número menor aparece primero</p>
                </div>
            </div>

            {{-- Botones --}}
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.team.index') }}" 
                   class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md font-semibold">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-gray-900 hover:bg-gray-800 text-white rounded-md font-bold shadow-sm">
                    <i class="fas fa-save mr-1"></i> Actualizar Miembro
                </button>
            </div>
        </form>
    </div>
</div>
@endsection