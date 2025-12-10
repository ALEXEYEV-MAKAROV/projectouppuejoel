<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::orderBy('publication_year', 'desc')
                                   ->orderBy('sort_order')
                                   ->paginate(10);
        return view('admin.publications.index', compact('publications'));
    }

    public function create()
    {
        return view('admin.publications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'publication_year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'title' => 'required|string|max:255',
            'authors' => 'nullable|string|max:255',
            'publication_info' => 'nullable|string|max:500',
            'issn' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'primary_link' => 'nullable|url|max:255',
            'secondary_link' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        Publication::create($validated);

        return redirect()->route('admin.publications.index')
                        ->with('success', 'Publicación creada exitosamente');
    }

    public function edit($id)
    {
        $publication = Publication::findOrFail($id);
        return view('admin.publications.edit', compact('publication'));
    }

    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);

        $validated = $request->validate([
            'publication_year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'title' => 'required|string|max:255',
            'authors' => 'nullable|string|max:255',
            'publication_info' => 'nullable|string|max:500',
            'issn' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'primary_link' => 'nullable|url|max:255',
            'secondary_link' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $publication->update($validated);

        return redirect()->route('admin.publications.index')
                        ->with('success', 'Publicación actualizada exitosamente');
    }

    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();

        return redirect()->route('admin.publications.index')
                        ->with('success', 'Publicación eliminada exitosamente');
    }
}