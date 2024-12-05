<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Comentarios</h3>

        <!-- Mostrar mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Verificar si existen comentarios -->
        @if($comentarios->isEmpty())
            <p class="text-center text-muted">No hay comentarios disponibles.</p>
        @else
            <!-- Tabla de comentarios -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Publicación ID</th>
                        <th>Usuario</th>
                        <th>Contenido</th>
                        <th>Fecha de Creación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comentarios as $comentario)
                        <tr>
                            <td>{{ $comentario->id }}</td>
                            <td>{{ $comentario->publicacion_id }}</td>
                            <td>{{ $comentario->user_name }}</td>
                            <td>{{ $comentario->contenido }}</td>
                            <td>{{ $comentario->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="mt-3 text-center">
            <a href="{{ url('/index_admin_view') }}" class="btn btn-secondary">Regresar al Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
