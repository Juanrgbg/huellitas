
@extends('layout.layout')

@section('title', 'main')

@section('content')


<img src="{{ asset('images/fondo') }}" alt="fondito" class="atras">
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

<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- MENÚ LATERAL -->
        <aside class="col-12 col-md-3 col-xl-2 text-white p-3"
               style="background-color: #20583F;">

            <!-- Cabecera -->
            <div class="d-flex justify-content-between align-items-center mb-md-4">
                <h2 class="fw-bold fst-italic mb-0 fs-4">
                    <i class="bi bi-house-heart-fill"></i>
                    Huellitas a casa
                </h2>

                <button class="btn btn-outline-light d-md-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#menuLateral"
                        aria-controls="menuLateral"
                        aria-expanded="false"
                        aria-label="Abrir menú">
                    <i class="bi bi-list fs-4"></i>
                </button>
            </div>

            <!-- Navegación -->
            <div class="collapse d-md-block mt-3 mt-md-0" id="menuLateral">
                <nav class="nav flex-column gap-1">

                    <a href="{{ route('home') }}"
                       class="nav-link text-white rounded p-3"
                       style="background-color: #196741;">
                        <i class="bi bi-house"></i> Inicio
                    </a>

                    <a href="{{ route('mascotas.index') }}"
                       class="nav-link text-white rounded p-3"
                       style="background-color: #196741;">
                        <i class="bi bi-house-heart-fill"></i> Mascotas
                    </a>

                    <a href="{{ route('anadirMascota.index') }}"
                       class="nav-link text-white rounded p-3"
                       style="background-color: #196741;">
                        <i class="bi bi-plus-circle"></i> Publica tu mascota
                    </a>

                    <a href="{{ route('editpets.index') }}"
                       class="nav-link text-white rounded p-3"
                       style="background-color: #196741;">
                        <i class="bi bi-pencil-square"></i> Editar publicaciones
                    </a>

                    <a href="{{ route('profile.index') }}"
                       class="nav-link text-white rounded p-3"
                       style="background-color: #196741;">
                        <i class="bi bi-person-fill"></i> Perfil
                    </a>

                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                    class="nav-link text-white rounded p-3 w-100 text-start"
                                    style="background-color: #196741;">
                                <i class="bi bi-box-arrow-right"></i>
                                Cerrar sesión
                            </button>
                        </form>
                    @endauth

                </nav>
            </div>
        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="col-12 col-md-9 col-xl-10 p-4 p-lg-5"
              style="background-color: #F5F1E8;">

            <!-- MENSAJE DE ÉXITO -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close"
                            data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- TÍTULO Y BUSCADOR -->
            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-7">
                    <h1 class="fw-bold text-dark">
                        Buscar Mascotas
                    </h1>
                    <p class="ms-2 mb-3">
                        Encuentra a tu nuevo mejor amigo.
                    </p>
                </div>

                <div class="col-12 col-lg-5">
                    <form action="{{ route('mascotas.index') }}" method="GET">
                        <div class="input-group">
                            <input type="search"
                                   name="buscar"
                                   class="form-control form-control-lg"
                                   placeholder="Buscar por nombre, raza..."
                                   value="{{ request('buscar') }}">

                            <button class="btn btn-light border" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- FILTROS -->
            <div class="d-flex flex-wrap gap-2 mb-4">
                <a href="{{ route('mascotas.index') }}"
                   class="btn btn-success">
                    Todos
                </a>

                @foreach (\App\Models\MenuMascotas::ESPECIES as $valor => $etiqueta)
                    <a href="{{ route('mascotas.index', ['especie' => $valor]) }}" class="btn btn-success">
                        {{ $etiqueta }}
                    </a>
                @endforeach         
                </a>
            </div>

            <!-- MASCOTAS PUBLICADAS -->
            <div class="row g-4">

                @forelse ($mascotas as $mascota)

                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">

                        <div class="card h-100 shadow-sm border-0">

                            @if ($mascota->imagen)
                                <img
                                    src="{{ asset('storage/' . $mascota->imagen) }}"
                                    class="card-img-top"
                                    alt="Foto de {{ $mascota->nombre }}"
                                    style="height: 230px; object-fit: cover;">
                            @else
                                <div class="bg-secondary-subtle d-flex align-items-center justify-content-center"
                                     style="height: 230px;">
                                    <i class="bi bi-image fs-1 text-secondary"></i>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column">

                                <h4 class="card-title">
                                    {{ $mascota->nombre }}

                                    @if ($mascota->sexo === 'Macho')
                                        <i class="bi bi-gender-male text-primary"></i>
                                    @elseif ($mascota->sexo === 'Hembra')
                                        <i class="bi bi-gender-female text-danger"></i>
                                    @endif
                                </h4>

                                <div class="mb-2">
                                    <span class="badge bg-info text-dark">
                                        {{ $mascota->especie }}
                                    </span>
                                </div>

                                <p class="text-secondary mb-2">
                                    {{ $mascota->edad }} -
                                    {{ $mascota->tamano }}
                                </p>

                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($mascota->descripcion, 100) }}
                                </p>


                                <!-- BOTÓN QUE ABRE LA MODAL -->
                                <button type="button"
                                        class="btn btn-success mt-auto"
                                        style="background-color: #20583F;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalMascota{{ $mascota->id }}">
                                    
                                    detalles
                                </button>

                            </div>
                        </div>
                    </div>

                    <!-- MODAL DE INFORMACIÓN DE LA MASCOTA -->
                    <div class="modal fade content-center"
                         id="modalMascota{{ $mascota->id }}"
                         tabindex="-1"
                         aria-labelledby="tituloMascota{{ $mascota->id }}"
                         aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">

                            <div class="modal-content border-0 rounded-4 overflow-hidden">

                                <!-- ENCABEZADO -->
                                <div class="modal-header text-white"
                                     style="background-color: #20583F;">

                                    <h5 class="modal-title fw-bold"
                                        id="tituloMascota{{ $mascota->id }}">
                                        <i class="bi bi-heart-fill"></i>
                                        Conoce a {{ $mascota->nombre }}
                                    </h5>

                                    <button type="button"
                                            class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"
                                            aria-label="Cerrar"></button>
                                </div>

                                <!-- CONTENIDO -->
                                <div class="modal-body p-4">

                                    <div class="row g-4">

                                        <!-- IMAGEN -->
                                        <div class="col-12 col-lg-4">

                                            @if ($mascota->imagen)
                                                <img
                                                    src="{{ asset('storage/' . $mascota->imagen) }}"
                                                    alt="Foto de {{ $mascota->nombre }}"
                                                    class="img-fluid rounded-3 w-100 shadow-sm"
                                                    style="max-height: 350px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center"
                                                    style="height: 250px;">
                                                    <div class="text-center text-secondary">
                                                        <i class="bi bi-image fs-1"></i>
                                                        <p class="mb-0">Sin fotografía</p>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="mt-3">
                                                <span class="badge fs-6" style="background-color: #20583F;">
                                                    <i class="bi bi-paw-fill"></i>
                                                    {{ $mascota->especie }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- DATOS DE LA MASCOTA -->
                                        <div class="col-12 col-lg-4">

                                            <h3 class="fw-bold mb-1">
                                                {{ $mascota->nombre }}

                                                @if ($mascota->sexo === 'Macho')
                                                    <i class="bi bi-gender-male text-primary"></i>
                                                @elseif ($mascota->sexo === 'Hembra')
                                                    <i class="bi bi-gender-female text-danger"></i>
                                                @endif
                                            </h3>

                                            <p class="text-secondary mb-3">Información de la mascota</p>

                                            <hr>

                                            <div class="mb-3">
                                                <h6 class="fw-bold">
                                                    <i class="bi bi-calendar-heart text-success"></i>
                                                    Edad
                                                </h6>
                                                <p>{{ $mascota->edad ?: 'No especificada' }}</p>
                                            </div>

                                            <div class="mb-3">
                                                <h6 class="fw-bold">
                                                    <i class="bi bi-arrows-vertical text-success"></i>
                                                    Tamaño
                                                </h6>
                                                <p>{{ $mascota->tamano ?: 'No especificado' }}</p>
                                            </div>

                                            <div class="mb-3">
                                                <h6 class="fw-bold">
                                                    <i class="bi bi-card-text text-success"></i>
                                                    Descripción
                                                </h6>
                                                <p style="white-space: pre-line;">{{ $mascota->descripcion ?: 'Sin descripción disponible.' }}</p>
                                            </div>

                                            @if (isset($mascota->estado) && $mascota->estado)
                                                <div class="mb-3">
                                                    <h6 class="fw-bold">
                                                        <i class="bi bi-heart-pulse text-success"></i>
                                                        Estado
                                                    </h6>
                                                    <p>{{ $mascota->estado }}</p>
                                                </div>
                                            @endif

                                        </div>

                                        <!-- CONTACTO Y UBICACIÓN (DERECHA) -->
                                        <div class="col-12 col-lg-4">

                                            @php
                                                $usuario  = $mascota->usuario;
                                                $telefono = $usuario->phone ?? null;
                                                $correo   = $usuario->email ?? null;
                                                $ciudad   = $usuario->city ?? null;

                                                $telLimpio = $telefono ? preg_replace('/\D/', '', $telefono) : null;
                                                if ($telLimpio && strlen($telLimpio) === 10) {
                                                    $telLimpio = '57' . $telLimpio;
                                                }

                                                $mensajeWsp = urlencode("Hola, me interesa la mascota {$mascota->nombre} que vi publicada.");
                                                $lugar = trim(($mascota->ubicacion ?? '') . ' ' . ($ciudad ?? ''));
                                            @endphp

                                            <div class="border rounded-3 p-3 bg-light h-100">

                                                <!-- CONTACTO -->
                                                <div class="mb-3">
                                                    <h6 class="fw-bold">
                                                        <i class="bi bi-person-lines-fill text-success"></i>
                                                        Contacto
                                                    </h6>

                                                    @if ($usuario)
                                                        <p class="mb-1">
                                                            <i class="bi bi-person text-secondary"></i>
                                                            {{ $usuario->name ?? 'Responsable' }}
                                                        </p>
                                                    @endif

                                                    <p class="mb-1">
                                                        <i class="bi bi-telephone text-secondary"></i>
                                                        @if ($telefono)
                                                            <a href="tel:{{ $telLimpio }}" class="text-decoration-none">{{ $telefono }}</a>
                                                        @else
                                                            <span class="text-muted">Celular no disponible</span>
                                                        @endif
                                                    </p>

                                                    <p class="mb-2">
                                                        <i class="bi bi-envelope text-secondary"></i>
                                                        @if ($correo)
                                                            <a href="mailto:{{ $correo }}" class="text-decoration-none">{{ $correo }}</a>
                                                        @else
                                                            <span class="text-muted">Correo no disponible</span>
                                                        @endif
                                                    </p>

                                                    <div class="d-flex flex-wrap gap-2">
                                                        @if ($telLimpio)
                                                            <a href="https://wa.me/{{ $telLimpio }}?text={{ $mensajeWsp }}"
                                                            target="_blank" rel="noopener"
                                                            class="btn btn-success btn-sm">
                                                                <i class="bi bi-whatsapp"></i> WhatsApp
                                                            </a>
                                                            <a href="tel:{{ $telLimpio }}" class="btn btn-outline-success btn-sm">
                                                                <i class="bi bi-telephone-fill"></i> Llamar
                                                            </a>
                                                        @endif

                                                        @if ($correo)
                                                            <a href="mailto:{{ $correo }}?subject={{ rawurlencode('Interés en ' . $mascota->nombre) }}"
                                                            class=" btn-outline-secondary btn-sm">
                                                            
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>

                                                <hr>

                                                <!-- UBICACIÓN -->
                                                <div>
                                                    <h6 class="fw-bold">
                                                        <i class="bi bi-geo-alt text-success"></i>
                                                        Ubicación
                                                    </h6>

                                                    @if ($lugar)
                                                        <p class="mb-2">{{ $mascota->ubicacion ?: $ciudad }}</p>

                                                        <div class="ratio ratio-4x3 rounded-3 overflow-hidden shadow-sm">
                                                            <iframe
                                                                src="https://maps.google.com/maps?q={{ urlencode($lugar . ', Colombia') }}&output=embed"
                                                                style="border:0;"
                                                                allowfullscreen
                                                                loading="lazy"
                                                                referrerpolicy="no-referrer-when-downgrade"
                                                                title="Mapa de ubicación de {{ $mascota->nombre }}">
                                                            </iframe>
                                                        </div>

                                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($lugar . ', Colombia') }}"
                                                        target="_blank" rel="noopener"
                                                        class="btn btn-link btn-sm px-0 mt-1">
                                                            <i class="bi bi-box-arrow-up-right"></i> Abrir en Google Maps
                                                        </a>
                                                    @else
                                                        <p class="text-muted mb-0">Sin ubicación disponible</p>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- PIE DE LA MODAL -->
                                <div class="modal-footer">

                                    <button type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">
                                        Cerrar
                                    </button>

                                    {{-- Agrega el botón de WhatsApp cuando tengas
                                         disponible el número de contacto del publicador. --}}

                                </div>

                            </div>
                        </div>
                    </div>

                @empty

                    <div class="col-12">
                        <div class="alert alert-info">
                            <i class="bi bi-search"></i>
                            No hay mascotas publicadas con esos criterios.
                        </div>
                    </div>

                @endforelse

            </div>

            <!-- PAGINACIÓN -->
            <div class="mt-4">
                {{ $mascotas->links() }}
            </div>

        </main>
    </div>
</div>

@endsection

