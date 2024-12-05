<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Comentario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Registrar Comentario</h3>

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

        <!-- Formulario de registro de comentario -->
        <form action="{{ url('/registrar_comentario_db') }}" method="POST" class="card p-4 shadow">
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
                <label for="publicacion_id" class="form-label">Número de Publicación</label>
                <select name="publicacion_id" id="publicacion_id" class="form-select" required>
                    <option value="" disabled selected>Seleccione una publicación</option>
                    @foreach($publicaciones as $publicacion)
                        <option value="{{ $publicacion->id }}">Publicación #{{ $publicacion->id }} - {{ $publicacion->titulo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido del Comentario</label>
                <textarea name="contenido" id="contenido" class="form-control" rows="5" placeholder="Ingrese el contenido del comentario" required></textarea>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Registrar Comentario</button>
            </div>
        </form>

        <div class="mt-3 text-center">
            <a href="{{ url('/index_admin_view') }}" class="btn btn-secondary">Regresar al Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
