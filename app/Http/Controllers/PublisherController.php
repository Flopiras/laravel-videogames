<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_value = $request->label;
        if ($search_value) {
            $filtered_publishers = $request->query('label');
            $publishers = Publisher::where('label', 'LIKE', "%$filtered_publishers%")->get();
        } else $publishers = Publisher::all();

        return view('admin.publishers.index', compact('publishers', 'search_value'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publisher = new Publisher();

        // Get all color classes
        $color_classes = config('color_classes');

        return view('admin.publishers.create', compact('publisher', 'color_classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $publisher = new Publisher();

        $publisher->fill($data);
        $publisher->save();

        return to_route('admin.publishers.show', compact('publisher'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return view('admin.publishers.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        // Get all color classes
        $color_classes = config('color_classes');

        return view('admin.publishers.edit', compact('publisher', 'color_classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $data = $request->all();
        $publisher->update($data);

        return to_route('admin.publishers.show', $publisher)->with('alert-type', 'success')
            ->with('alert-message', "$publisher->label updated successfully.")
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
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return to_route('admin.publishers.index')
            ->with('alert-type', 'success')
            ->with('alert-message', "$publisher->label deleted successfully.")
            ->with('toast', [
                'owner' => 'System',
                'message' => 'Deleted Successfully',
                'timestamp' => now(),
                'action' => 'restore',
                'action-route' => route('admin.publishers.restore', $publisher)
            ]);
    }

    public function trash()
    {
        $publishers = Publisher::onlyTrashed()->get();
        return view('admin.publishers.trash', compact('publishers'));
    }

    /**
     * Restore trashed publishers
     */
    public function restore(string $id)
    {
        $publisher = Publisher::onlyTrashed()->findOrFail($id);
        $publisher->restore();
        return to_route('admin.publishers.show', compact('publisher'));
    }

    public function drop(string $id)
    {

        $publisher = Publisher::onlyTrashed()->findOrFail($id);
        $publisher->forceDelete();

        return to_route('admin.publishers.trash');
    }
}
