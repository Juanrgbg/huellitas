@extends('layout.layout')

@section('title','main')
@section('content')

<body>
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

                <a href="{{ route('mascotas.index') }}"
                   class="nav-link text-white rounded p-3"
                   style="background-color: #196741;">
                    <i class="bi bi-paw-fill"></i> Mascotas
                </a>

                <a href="{{ route('anadirMascota.index') }}"
                   class="nav-link text-white rounded p-3"
                   style="background-color: #196741;">
                    <i class="bi bi-plus-circle"></i> Añadir Mascota
                </a>

                <a href="#"
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
                    Cerrar Sesión
                </button>
            </form>
            @endauth

            </nav>
        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="col-12 col-md-9 col-xl-10 p-4 p-lg-5"
              style="background-color: #F5F1E8;">

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
                    <form action="{{ route('mascotas.index') }}"
                          method="GET">
                        <div class="input-group">
                            <input type="search"
                                   name="buscar"
                                   class="form-control form-control-lg"
                                   placeholder="Buscar por nombre, raza..."
                                   value="{{ request('buscar') }}">

                            <button class="btn btn-light border"
                                    type="submit">
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
                    Perros
                </a>

                <a href="{{ route('mascotas.index', ['especie' => 'Gato']) }}"
                   class="btn btn-success">
                    Gatos
                </a>

                <a href="{{ route('mascotas.index', ['especie' => 'Exótica']) }}"
                   class="btn btn-success">
                    Especies Exóticas
                </a>
            </div>

            <!-- MASCOTAS PUBLICADAS -->
            <div class="row g-4">

                {{-- @forelse ($mascotas as $mascota) --}}

                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">

                        <div class="card h-100 shadow-sm">

                            {{-- @if ($mascota->imagen) --}}
                                <img src="#"
                                     class="card-img-top"
                                     {{-- alt="Foto de {{ $mascota->nombre }}" --}}
                                     style="height: 230px; object-fit: cover;">
                            {{-- @else --}}
                                <div class="bg-secondary-subtle d-flex align-items-center justify-content-center"
                                     style="height: 230px;">
                                    <i class="bi bi-image fs-1 text-secondary"></i>
                                </div>
                            {{-- @endif --}}

                            <div class="card-body d-flex flex-column">

                                <h4 class="card-title">
                                    {{-- {{ $mascota->nombre }} --}}

                                    <i class="bi bi-gender-ambiguous text-primary"></i>
                                </h4>

                                <div class="mb-2">
                                    <span class="badge bg-info text-dark">
                                        {{-- {{ $mascota->especie }} --}}
                                    </span>
                                </div>

                                <p class="text-secondary mb-2">
                                    {{-- {{ $mascota->edad }} -
                                    {{ $mascota->tamaño }} --}}
                                </p>

                                <p class="card-text">
                                    {{-- {{ $mascota->descripcion }} --}}
                                </p>

                                {{-- <a href="{{ route('mascotas.show', $mascota->id) }}"
                                   class="btn btn-success mt-auto"
                                   style="background-color: #20583F;">
                                    Ver detalles
                                </a> --}}

                            </div>
                        </div>

                    </div>

                {{-- @empty --}}

                    <div class="col-12">
                        <div class="alert alert-info">
                            <i class="bi bi-search"></i>
                            No hay mascotas publicadas con esos criterios.
                        </div>
                    </div>

                {{-- @endforelse --}}

            </div>

            <!-- PAGINACIÓN -->
            <div class="mt-4">
                {{-- {{ $mascotas->links() }} --}}
            </div>

        </main>
    </div>
</div>

</body>

@endsection
