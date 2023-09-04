<?php

namespace App\Http\Controllers\Guest;

use App\Models\Videogame;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestHomeController extends Controller
{
    public function index()
    {
        $videogames = Videogame::all();

        return view('guest.home', compact('videogames'));
    }
}
