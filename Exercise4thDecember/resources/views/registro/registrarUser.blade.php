<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Registrar Usuario</h3>
        
        <!-- Formulario de registro de usuario -->
        <form action="{{ url('/registrar_usuario_db') }}" method="POST" class="card p-4 shadow">
            @csrf
            <div class="mb-3">
                <label for="user_name" class="form-label">Nombre de Usuario</label>
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Ingrese el nombre de usuario" required>
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese la contraseña" required>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" placeholder="Ingrese la edad" required>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-control" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="departamento_nacimiento" class="form-label">Departamento de Nacimiento</label>
                <input type="text" name="departamento_nacimiento" id="departamento_nacimiento" class="form-control" placeholder="Ingrese el departamento de nacimiento" required>
            </div>

            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select name="rol" id="rol" class="form-control" required>
                    <option value="Administrador">Administrador</option>
                    <option value="User">User</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Registrar Usuario</button>
            </div>
        </form>

        <div class="mt-3 text-center">
            <a href="{{ url('/') }}" class="btn btn-secondary">Regresar al Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
