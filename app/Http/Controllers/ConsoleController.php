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
        //
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
        //
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
}
