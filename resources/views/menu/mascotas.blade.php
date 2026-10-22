
@extends('layout.layout')

@section('title', 'main')

@section('content')

<div class="container-fluid">
    <div class="row min-vh-100">
            <!-- MENÚ LATERAL -->
    <aside class="col-12 col-md-3 col-xl-2 text-white p-3"
    style="background-color: #20583F;">

    {{-- Cabecera: título + botón hamburguesa --}}
    <div class="d-flex justify-content-between align-items-center mb-md-4">
        <h2 class="fw-bold fst-italic mb-0 fs-4 fs-md-2">
            <i class="bi bi-house-heart-fill"></i>
            Huellitas a casa
        </h2>

        {{-- Solo visible en móvil (oculto desde md hacia arriba) --}}
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

    {{-- Menú: colapsado en móvil, siempre visible desde md (d-md-block) --}}
    <div class="collapse d-md-block mt-3 mt-md-0" id="menuLateral">
        <nav class="nav flex-column gap-1">

            <a href="{{ route('home') }}" class="nav-link text-white rounded p-3" style="background-color: #196741;">
                <i class="bi bi-house"></i> Inicio
            </a>

            <a href="{{ route('mascotas.index') }}" class="nav-link text-white rounded p-3" style="background-color: #196741;">
                <i class="bi bi-paw-fill"></i> Mascotas
            </a>

            <a href="{{ route('anadirMascota.index') }}" class="nav-link text-white rounded p-3" style="background-color: #196741;">
                <i class="bi bi-plus-circle"></i> Publica tu Mascota
            </a>
            
            <a href="{{ route('editpets.update') }}" class="nav-link text-white rounded p-3" style="background-color: #196741">
                Editar tus Publicaciones 
            </a>

            <a href="{{ route('profile.index') }}" class="nav-link text-white rounded p-3" style="background-color: #196741;">
                <i class="bi bi-person-fill"></i> Perfil
            </a>

            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
            <button class="nav-link text-white rounded p-3" style="background-color: #196741;">
                <i class="bi bi-box-arrow-right"></i> Cerrar sesion
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

                <a href="{{ route('mascotas.index', ['especie' => 'Perro']) }}"
                   class="btn btn-success">
                    Caninos
                </a>

                <a href="{{ route('mascotas.index', ['especie' => 'Gato']) }}"
                   class="btn btn-success">
                    Felinos
                </a>

                <a href="{{ route('mascotas.index', ['especie' => 'Exótica']) }}"
                   class="btn btn-success">
                    Especies Exóticas
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
                                    <i class="bi bi-eye"></i>
                                    Ver detalles
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
                                        <div class="col-12 col-md-5">

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
                                                <span class="badge fs-6"
                                                      style="background-color: #20583F;">
                                                    <i class="bi bi-paw-fill"></i>
                                                    {{ $mascota->especie }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- DATOS -->
                                        <div class="col-12 col-md-7">

                                            <h3 class="fw-bold mb-1">
                                                {{ $mascota->nombre }}

                                                @if ($mascota->sexo === 'Macho')
                                                    <i class="bi bi-gender-male text-primary"></i>
                                                @elseif ($mascota->sexo === 'Hembra')
                                                    <i class="bi bi-gender-female text-danger"></i>
                                                @endif
                                            </h3>

                                            <p class="text-secondary mb-3">
                                                Información de la mascota
                                            </p>

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

                                            <div class="mb-3">
                                                <h6 class="fw-bold">
                                                    {{-- Icono --}}
                                                    Ubicacion
                                                </h6>
                                                <p> </p>

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

                                            @if (isset($mascota->ubicacion) && $mascota->ubicacion)
                                                <div class="mb-3">
                                                    <h6 class="fw-bold">
                                                        <i class="bi bi-geo-alt text-success"></i>
                                                        Ubicación
                                                    </h6>
                                                    <p>{{ $mascota->ubicacion }}</p>
                                                </div>
                                            @endif

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

