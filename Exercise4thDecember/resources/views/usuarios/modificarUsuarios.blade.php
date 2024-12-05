<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Usuarios para Modificar</h1>

        <!-- Mostrar los usuarios -->
        <div class="row">
            @foreach ($listarUsuarios as $usuario)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $usuario->user_name }}</h5>
                            <p class="card-text"><strong>Edad:</strong> {{ $usuario->edad }}</p>
                            <p class="card-text"><strong>Género:</strong> {{ $usuario->genero }}</p>
                            <p class="card-text"><strong>Departamento:</strong> {{ $usuario->departamento_nacimiento }}</p>
                            <p class="card-text"><strong>Rol:</strong> {{ $usuario->rol }}</p>

                            <!-- Botón Modificar -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $usuario->id }}">Modificar</button>
                        </div>
                    </div>
                </div>

                <!-- Modal para editar usuario -->
                <div class="modal fade" id="editUserModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $usuario->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel{{ $usuario->id }}">Editar Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ url('/actualizar_usuario/' . $usuario->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="edad{{ $usuario->id }}" class="form-label">Edad</label>
                                        <input type="number" class="form-control" id="edad{{ $usuario->id }}" name="edad" value="{{ $usuario->edad }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="genero{{ $usuario->id }}" class="form-label">Género</label>
                                        <input type="text" class="form-control" id="genero{{ $usuario->id }}" name="genero" value="{{ $usuario->genero }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="departamento{{ $usuario->id }}" class="form-label">Departamento de Nacimiento</label>
                                        <input type="text" class="form-control" id="departamento{{ $usuario->id }}" name="departamento_nacimiento" value="{{ $usuario->departamento_nacimiento }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="rol{{ $usuario->id }}" class="form-label">Rol</label>
                                        <select class="form-select" id="rol{{ $usuario->id }}" name="rol" required>
                                            <option value="Administrador" {{ $usuario->rol == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                                            <option value="User" {{ $usuario->rol == 'User' ? 'selected' : '' }}>User</option>
                                        </select>
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
        </div>

        <!-- Botón para regresar al Home -->
        <div class="mt-3 text-center">
        <a href="{{ url('/index_admin_view') }}" class="btn btn-secondary">Regresar al Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
