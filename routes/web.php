<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\Guest\GuestHomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideogameController;
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

    // Console routes
    Route::resource('/consoles', ConsoleController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
