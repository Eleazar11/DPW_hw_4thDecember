<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Publicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Eliminar Publicación</h1>

        <!-- Mostrar las publicaciones -->
        <div class="row">
            @foreach ($publicaciones as $publicacion)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                            <p class="card-text">Publicado por: {{ $publicacion->user_name }}</p>
                            <p class="card-text">Descripción: {{ $publicacion->descripcion }}</p>
                            <img src="{{ asset($publicacion->imagen) }}" alt="Imagen de {{ $publicacion->titulo }}" class="img-fluid">
                            
                            <!-- Botón Eliminar -->
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePostModal{{ $publicacion->id }}">Eliminar</button>
                        </div>
                    </div>
                </div>

                <!-- Modal para confirmar la eliminación de la publicación -->
                <div class="modal fade" id="deletePostModal{{ $publicacion->id }}" tabindex="-1" aria-labelledby="deletePostModalLabel{{ $publicacion->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deletePostModalLabel{{ $publicacion->id }}">Confirmar Eliminación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>¿Estás seguro de que quieres eliminar esta publicación y todos sus comentarios asociados?</p>
                                <p><strong>Título:</strong> {{ $publicacion->titulo }}</p>
                                <p><strong>Descripción:</strong> {{ $publicacion->descripcion }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ url('/eliminar_publicacion/' . $publicacion->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3 text-center">
            <a href="{{ url('/index_admin_view') }}" class="btn btn-secondary">Regresar al Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
