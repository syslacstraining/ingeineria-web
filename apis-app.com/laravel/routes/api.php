<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\v1\ProductosController;

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


Route::get('/v1/productos', [ProductosController::class, 'obtenerLista']);
Route::get('/v1/productos/{id}', [ProductosController::class, 'obtenerItem']);
Route::post('/v1/productos', [ProductosController::class, 'store']);
Route::put('/v1/productos', [ProductosController::class, 'update']);
Route::patch('/v1/productos', [ProductosController::class, 'patch']);
Route::delete('/v1/productos/{id}', [ProductosController::class, 'delete']);
