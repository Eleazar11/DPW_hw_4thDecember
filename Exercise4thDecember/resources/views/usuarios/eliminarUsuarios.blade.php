<!-- resources/views/usuarios/eliminarUsuarios.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Eliminar Usuario</h3>

        <!-- Verificar si existen usuarios -->
        @if($usuarios->isEmpty())
            <p class="text-center text-muted">No hay usuarios disponibles.</p>
        @else
            <!-- Tabla de usuarios -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>username</th>
                        <th>Rol</th>
                        <th>Eliminar :b</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->user_name  }}</td>
                            <td>{{ $usuario->rol }}</td>
                            <td>
                                <!-- Botón para eliminar usuario -->
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $usuario->id }}">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Modal para confirmar eliminación -->
        @foreach($usuarios as $usuario)
            <div class="modal fade" id="deleteUserModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel{{ $usuario->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteUserModalLabel{{ $usuario->id }}">Confirmar Eliminación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que deseas eliminar al usuario {{ $usuario->name }}? Esto eliminará todas sus publicaciones y comentarios.
                        </div>
                        <div class="modal-footer">
                            <form action="{{ url('/eliminar_usuario/' . $usuario->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-3 text-center">
            <a href="{{ url('/index_admin_view') }}" class="btn btn-secondary">Regresar al Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
