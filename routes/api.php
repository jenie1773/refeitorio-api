<?php

use App\Http\Controllers\CardapioController;
use App\Http\Controllers\PratoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cardapio', [CardapioController::class, 'index']);
Route::get('/cardapio/{id}', [CardapioController::class, 'show']);
Route::post('/cardapio', [CardapioController::class, 'store']);
Route::put('/cardapio/{id}', [CardapioController::class, 'update']);
Route::delete('/cardapio/{id}', [CardapioController::class, 'destroy']);

Route::get('/prato', [PratoController::class, 'index']);
Route::get('/prato/{id}', [PratoController::class,'show']);
Route::post('/prato', [PratoController::class, 'store']);
Route::put('/prato/{id}', [PratoController::class,'update']);
Route::delete('/prato/{id}', [PratoController::class,'destroy']);