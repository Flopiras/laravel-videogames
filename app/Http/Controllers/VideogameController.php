<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\Publisher;
use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_value = $request->title;
        if ($search_value) {
            $filtered_videogames = $request->query('title');
            $videogames = Videogame::where('title', 'LIKE', "%$filtered_videogames%")->get();
        } else $videogames = Videogame::all();

        return view('admin.videogames.index', compact('videogames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $videogame = new Videogame();
        $publishers = Publisher::all();
        $consoles = Console::select('id', 'name')->get();
        return view('admin.videogames.create', compact('videogame', 'publishers', 'consoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|max:50',
                'description' => 'nullable|string',
                'year' => 'nullable|numeric',
                'cover' => 'nullable|url'
            ]
        );

        $data = $request->all();
        $videogame = new Videogame();
        $videogame->fill($data);
        $videogame->save();

        return to_route('admin.videogames.index')
            ->with('alert-type', 'success')
            ->with('alert-message', "$videogame->title created successfully.")
            ->with('toast', [
                'owner' => 'System',
                'message' => 'Created Successfully',
                'timestamp' => now(),
                'action' => 'go_to_list',
                'action-route' => route('admin.videogames.show', $videogame)
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        return view('admin.videogames.show', compact('videogame'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {
        $publishers = Publisher::all();
        $consoles = Console::select('id', 'name')->get();

        return view('admin.videogames.edit', compact('videogame', 'publishers', 'consoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $request->validate(
            [
                'title' => 'required|string|max:50',
                'description' => 'nullable|string',
                'year' => 'nullable|numeric',
                'cover' => 'nullable|url'
            ]
        );

        $data = $request->all();
        $videogame->update($data);
        return to_route('admin.videogames.show', $videogame)
            ->with('alert-type', 'success')
            ->with('alert-message', "$videogame->title updated successfully.")
            ->with('toast', [
                'owner' => 'System',
                'message' => 'Updated Successfully',
                'timestamp' => now(),
                'action' => ''
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        $videogame->delete();

        return to_route('admin.videogames.index')
            ->with('alert-type', 'success')
            ->with('alert-message', "$videogame->title deleted successfully.")
            ->with('toast', [
                'owner' => 'System',
                'message' => 'Deleted Successfully',
                'timestamp' => now(),
                'action' => 'restore',
                'action-route' => route('admin.videogames.restore', $videogame)
            ]);
    }

    public function trash()
    {
        $videogames = Videogame::onlyTrashed()->get();
        return view('admin.videogames.trash', compact('videogames'));
    }

    /**
     * Restore trashed videogames
     */
    public function restore(string $id)
    {
        $videogame = Videogame::onlyTrashed()->findOrFail($id);
        $videogame->restore();
        return to_route('admin.videogames.show', compact('videogame'));
    }

    public function drop(string $id)
    {

        $videogame = Videogame::onlyTrashed()->findOrFail($id);
        $videogame->forceDelete();

        return to_route('admin.videogames.trash');
    }
}
