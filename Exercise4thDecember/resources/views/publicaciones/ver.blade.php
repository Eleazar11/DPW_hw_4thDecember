<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .post-card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }
        .post-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .post-content {
            padding: 15px;
        }
        .post-header {
            font-size: 14px;
            color: #555;
        }
        .post-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .post-description {
            margin-bottom: 15px;
            font-size: 14px;
            color: #333;
        }
        .post-footer {
            font-size: 12px;
            color: #777;
        }
        .post-number {
            font-size: 12px;
            color: #999;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Publicaciones</h3>
        
        @if($publicaciones->isEmpty())
            <p class="text-center text-muted">No hay publicaciones disponibles.</p>
        @else
            <div class="row justify-content-center">
                @foreach($publicaciones as $publicacion)
                    <div class="col-md-6">
                        <div class="post-card shadow">
                            @if($publicacion->imagen)
                                <img src="{{ asset($publicacion->imagen) }}" alt="Imagen de {{ $publicacion->titulo }}">
                            @else
                                <img src="{{ asset('imagenes/default.png') }}" alt="Sin imagen disponible">
                            @endif
                            <div class="post-content">
                                <!-- Número de Publicación -->
                                <div class="post-number">
                                    <strong>Número de Publicación:</strong> {{ $publicacion->id }}
                                </div>
                                <div class="post-header">
                                    Publicado por <strong>{{ $publicacion->user_name }}</strong>
                                </div>
                                <div class="post-title">
                                    <strong>Título:</strong> {{ $publicacion->titulo }}
                                </div>
                                <div class="post-description">
                                    <strong>Descripción:</strong> {{ $publicacion->descripcion }}
                                </div>
                                <div class="post-footer">
                                    Publicado el {{ $publicacion->created_at->format('d/m/Y H:i') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-3 text-center">
            <a href="{{ url('/index_admin_view') }}" class="btn btn-secondary">Regresar al Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
