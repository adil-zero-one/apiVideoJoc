<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('videojocs', [ApiController::class, 'index']);
// extra (me la muevo arriba porque la ruta del {id} me la estaba comiendo y siempre me mostraba false)
Route::get('/videojocs/disponibles', [ApiController::class, 'filtroDisponibles']);
Route::get('/videojocs/{id}', [ApiController::class, 'show']);
Route::post('/videojocs', [ApiController::class, 'store']);
Route::delete('/videojocs/{id}', [ApiController::class, 'destroy']);