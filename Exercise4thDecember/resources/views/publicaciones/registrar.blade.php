<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Publicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Registrar Publicación</h3>

        <!-- Mostrar mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de registro de publicación -->
        <form action="{{ url('/registrar_publicacion_db') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow">
    @csrf
    <div class="mb-3">
        <label for="user_name" class="form-label">Usuario</label>
        <select name="user_name" id="user_name" class="form-select" required>
            <option value="" disabled selected>Seleccione un usuario</option>
            @foreach($listarUsuarios as $usuario)
                <option value="{{ $usuario->user_name }}">{{ $usuario->user_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Ingrese el título de la publicación" required>
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="5" placeholder="Ingrese la descripción de la publicación" required></textarea>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Registrar Publicación</button>
    </div>
</form>


        <div class="mt-3 text-center">
            <a href="{{ url('/index_admin_view') }}" class="btn btn-secondary">Regresar al Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
