<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManzanasController;


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

Route::get('/mostrar', function () {
    return view('mostrar');
})->middleware(['auth', 'verified'])->name('mostrar');


//Ver tabla
Route::get('/mostrar', [ManzanasController::class, 'show'])->name('mostar');

//Insertar
Route::get('/insertar', function () {
    return view('insertar');
})->middleware(['auth', 'verified'])->name('insertar');

Route::post('/insertar', [ManzanasController::class, 'store'])->name('insertar');

//Eliminar 
Route::delete('/mostrar{manzanas}', [ManzanasController::class, 'destroy'])->name('manzana.eliminar');

//Modificar
Route::get('/mostrar{manzanas}/editar', [ManzanasController::class, 'edit'])->name('manzana.editar');
Route::put('/mostrar{manzanas}', [ManzanasController::class, 'update'])->name('manzana.actualizar');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
