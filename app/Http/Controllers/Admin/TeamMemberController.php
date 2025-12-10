<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('sort_order')->paginate(10);
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'area' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'orcid_url' => 'nullable|url|max:255',
            'researcher_id' => 'nullable|string|max:100',
            'profile_body' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        // Generar slug único
        $validated['slug'] = Str::slug($validated['name']);
        
        // Verificar si el slug ya existe y añadir número si es necesario
        $count = 1;
        $originalSlug = $validated['slug'];
        while (TeamMember::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count;
            $count++;
        }

        // Manejar la subida de la foto
        if ($request->hasFile('photo')) {
            $validated['photo_path'] = $request->file('photo')->store('team-photos', 'public');
        }

        // Remover 'photo' del array ya que no está en la tabla
        unset($validated['photo']);

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')
                        ->with('success', 'Miembro del equipo creado exitosamente');
    }

    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('admin.team.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'area' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'orcid_url' => 'nullable|url|max:255',
            'researcher_id' => 'nullable|string|max:100',
            'profile_body' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        // Actualizar slug si el nombre cambió
        if ($validated['name'] !== $member->name) {
            $newSlug = Str::slug($validated['name']);
            
            // Verificar si el slug ya existe (excluyendo el miembro actual)
            $count = 1;
            $originalSlug = $newSlug;
            while (TeamMember::where('slug', $newSlug)->where('id', '!=', $id)->exists()) {
                $newSlug = $originalSlug . '-' . $count;
                $count++;
            }
            
            $validated['slug'] = $newSlug;
        }

        // Manejar la subida de nueva foto
        if ($request->hasFile('photo')) {
            // Eliminar foto anterior si existe
            if ($member->photo_path) {
                \Storage::disk('public')->delete($member->photo_path);
            }
            
            $validated['photo_path'] = $request->file('photo')->store('team-photos', 'public');
        }

        // Remover 'photo' del array ya que no está en la tabla
        unset($validated['photo']);

        $member->update($validated);

        return redirect()->route('admin.team.index')
                        ->with('success', 'Miembro actualizado exitosamente');
    }

    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);
        
        // Eliminar foto si existe
        if ($member->photo_path) {
            \Storage::disk('public')->delete($member->photo_path);
        }
        
        $member->delete();

        return redirect()->route('admin.team.index')
                        ->with('success', 'Miembro eliminado exitosamente');
    }
}