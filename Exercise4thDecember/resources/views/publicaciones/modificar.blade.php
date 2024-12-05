<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Publicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Modificar Publicación</h1>

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
                            
                            <!-- Botón Modificar -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPostModal{{ $publicacion->id }}">Modificar</button>
                        </div>
                    </div>
                </div>

                <!-- Modal para editar publicación -->
                <div class="modal fade" id="editPostModal{{ $publicacion->id }}" tabindex="-1" aria-labelledby="editPostModalLabel{{ $publicacion->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPostModalLabel{{ $publicacion->id }}">Editar Publicación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ url('/actualizar_publicacion/' . $publicacion->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="titulo{{ $publicacion->id }}" class="form-label">Título</label>
                                        <input type="text" class="form-control" id="titulo{{ $publicacion->id }}" name="titulo" value="{{ $publicacion->titulo }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion{{ $publicacion->id }}" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="descripcion{{ $publicacion->id }}" name="descripcion" required>{{ $publicacion->descripcion }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagen{{ $publicacion->id }}" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" id="imagen{{ $publicacion->id }}" name="imagen">
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
