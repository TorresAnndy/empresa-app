<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Mostrar el formulario de creación
    public function crear()
    {
        return view('empleado.crear');
    }

    // Mostrar el formulario de edición con los datos del empleado
    public function editar($id)
    {
        $empleado = Empleado::findOrFail($id); // Obtener el empleado por ID
        return view('empleado.editar', compact('empleado')); // Pasamos los datos del empleado a la vista
    }

    // Actualizar un empleado
    public function actualizar(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id); // Obtener el empleado por ID

        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ingresos' => 'required|numeric',
            'gastos' => 'required|numeric',
            'viaticos' => 'required|numeric',
            'extras' => 'required|numeric',
        ]);

        // Actualizar los datos del empleado
        $empleado->update([
            'nombre' => $request->nombre,
            'ingresos' => $request->ingresos,
            'gastos' => $request->gastos,
            'viaticos' => $request->viaticos,
            'extras' => $request->extras,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('empleados.listar')->with('success', 'Empleado actualizado correctamente');
    }

    // Mostrar lista de empleados
    public function listar()
    {
        $empleados = Empleado::all();
        return view('empleado.listar', compact('empleados'));
    }

    // Guardar un nuevo empleado
    public function guardar(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|max:255',
                'ingresos' => 'required|numeric',
                'gastos' => 'required|numeric',
                'viaticos' => 'required|numeric',
                'extras' => 'required|numeric',
            ], [
                'nombre.required' => 'El nombre es obligatorio.',
                'ingresos.required' => 'Los ingresos son obligatorios.',
                'gastos.required' => 'Los gastos son obligatorios.',
                'viaticos.required' => 'Los viáticos son obligatorios.',
                'extras.required' => 'Los extras son obligatorios.',
            ]);

            // Crear un nuevo empleado
            $empleado = Empleado::create($request->all());

            // Retornar respuesta JSON
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // En caso de error, retornar un mensaje de error
            return response()->json(['success' => false, 'error' => 'Hubo un problema al guardar el empleado']);
        }
    }

    // Eliminar un empleado
    public function borrar($id)
    {
        try {
            // Buscar al empleado por ID
            $empleado = Empleado::findOrFail($id);

            // Eliminar al empleado
            $empleado->delete();

            // Redirigir con un mensaje de éxito
            return redirect()->route('empleados.listar')->with('success', 'Empleado eliminado exitosamente');
        } catch (\Exception $e) {
            // En caso de error, redirigir con mensaje de error
            return redirect()->route('empleados.listar')->with('error', 'Hubo un problema al eliminar el empleado');
        }
    }
}
