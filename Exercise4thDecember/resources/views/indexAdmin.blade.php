<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Panel de Administración</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 1100px;
        }
        .section-title {
            color: #495057;
            font-size: 1.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .btn-custom {
            font-size: 16px;
            padding: 12px 30px;
            border-radius: 8px;
        }
        .btn-outline-custom {
            border-width: 2px;
            transition: all 0.3s ease;
        }
        .btn-outline-custom:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .icon {
            margin-right: 8px;
        }
        .section-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Título Principal -->
        <h1 class="text-center mb-4 text-dark">Bienvenido al Panel de Administración</h1>

        <!-- Gestión de Usuarios -->
        <div class="section-container">
            <h3 class="section-title text-center">Gestión de Usuarios</h3>
            <div class="d-flex justify-content-center gap-3 mb-4">
                <a class="btn btn-outline-success btn-custom" href="{{ url('/listado_usuarios_view') }}">
                    <i class="bi bi-person-lines-fill icon"></i>Ver Usuarios
                </a>
                <a class="btn btn-outline-warning btn-custom" href="{{ url('/modificar_usuarios_view') }}">
                    <i class="bi bi-pencil-square icon"></i>Modificar Usuarios
                </a>
                <a class="btn btn-outline-danger btn-custom" href="{{ url('/eliminar_usuarios_view') }}">
                    <i class="bi bi-trash icon"></i>Eliminar Usuarios
                </a>
            </div>
        </div>

        <!-- Gestión de Publicaciones -->
        <div class="section-container">
            <h3 class="section-title text-center">Gestión de Cursos</h3>
            <div class="d-flex justify-content-center gap-3 mb-4">
                <a class="btn btn-outline-primary btn-custom" href="{{url('/registrar_publicaciones_view')}}">
                    <i class="bi bi-upload icon"></i>Subir Publicación
                </a>
                <a class="btn btn-outline-success btn-custom" href="{{ url('/listado_publicaciones_view') }}">
                    <i class="bi bi-eye icon"></i>Ver Publicaciones
                </a>
                <a class="btn btn-outline-warning btn-custom" href="{{ url('/modificar_publicaciones_view') }}">
                    <i class="bi bi-pencil-square icon"></i>Modificar Publicaciones
                </a>
                <a class="btn btn-outline-danger btn-custom" href="{{ url('/eliminar_publicaciones_view') }}">
                    <i class="bi bi-trash icon"></i>Eliminar Publicación
                </a>
            </div>
        </div>

        <!-- Gestión de Comentarios -->
        <div class="section-container">
            <h3 class="section-title text-center">Gestión de Comentarios</h3>
            <div class="d-flex justify-content-center gap-3 mb-4">
                <a class="btn btn-outline-primary btn-custom" href="{{url('/registrar_comentarios_view')}}">
                    <i class="bi bi-pencil icon"></i>Subir Comentario
                </a>
                <a class="btn btn-outline-success btn-custom" href="{{ url('/listado_comentarios_view') }}">
                    <i class="bi bi-eye icon"></i>Ver Comentarios
                </a>
                <a class="btn btn-outline-warning btn-custom" href="{{ url('/modificar_comentarios_view') }}">
                    <i class="bi bi-pencil-square icon"></i>Modificar Comentarios
                </a>
                <a class="btn btn-outline-danger btn-custom" href="{{ url('/eliminar_comentarios_view') }}">
                    <i class="bi bi-trash icon"></i>Eliminar Comentarios
                </a>
            </div>
        </div>  

        <!-- Botón para regresar al Home -->
        <div class="mt-3 text-center">
            <a href="{{ url('/') }}" class="btn btn-secondary btn-custom">Cerrar Sesión (Regresar al login)</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>
</html>
