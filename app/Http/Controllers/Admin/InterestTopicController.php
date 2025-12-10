<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InterestTopic;
use Illuminate\Http\Request;

class InterestTopicController extends Controller
{
    public function index()
    {
        $topics = InterestTopic::orderBy('sort_order')->paginate(10);
        return view('admin.topics.index', compact('topics'));
    }

    public function create()
    {
        return view('admin.topics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'resource_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        InterestTopic::create($validated);

        return redirect()->route('admin.topics.index')
                        ->with('success', 'Tema de interés creado exitosamente');
    }

    public function edit($id)
    {
        $topic = InterestTopic::findOrFail($id);
        return view('admin.topics.edit', compact('topic'));
    }

    public function update(Request $request, $id)
    {
        $topic = InterestTopic::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'resource_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer'
        ]);

        $topic->update($validated);

        return redirect()->route('admin.topics.index')
                        ->with('success', 'Tema actualizado exitosamente');
    }

    public function destroy($id)
    {
        $topic = InterestTopic::findOrFail($id);
        $topic->delete();

        return redirect()->route('admin.topics.index')
                        ->with('success', 'Tema eliminado exitosamente');
    }
}