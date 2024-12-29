<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Validator;


class EmpleadoApiController extends Controller
{
    // Crear un empleado
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'ingresos' => 'required|numeric',
            'gastos' => 'required|numeric',
            'viaticos' => 'required|numeric',
            'extras' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $empleado = Empleado::create($request->all());

        return response()->json(['message' => 'Empleado creado correctamente.', 'data' => $empleado], 201);
    }

    // Obtener todos los empleados
    public function index()
    {
        $empleados = Empleado::all();
        if($empleados->isEmpty()){
            return response()->json([
                'mensaje' => "no hay empleados",
                'status' => 404,
            ], 404);
        }else{
            return response()->json([
                'mensaje' => $empleados,
                'status' => 200,
            ], 200);
        }
        
    }

    // Obtener un empleado específico
    public function show($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['error' => 'Empleado no encontrado.'], 404);
        }

        return response()->json(['data' => $empleado], 200);
    }

    // Actualizar un empleado
    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['error' => 'Empleado no encontrado.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|string|max:255',
            'ingresos' => 'sometimes|numeric',
            'gastos' => 'sometimes|numeric',
            'viaticos' => 'sometimes|numeric',
            'extras' => 'sometimes|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $empleado->update($request->all());

        return response()->json(['message' => 'Empleado actualizado correctamente.', 'data' => $empleado], 200);
    }

    // Eliminar un empleado
    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['error' => 'Empleado no encontrado.'], 404);
        }

        $empleado->delete();

        return response()->json(['message' => 'Empleado eliminado correctamente.'], 200);
    }
}
