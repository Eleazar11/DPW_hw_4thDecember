<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos generales */
        body {
            background: linear-gradient(to right, #121212, #2b2b2b);
            font-family: 'Arial', sans-serif;
        }
        .gradient-custom {
            background: linear-gradient(135deg, #1e1e1e, #343a40);
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .card-body {
            padding: 2.5rem;
        }
        .btn-custom {
            font-size: 16px;
            padding: 12px 30px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-outline label {
            color: #b0b0b0;
        }
        .form-control {
            background-color: #3a3a3a;
            color: white;
            border-radius: 8px;
            border: 1px solid #6c757d;
            box-shadow: none;
        }
        .form-control:focus {
            background-color: #4a4a4a;
            border-color: #8d8d8d;
        }
        .btn-outline-light {
            border-color: #6c757d;
            transition: all 0.3s ease;
        }
        .btn-outline-light:hover {
            background-color: #5a6268;
            border-color: #adb5bd;
        }
        .btn-outline-light:active {
            background-color: #495057;
            border-color: #adb5bd;
        }
        .text-muted {
            color: #9e9e9e !important;
        }
        .text-uppercase {
            text-transform: uppercase;
        }
        h2 {
            font-weight: 700;
            color: #e0e0e0;
        }
        p {
            font-size: 16px;
        }
        .footer-text {
            color: #c0c0c0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Iniciar sesión</h2>
                                <p class="text-muted mb-5">¡Por favor ingresa tus credenciales para acceder al sistema!</p>

                                <!-- Formulario de login -->
                                <form method="POST" action="{{ url('/login') }}">
                                    @csrf

                                    <!-- Username input -->
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="username" id="username" class="form-control form-control-lg" required />
                                        <label class="form-label" for="username">Usuario</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="contrasena" id="typePasswordX" class="form-control form-control-lg" required />
                                        <label class="form-label" for="typePasswordX">Contraseña</label>
                                    </div>

                                    <!-- Botón de login -->
                                    <button class="btn btn-outline-light btn-lg px-5 btn-custom" type="submit">Iniciar sesión</button>
                                </form>

                            </div>

                            <div>
                                <p class="mb-0 text-muted">¿No tienes cuenta? <a href="{{ url('/registrar_user_view') }}" class="text-white-50 fw-bold">Regístrate</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
