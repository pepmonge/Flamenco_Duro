<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', InicioController::class)->name('inicio');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';

Route::get('flamenco', [ArticuloController::class, 'index'])->name('flamenco.index');

Route::get('flamenco/create', [ArticuloController::class, 'create'])->middleware(['auth', 'verified'])->name('flamenco.create');

Route::get('flamenco/{articulo}', [ArticuloController::class, 'show'])->name('flamenco.show');

Route::post('flamenco', [ArticuloController::class, 'store'])->middleware(['auth'])->name('flamenco.store');

Route::get('flamenco/{articulo}/edit', [ArticuloController::class, 'edit'])->middleware(['auth', 'verified'])->name('flamenco.edit');

Route::put('flamenco/{articulo}', [ArticuloController::class, 'update'])->middleware(['auth'])->name('flamenco.update');

Route::delete('flamenco/{articulo}', [ArticuloController::class, 'destroy'])->middleware(['auth', 'verified'])->name('flamenco.destroy');

Route::post('comentarios', [ComentarioController::class, 'store'])->middleware(['auth', 'verified'])->name('comentarios.store');

Route::get('contacto', [ContactoController::class, 'index'])->name('contacto.index');

Route::post('contacto', [ContactoController::class, 'store'])->name('contacto.store');

Route::get('usuarios', [UsuariosController::class, 'index'])->middleware(['auth'])->name('usuarios.index');

Route::get('usuarios/{usuario}/edit', [UsuariosController::class, 'edit'])->middleware(['auth'])->name('usuarios.edit');

Route::put('usuarios/{usuario}', [UsuariosController::class, 'update'])->middleware(['auth'])->name('usuarios.update');

Route::delete('usuarios/{usuario}', [UsuariosController::class, 'destroy'])->middleware(['auth'])->name('usuarios.destroy');

Route::delete('usuarios/delete/{usuario}', [UsuariosController::class, 'destroyPorUsuario'])->middleware(['auth'])->name('usuarios.destroyPorUsuario');
