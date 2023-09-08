<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\Guest\GuestHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\VideogameController;
use App\Models\Console;
use App\Models\Videogame;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestHomeController::class, 'index'])->name('guest.home');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {

    Route::get('/', [AdminHomeController::class, 'index'])->name('home');
    Route::get('/videogames/trash', [VideogameController::class, 'trash'])->name('videogames.trash'); //rotta per il cestino
    Route::delete('/videogames/trash/{videogame}/drop', [VideogameController::class, 'drop'])->name('videogames.drop'); //rotta per il cestino
    Route::patch('/videogames/trash/{videogame}/restore', [VideogameController::class, 'restore'])->name('videogames.restore'); //rotta per il restore
    Route::resource('/videogames', VideogameController::class);

    // Publisher routes
    Route::get('/publishers/trash', [PublisherController::class, 'trash'])->name('publishers.trash'); //rotta per il cestino
    Route::resource('/publishers', PublisherController::class);
    Route::delete('/publishers/trash/{publisher}/drop', [PublisherController::class, 'drop'])->name('publishers.drop'); //rotta per il cestino
    Route::patch('/publishers/trash/{publisher}/restore', [PublisherController::class, 'restore'])->name('publishers.restore'); //rotta per il restore


    Route::get('/consoles/trash', [ConsoleController::class, 'trash'])->name('consoles.trash'); //rotta per il cestino
    // Console routes
    Route::resource('/consoles', ConsoleController::class);
    Route::delete('/consoles/trash/{console}/drop', [ConsoleController::class, 'drop'])->name('consoles.drop'); //rotta per il cestino
    Route::patch('/consoles/trash/{console}/restore', [ConsoleController::class, 'restore'])->name('consoles.restore'); //rotta per il restore

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
