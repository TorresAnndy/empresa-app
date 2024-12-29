<!-- resources/views/empleado/editar.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Datos del Empleado</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Formulario para editar el empleado -->
        <form action="{{ route('empleado.actualizar', $empleado->id) }}" method="POST">
            @csrf
            @method('PUT') 

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ingresos" class="form-label">Ingresos</label>
                <input type="number" class="form-control" id="ingresos" name="ingresos" value="{{ old('ingresos', $empleado->ingresos) }}" required>
                @error('ingresos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gastos" class="form-label">Gastos</label>
                <input type="number" class="form-control" id="gastos" name="gastos" value="{{ old('gastos', $empleado->gastos) }}" required>
                @error('gastos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="viaticos" class="form-label">Viáticos</label>
                <input type="number" class="form-control" id="viaticos" name="viaticos" value="{{ old('viaticos', $empleado->viaticos) }}" required>
                @error('viaticos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="extras" class="form-label">Extras</label>
                <input type="number" class="form-control" id="extras" name="extras" value="{{ old('extras', $empleado->extras) }}" required>
                @error('extras')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
