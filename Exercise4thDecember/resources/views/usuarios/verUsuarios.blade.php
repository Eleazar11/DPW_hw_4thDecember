<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Usuarios</h1>
        
        <!-- Mostrar los usuarios -->
        <div class="row">
            @foreach ($listarUsuarios as $usuario)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $usuario->user_name }}</h5>
                            <p class="card-text"><strong>Edad:</strong> {{ $usuario->edad }}</p>
                            <p class="card-text"><strong>Género:</strong> {{ $usuario->genero }}</p>
                            <p class="card-text"><strong>Departamento de Nacimiento:</strong> {{ $usuario->departamento_nacimiento }}</p>
                            <p class="card-text"><strong>Rol:</strong> {{ $usuario->rol }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Botón para regresar al Home -->
        <div class="mt-3 text-center">
            <a href="{{ url('/index_admin_view') }}" class="btn btn-secondary">Regresar al Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
