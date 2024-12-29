<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Empleado</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ingreso de Datos del Empleado</h1>

        <!-- Mostrar mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Formulario de empleado -->
        <form id="empleado-form" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ingresos" class="form-label">Ingresos</label>
                <input type="number" class="form-control" id="ingresos" name="ingresos" value="{{ old('ingresos') }}" required>
                @error('ingresos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gastos" class="form-label">Gastos</label>
                <input type="number" class="form-control" id="gastos" name="gastos" value="{{ old('gastos') }}" required>
                @error('gastos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="viaticos" class="form-label">Viáticos</label>
                <input type="number" class="form-control" id="viaticos" name="viaticos" value="{{ old('viaticos') }}" required>
                @error('viaticos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="extras" class="form-label">Extras</label>
                <input type="number" class="form-control" id="extras" name="extras" value="{{ old('extras') }}" required>
                @error('extras')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="button" id="submit-btn" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <!-- Script para enviar datos a la API con AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Definir la ruta en una variable JavaScript
        const saveEmpleadoUrl = "{{ route('empleado.guardar') }}";
        const empleadosListUrl = "{{ route('empleados.listar') }}";  // Ruta para la lista de empleados

        document.getElementById('submit-btn').addEventListener('click', function () {
            // Obtener los valores del formulario
            const formData = new FormData(document.getElementById('empleado-form'));

            // Enviar los datos con Axios
            axios.post(saveEmpleadoUrl, formData)
                .then(response => {
                    // Manejo de la respuesta
                    if (response.data.success) {
                        // Mostrar mensaje de éxito
                        //alert('Empleado guardado exitosamente');
                        // Redirigir a la lista de empleados
                        window.location.href = empleadosListUrl; // Redirige a la ruta que lista los empleados
                    } else {
                        // Mostrar mensaje de error
                        alert('Hubo un problema al guardar el empleado');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al enviar los datos');
                });
        });
    </script>
</body>
</html>
