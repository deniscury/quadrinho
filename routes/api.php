<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapituloController;
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\QuadrinhoController;
use Illuminate\Http\Request;
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
Route::group(array('middleware' => array('auth:sanctum')), function(){
    Route::apiResources(array(
        'editora' => EditoraController::class,
        'quadrinho' => QuadrinhoController::class,
        'capitulo' => CapituloController::class
    ));

    Route::post('/logout', array(AuthController::class, 'logout'));
});

Route::post('/login', array(AuthController::class, 'login'));
Route::post('/register', array(AuthController::class, 'register'));

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
