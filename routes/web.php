<?php

use App\Http\Controllers\ManzanasController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\ManzanasEliminadas;
use App\Models\Manzanas;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/manzanas', [ManzanasController::class, 'show'])->name('manzanas');
    Route::get('/insertar.manzana', function () {
        return view('insertar-manzana');
    });
    Route::post('/insertar.manzana', [ManzanasController::class, 'store'])->name('insertar.manzana');
    Route::get('/manzanas/{manzana}/editar', [ManzanasController::class, 'edit'])->name('manzanas.editar');
    Route::put('/manzanas', [ManzanasController::class, 'update'])->name('manzanas.actualizar');
    Route::delete('/manzanas', [ManzanasController::class, 'destroy'])->name('manzanas.eliminar'); //->middleware(ManzanasEliminadas::class, Manzanas::class);
});

require __DIR__ . '/auth.php';
