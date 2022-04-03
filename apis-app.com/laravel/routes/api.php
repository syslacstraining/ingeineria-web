<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\v1\ProductosController;

use App\Http\Controllers\v1\CategoriasController;

use App\Http\Controllers\v1\UsersController;
use App\Http\Controllers\v1\SeguridadController;

use App\Http\Controllers\v2\PagosController;

use App\Http\Controllers\v2\PedidosController;

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


Route::get('/v2/productos', [App\Http\Controllers\v2\ProductosController::class, 'obtenerLista']);
Route::get('/v2/productos/{id}', [App\Http\Controllers\v2\ProductosController::class, 'obtenerItem']);



Route::middleware('auth:api')->group(function(){
    
    Route::post('/v1/productos', [ProductosController::class, 'store']);
    Route::put('/v1/productos', [ProductosController::class, 'update']);
    Route::patch('/v1/productos', [ProductosController::class, 'patch']);
    Route::delete('/v1/productos/{id}', [ProductosController::class, 'delete']);



    Route::post('/v2/productos', [App\Http\Controllers\v2\ProductosController::class, 'store']);
    Route::put('/v2/productos', [App\Http\Controllers\v2\ProductosController::class, 'update']);
    Route::patch('/v2/productos', [App\Http\Controllers\v2\ProductosController::class, 'patch']);
    Route::delete('/v2/productos/{id}', [App\Http\Controllers\v2\ProductosController::class, 'delete']);



    Route::get('/v1/categorias', [CategoriasController::class, 'obtenerLista']);
    Route::get('/v1/categorias/{id}', [CategoriasController::class, 'obtenerItem']);
    Route::post('/v1/categorias', [CategoriasController::class, 'store']);
    Route::put('/v1/categorias', [CategoriasController::class, 'update']);
    Route::patch('/v1/categorias', [CategoriasController::class, 'patch']);
    Route::delete('/v1/categorias/{id}', [CategoriasController::class, 'delete']);

    Route::post('/v1/users', [UsersController::class, 'store']);

    Route::get('/v1/users/get-user', [UsersController::class, 'getUser']);



    Route::post('/v2/pagos/culqi', [PagosController::class, 'pagarCulqi']);

    Route::post('/v2/pedidos', [PedidosController::class, 'pagarCulqi']);


});


 Route::post('/v1/users/clientes', [UsersController::class, 'guardarCliente']);

Route::post('/v1/seguridad/login', [SeguridadController::class, 'login']);
