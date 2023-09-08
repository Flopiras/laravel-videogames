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
        //
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
        $publisher->save();

        return to_route('admin.publishers.show', compact('publisher'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('admin.publishers.edit', compact('publisher'));
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
        //
    }
}
