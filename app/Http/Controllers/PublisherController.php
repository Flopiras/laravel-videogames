<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return to_route('admin.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $publisher = new Publisher();

        $publisher->fill($data);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        //
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
