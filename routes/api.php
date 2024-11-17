<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//llamar al controlador
use App\Http\Controllers\vehiculosController;

//get de index
Route::get('/vehiculos', [vehiculosController::class, 'index']);

//get de show
Route::get('/vehiculos/{id}', [vehiculosController::class, 'show']);

//post de store
Route::post('/vehiculos', [vehiculosController::class, 'store']);

//put de update
Route::put('/vehiculos/{id}', [vehiculosController::class, 'update']);

//delete de destroy
Route::delete('/vehiculos/{id}', [vehiculosController::class, 'destroy']);

//patch
Route::patch('/vehiculos/{id}', [vehiculosController::class, 'patch']);