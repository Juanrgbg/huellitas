@extends('layout.layout')

@section('title','Login')


@section('content')




<body class="bg-success-subtle">

    {{-- Imagen de fondo de registrarse --}}
<img src="{{ asset('images/login/fondo_create-count.png') }}" alt="fondito" class="detras">

{{-- Se pospone la imagen para que quede detras de el contenedor que guarda el formulario de registrar usuario  --}}
<style>
    .detras {
        position: absolute;
        z-index: -1;
        max-width: 100%;
        height: auto;
    }
</style>

  <main class="container min-vh-100 d-flex align-items-center py-4">
    <div class="row  align-items-center g-4 mx-2" style="width: 100%">

      <!-- Nombre de la Marca-Titulo-->
      <section class=" text-center">
        <h1 class="display-5 fw-bold text-success mb-1">Huellitas a Casa</h1>
        <p class="fw-semibold text-success-emphasis mb-4">Todos merecemos un hogar donde nos reciban con amor, .</p>
      </section>


      <!-- Tarjeta de login -->
      <section class="col-lg-5  mx-auto  p-4"">
        <div class="card border-0 shadow rounded-4">
          <div class="card-body p-4 p-md-5">

            <h2 class="h3 fw-bold mb-2 text-center">Registrate ahora</h2>
            <p class="text-body-secondary small mb-4">
            Bienvenido aqui podras registrarte,  para poder ayudar a  que mascotas encuentren un hogar.
            </p>
            {{-- Se encuentra el input de nombre --}}
            <form>
            <p class="">Nombre</p>
            <div class="input-group mb-3">
                <span class="input-group-text bg-white"><i class="bi bi-chat-text-fill text-success"></i></span>
                <input type="name" class="form-control" placeholder="Ingresa tu nombre" aria-label="Nombre" required>
            </div>

            {{-- Se encuentra el input de Apellido --}}
            <p class="mt-3">Apellido</p>
            <div class="input-group mb-3">
                <span class="input-group-text bg-white"><i class="bi bi-archive-fill text-success"></i></span>
                <input type="apellido" class="form-control" placeholder="Ingresa tu apellido" aria-label="Apellido" required>
            </div>

            {{-- Se encuentra el input del correo electronico --}}
            <p class="">Correo electronico</p>
            <div class="input-group mb-3">
                <span class="input-group-text bg-white"><i class="bi bi-envelope-fill text-success"></i></span>
                <input type="email" class="form-control" placeholder="Ingresa tu correo electronico" aria-label="Apellido" required>
            </div>


            {{-- Se encuentra el input de Contrasena --}}
            <p>Contraseña</p>
            <div class="input-group mb-3">
                <span class="input-group-text bg-white"><i class="bi bi-key-fill text-success"></i></span>
                <input type="password" id="clave" class="form-control" placeholder="Contraseña" aria-label="Contraseña" required>
            </div>

            {{-- Se encuentra el input de confirmacion de Contrasena --}}
            <p>Confirmar contraseña</p>
            <div class="input-group mb-3">
                <span class="input-group-text bg-white"><i class="bi bi-lock-fill text-success"></i></span>
                <input type="password" id="clave" class="form-control" placeholder="confirmar contraseña" aria-label="Contraseña" required>
            </div>




            {{--  recuadro de check para confirmar el recordar cuenta --}}
              <div class="d-flex justify-content-between align-items-center mb-4 small">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="recordarme">
                  <label class="form-check-label" for="recordarme">Recuérdame</label>
                </div>
              </div>



              <a href="{{ route('create.create') }}"></a><button type="submit" class="btn btn-success btn-lg w-100 mb-3">Crear cuenta</button>

              <div class="d-flex align-items-center text-body-secondary mb-3">
                <hr class="flex-grow-1 m-0">
                <span class="px-3 small">o</span>
                <hr class="flex-grow-1 m-0">
              </div>

              <button type="button" class="btn btn-outline-secondary w-100 mb-4">
                <i class="bi bi-google me-2"></i>Continuar con Google
              </button>

            </form>

          </div>
        </div>
      </section>

    </div>
  </main>





















@endsection