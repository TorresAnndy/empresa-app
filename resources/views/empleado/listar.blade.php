<!-- resources/views/empleado/listar.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Si no necesitas Bootstrap, puedes eliminar esta línea -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Empleados</h1>

        <!-- Botón de agregar empleado -->
        <a href="{{ route('empleado.crear') }}" class="btn btn-success mb-3">Agregar Empleado</a>

        <!-- Si hay un mensaje de éxito, se muestra -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Mostrar mensaje si no hay empleados -->
        @if($empleados->isEmpty())
            <div class="alert alert-info">No hay empleados registrados.</div>
        @else
            <!-- Tabla para mostrar los empleados -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ingresos</th>
                        <th>Gastos</th>
                        <th>Viáticos</th>
                        <th>Extras</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                        <tr>
                            <th>{{ $empleado->id }}</th>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->ingresos }}</td>
                            <td>{{ $empleado->gastos }}</td>
                            <td>{{ $empleado->viaticos }}</td>
                            <td>{{ $empleado->extras }}</td>
                            <td>
                                <a href="{{ route('empleado.editar', $empleado->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('empleado.borrar', $empleado->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
