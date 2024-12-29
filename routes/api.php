<?php

use App\Http\Controllers\Api\EmpleadoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes 
Route::prefix("v.1")->group(function () {
    Route::resource("/empleados", EmpleadoApiController::class);
});
