<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consoles = Console::all();

        return view('admin.consoles.index', compact('consoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Console $console)
    {
        return view('admin.consoles.show', compact('console'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Console $console)
    {
        // Get all color classes
        $color_classes = config('color_classes');

        return view('admin.consoles.edit', compact('console', 'color_classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Console $console)
    {
        $request->validate(
            [
                'name' => 'required|string|max:15',
                'color' => 'required|string|max:15'
            ]
        );

        $data = $request->all();
        $console->update($data);

        return to_route('admin.consoles.show', $console)->with('alert-type', 'success')
            ->with('alert-message', "$console->label updated successfully.")
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
    public function destroy(Console $console)
    {
        //
    }

    public function trash()
    {
        $consoles = Console::onlyTrashed()->get();
        return view('admin.consoles.trash', compact('consoles'));
    }

    /**
     * Restore trashed consoles
     */
    public function restore(string $id)
    {
        $console = Console::onlyTrashed()->findOrFail($id);
        $console->restore();
        return to_route('admin.consoles.show', compact('console'));
    }

    /**
     * Force delete for trashed consoles
     */
    public function drop(string $id)
    {

        $console = Console::onlyTrashed()->findOrFail($id);
        $console->forceDelete();

        return to_route('admin.consoles.trash');
    }
}
