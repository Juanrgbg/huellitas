@extends('layout.layout')

@section('title','Create pets')


@section('content')

<body class="bg-light">

<div class="container-fluid">
    <div class="row min-vh-100">

        <!-- MENÚ LATERAL -->
        <aside class="col-12 col-md-3 col-xl-2 text-white p-3"
               style="background-color: #20583F;">

            <h2 class="fw-bold fst-italic mb-4">
                <i class="bi bi-house-heart-fill"></i>
                Huellitas a casa
            </h2>

            <nav class="nav flex-column gap-1">

                <a href="{{ route('home') }}"
                   class="nav-link text-white rounded p-3"
                   style="background-color: #196741;">
                    <i class="bi bi-house"></i> Inicio
                </a>

                <a href="{{ route('home') }}"
                   class="nav-link text-white rounded p-3"
                   style="background-color: #196741;">
                    <i class="bi bi-paw-fill"></i> Mascotas
                </a>

                <a href="{{ route('home') }}"
                   class="nav-link text-white rounded p-3"
                   style="background-color: #196741;">
                    <i class="bi bi-plus-circle"></i> Añadir Mascota
                </a>

                <a href="{{ route('home') }}"
                   class="nav-link text-white rounded p-3"
                   style="background-color: #196741;">
                    <i class="bi bi-person-fill"></i> Perfil
                </a>

                <a href="{{ route('home') }}"
                   class="nav-link text-white rounded p-3"
                   style="background-color: #196741;">
                    <i class="bi bi-box-arrow-right"></i> Iniciar sesión
                </a>

            </nav>
        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="col-12 col-md-9 col-xl-10 p-4 p-lg-5"
              style="background-color: #F5F1E8;">

            <div class="container">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h1 class="fw-bold text-dark">
                            Crear cuenta
                        </h1>

                        <p class="text-secondary">
                            Únete a nuestra comunidad y ayuda a encontrar
                            un hogar para cada mascota.
                        </p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 col-xl-7">

                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-4 p-lg-5">

                                <div class="text-center mb-4">
                                    <i class="bi bi-person-hearts fs-1"
                                       style="color: #20583F;"></i>

                                    <h3 class="fw-bold mt-2">
                                        ¡Regístrate!
                                    </h3>

                                    <p class="text-secondary">
                                        Completa tus datos para crear tu cuenta.
                                    </p>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="#"
                                      method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name"
                                               class="form-label fw-semibold">
                                            Nombre completo
                                        </label>

                                        <input type="text"
                                               class="form-control form-control-lg"
                                               id="name"
                                               name="name"
                                               value="{{ old('name') }}"
                                               placeholder="Escribe tu nombre"
                                               required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email"
                                               class="form-label fw-semibold">
                                            Correo electrónico
                                        </label>

                                        <input type="email"
                                               class="form-control form-control-lg"
                                               id="email"
                                               name="email"
                                               value="{{ old('email') }}"
                                               placeholder="correo@ejemplo.com"
                                               required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password"
                                               class="form-label fw-semibold">
                                            Contraseña
                                        </label>

                                        <input type="password"
                                               class="form-control form-control-lg"
                                               id="password"
                                               name="password"
                                               minlength="8"
                                               placeholder="Mínimo 8 caracteres"
                                               required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="password_confirmation"
                                               class="form-label fw-semibold">
                                            Confirmar contraseña
                                        </label>

                                        <input type="password"
                                               class="form-control form-control-lg"
                                               id="password_confirmation"
                                               name="password_confirmation"
                                               minlength="8"
                                               placeholder="Repite tu contraseña"
                                               required>
                                    </div>

                                    <button type="submit"
                                            class="btn btn-success btn-lg w-100"
                                            style="background-color: #20583F;">
                                        <i class="bi bi-person-plus-fill"></i>
                                        Crear cuenta
                                    </button>
                                </form>

                                <div class="text-center mt-4">
                                    <span class="text-secondary">
                                        ¿Ya tienes una cuenta?
                                    </span>

                                    <a href="{{ route('home') }}"
                                       class="fw-bold text-decoration-none"
                                       style="color: #20583F;">
                                        Inicia sesión
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

</body>
</html>



@endsection