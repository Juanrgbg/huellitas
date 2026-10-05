@extends('layout.layout')

@section('title','Login')


@section('content')


<body class="bg-success-subtle">

        <img src="{{ asset( 'images/login/login-gato-perro.jpeg') }}" alt="fotito" class="atras">

  <main class="container min-vh-100 d-flex align-items-center py-4">
    <div class="row w-100 align-items-center g-4 mx-0">

      <!-- Marca / ilustración -->
      <section class="col-lg-6 text-center">
        <h1 class="display-5 fw-bold text-success mb-1"></h1>
        <p class="fw-semibold text-success-emphasis mb-4"></p>

        
        <style>
          .atras {
            position: absolute;
            z-index: -1;
            max-width:100%;
            height: auto;
          }

        </style>
      </section>

      <!-- Tarjeta de login -->
      <section class="col-lg-5 offset-lg-1">
        <div class="card border-0 shadow rounded-4">
          <div class="card-body p-4 p-md-5">

            <h2 class="h3 fw-bold mb-2 text-center">Iniciar Sesión</h2>
            <p class="text-body-secondary small mb-4">
              Bienvenido de nuevo, sigue ayudando a que más mascotas encuentren un hogar.
            </p>

            <form>
              <div class="input-group mb-3">
                <span class="input-group-text bg-white"><i class="bi bi-envelope-fill text-success"></i></span>
                <input type="email" class="form-control" placeholder="Correo electrónico" aria-label="Correo electrónico" required>
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text bg-white"><i class="bi bi-lock-fill text-success"></i></span>
                <input type="password" id="clave" class="form-control" placeholder="Contraseña" aria-label="Contraseña" required>
                <button type="button" class="btn btn-outline-secondary" aria-label="Mostrar contraseña"
                        onclick="const c=document.getElementById('clave');c.type=c.type==='password'?'text':'password'">
                  <i class="bi bi-eye"></i>
                </button>
              </div>

              <div class="d-flex justify-content-between align-items-center mb-4 small">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="recordarme">
                  <label class="form-check-label" for="recordarme">Recuérdame</label>
                </div>
                <a href="#" class="link-success text-decoration-none">¿Olvidaste tu contraseña?</a>
              </div>

              <button type="submit" class="btn btn-success btn-lg w-100 mb-3">Iniciar Sesión</button>

              <div class="d-flex align-items-center text-body-secondary mb-3">
                <hr class="flex-grow-1 m-0">
                <span class="px-3 small">o</span>
                <hr class="flex-grow-1 m-0">
              </div>

              <button type="button" class="btn btn-outline-secondary w-100 mb-4">
                <i class="bi bi-google me-2"></i>Continuar con Google
              </button>

              <p class="text-center small text-body-secondary mb-0">
                ¿No tienes una cuenta?
                <a href="{{ route('create.index') }}" class="link-success fw-semibold">Regístrate</a>
              </p>
            </form>

          </div>
        </div>
      </section>

    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


@endsection