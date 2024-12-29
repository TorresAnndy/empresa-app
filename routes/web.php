<?php

// routes/web.php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Mostrar el formulario de creación
Route::get('/empleado/crear', [EmpleadoController::class, 'crear'])->name('empleado.crear');

// Guardar un nuevo empleado
Route::post('/empleado', [EmpleadoController::class, 'guardar'])->name('empleado.guardar');

// Listar empleados
Route::get('empleados', [EmpleadoController::class, 'listar'])->name('empleados.listar');

// Mostrar el formulario de edición
Route::get('/empleado/editar/{id}', [EmpleadoController::class, 'editar'])->name('empleado.editar');

// Actualizar empleado
Route::put('/empleado/{id}', [EmpleadoController::class, 'actualizar'])->name('empleado.actualizar');

// Borrar empleado
Route::delete('/empleado/{id}', [EmpleadoController::class, 'borrar'])->name('empleado.borrar');
