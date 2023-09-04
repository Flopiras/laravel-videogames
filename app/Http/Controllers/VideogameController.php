<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videogames = Videogame::all();

        return view('admin.videogames.index', compact('videogames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $videogame = new Videogame();
        return view('admin.videogames.create', compact('videogame'));
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
            ->with('alert-message', "$videogame->title created successfully.");
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
        return view('admin.videogames.edit', compact('videogame'));
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

        return to_route('admin.videogames.show', compact('videogame'))->with('alert-type', 'success')->with('alert-message', "$videogame->title updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        $videogame->delete();

        return to_route('admin.videogames.index')
            ->with('alert-type', 'success')
            ->with('alert-message', "$videogame->title deleted successfully.");
    }
}
