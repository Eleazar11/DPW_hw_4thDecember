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
                        <th>Acción</th>
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
                            <td>
                                <!-- Botón para modificar el comentario -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCommentModal{{ $comentario->id }}">Modificar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Modal para editar comentario -->
        @foreach($comentarios as $comentario)
            <div class="modal fade" id="editCommentModal{{ $comentario->id }}" tabindex="-1" aria-labelledby="editCommentModalLabel{{ $comentario->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCommentModalLabel{{ $comentario->id }}">Editar Comentario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('/actualizar_comentario/' . $comentario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="contenido{{ $comentario->id }}" class="form-label">Contenido</label>
                                    <textarea class="form-control" id="contenido{{ $comentario->id }}" name="contenido" required>{{ $comentario->contenido }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-3 text-center">
            <a href="{{ url('/index_admin_view') }}" class="btn btn-secondary">Regresar al Home</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
