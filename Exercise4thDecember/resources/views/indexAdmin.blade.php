<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <!-- Título Principal -->
        <h1 class="text-center mb-4">Vista de Admin</h1>

        <!-- Botones de Estudiantes -->
        <h3 class="text-center mb-4">Gestión de Usuarios</h3>
        <div class="d-flex justify-content-center gap-3 mb-5">
            <a class="btn btn-outline-success" href="{{ url('/listado_usuarios_view') }}">Ver Usuarios</a>
            <a class="btn btn-outline-warning" href="{{ url('/modificar_usuarios_view') }}">Modificar Usuarios</a>
            <a class="btn btn-outline-danger" href="{{ url('/eliminar_usuarios_view') }}">Eliminar Usuarios</a>
        </div>
        <!-- Botones de Publicaciones -->
        <h3 class="text-center mb-4">Gestión de Cursos</h3>
        <div class="d-flex justify-content-center gap-3">
            <a class="btn btn-outline-primary" href="{{url('/registrar_publicaciones_view')}}">Subir Publicacion</a>
            <a class="btn btn-outline-success" href="{{ url('/listado_publicaciones_view') }}">Ver Publicaciones</a>
            <a class="btn btn-outline-warning" href="{{ url('/modificar_publicaciones_view') }}">Modificar Publicaciones</a>
            <a class="btn btn-outline-danger" href="{{ url('/eliminar_publicaciones_view') }}">Eliminar Publicacion</a>
        </div>

        <!-- Botones de Comentarios -->
        <h1></h1>
        <h3 class="text-center mb-4">Gestión de Cursos</h3>
        <div class="d-flex justify-content-center gap-3">
            <a class="btn btn-outline-primary" href="{{url('/registrar_comentarios_view')}}">Subir Comentario a una publicacion</a>
            <a class="btn btn-outline-success" href="{{ url('/listado_comentarios_view') }}">Ver Comentarios</a>
            <a class="btn btn-outline-warning" href="{{ url('/modificar_comentarios_view') }}">Modificar Comentarios</a>
            <a class="btn btn-outline-danger" href="{{ url('/eliminar_comentarios_view') }}">Eliminar Comentarios</a>
        </div>

<!-- Botón para regresar al Home -->
<div class="mt-3 text-center">
            <a href="{{ url('/') }}" class="btn btn-secondary">Regresar a Login</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>