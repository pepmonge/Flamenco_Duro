<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ComentarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/perro', function(){
    return 'oo';
});

Route::get('usuarios', [AuthenticatedSessionController::class, 'apiUsers'])->name('apiUsers');

Route::get('articulos/{id}', [ArticuloController::class, 'apiArticulos'])->name('apiArticulos');

Route::get('articulo/contenido/{id}', [ArticuloController::class, 'apiContenidoArticulo'])->name('apiContenidoArticulo');

Route::get('comentarios/{id}', [ComentarioController::class, 'apiComentarios'])->name('apiComentarios');
