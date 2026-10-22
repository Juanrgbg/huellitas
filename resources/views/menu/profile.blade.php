<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="path/to/icon-wizard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Mi perfil</title>
</head>
<img src="{{ asset('images/login/fondo_create-count.png') }}" alt="fondito" class="atras">
<style>
    /* Se */
    body {
        font-family: "Baloo 2", sans-serif;
        
    }
    

        .atras {
          position: fixed;          
          top: 0;
          left: 0;
          width: 100%;
          height: 100vh;
          height: 100dvh;           /* en celular respeta la barra del navegador */
          object-fit: cover;        
          object-position: center top; 
          z-index: -1;
        }

        @media (max-width: 768px) {
          .atras {
            object-position: 70% center; 
          }
        }

</style>
<body style="background:#F5F1E8">


<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-9">

            {{-- Encabezado --}}
            <div class="rounded-4 p-4 mb-4 text-white"
                 style="background-color: #1F5639;">

                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-person-circle fs-1"></i>

                    <div>
                        <h2 class="fw-bold mb-1">Mi perfil</h2>
                        <p class="mb-0">
                            Administra tu información personal
                        </p>
                    </div>
                </div>
            </div>

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>
                </div>
            @endif

            {{-- Tarjeta de perfil --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">

                    {{-- Foto y nombre --}}
                    <div class="text-center mb-4">
                       @if ($usuario->avatar)
                            <img src="{{ $usuario->avatar }}"
                                alt="Foto de {{ $usuario->name }}"
                                width="110" height="110"
                                class="rounded-circle object-fit-cover border border-3 border-success mb-3"
                                referrerpolicy="no-referrer">
                        @else
                            <span class="rounded-circle d-inline-flex align-items-center justify-content-center text-white fw-bold fs-1 mb-3"
                            style="width:110px; height:110px; background:#2C9678;">
                            {{ $usuario->initials() }}
                        </span>
                        @endif

                        <h3 class="fw-bold mb-1">{{ trim($usuario->name . ' ' . $usuario->apellido) }}</h3>

                        <span class="badge rounded-pill px-3 py-2" style="background-color: #2C9678">
                            {{ $usuario->google_id ? 'Cuenta de google' : 'Usuario registrado' }}
                        </span> 
                    </div>

                    <hr class="mb-4">

                    {{-- Información personal --}}
                    <h5 class="fw-bold mb-4"
                        style="color: #1F5639;">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        Información personal
                    </h5>

                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="text-secondary small">
                                Nombre completo
                            </label>
                            <p class="fw-semibold mb-0">
                                {{ trim($usuario->name . ' ' . $usuario->apellido) }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <label class="text-secondary small">
                                Correo electrónico
                            </label>
                            <p class="fw-semibold mb-0">
                                {{ $usuario->email }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <label class="text-secondary small">
                                Teléfono / WhatsApp
                            </label>
                            <p class="fw-semibold mb-0">
                                {{ $usuario->phone ?: 'No registrado' }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <label class="text-secondary small">
                                Ciudad
                            </label>
                            <p class="fw-semibold mb-0">
                                {{ $usuario->city ?: 'No registrada' }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <label class="text-secondary small">
                                Fecha de registro
                            </label>
                            <p class="fw-semibold mb-0">
                                {{ $usuario->created_at
                                    ?->format('d/m/Y') ??
                                    'No disponible' }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <label class="text-secondary small">
                                Estado de la cuenta
                            </label>
                            <p class="fw-semibold mb-0">
                                <span class="text-success">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    Activa
                                </span>
                            </p>
                        </div>

                    </div>

                    <hr class="my-4">

                    {{-- Botones --}}
                    <div class="d-flex flex-column flex-sm-row
                                justify-content-end gap-2">

                        <a href="{{ route('profile.profileEdit') }}"
                           class="btn text-white px-4"
                           style="background-color: #1F5639;">

                            <i class="bi bi-pencil-square me-2"></i>
                            Editar perfil
                        </a>

                        <a href="{{ route('mascotas.index') }}"
                           class="btn btn-outline-secondary px-4">
                            Volver al inicio
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

