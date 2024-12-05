<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Please enter your username and password!</p>

                  <!-- Formulario de login -->
                  <form method="POST" action="{{ url('/login') }}">
                    @csrf

                    <!-- Username input -->
                    <div data-mdb-input-init class="form-outline form-white mb-4">
                      <input type="text" name="username" id="username" class="form-control form-control-lg" required />
                      <label class="form-label" for="username">Username</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline form-white mb-4">
                      <input type="password" name="contrasena" id="typePasswordX" class="form-control form-control-lg" required />
                      <label class="form-label" for="typePasswordX">Password</label>
                    </div>

                    <!-- Botón de login -->
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                  </form>

                </div>

                <div>
                  <p class="mb-0">Don't have an account? <a href="{{ url('/registrar_user_view') }}" class="text-white-50 fw-bold">Sign Up</a></p>
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
