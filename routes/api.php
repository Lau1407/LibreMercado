<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\Api\ApiController;
use App\Http\Controllers\categoria\categoriaController;
use App\http\Controllers\Producto\productoController;
use App\http\Controllers\Usuario\usuarioController;
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


Route::post("data_create", [ApiController::class, "dataCreate"]);
Route::get("data_get", [ApiController::class, "dataGet"]);
Route::delete("data_delete", [ApiController::class, "dataDelete"]); 

Route::post("producto_create", [productoController::class, "productoCreate"]);
Route::get("producto_get_all", [productoController::class, "productoGetAll"]);
Route::get("producto_get/{id}", [productoController::class, "productoGet"]);
Route::delete("producto_delete/{id}", [productoController::class, "productoDelete"]); 
Route::put("products/{id}", [productoController::class, "productoUpdate"]);
Route::post("comprar/{id}", [productoController::class, "restarStock"]);

Route::post("crear_usuario", [usuarioController::class, "usuarioCreate"]);

Route::post("login", [usuarioController::class, "usuarioLogin"]);


Route::get("usuario_get", [usuarioController::class, "usuarioGet"]);
Route::delete("usuario_delete", [usuarioController::class, "usuarioDelete"]); 

Route::post("crear_categoria",[categoriaController::class, "generarCategorias"]);
Route::get("categoria_get", [categoriaController::class, "getAllCategorias"]);


