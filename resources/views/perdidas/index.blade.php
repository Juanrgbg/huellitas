@extends('layout.layout')

@section('title', 'Mascotas perdidas')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perdidas-index-view.css') }}">
@endpush

@section('content')

<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">

        @include('perdidas._menu', ['activo' => 'ver'])

        <!-- CONTENIDO PRINCIPAL -->
        <main class="perdidas-main col-12 col-md-9 col-xl-10 p-4 p-lg-5">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            <!-- TÍTULO Y BUSCADOR -->
            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-7">
                    <h1 class="fw-bold text-dark">Mascotas perdidas</h1>
                    <p class="ms-2 mb-3">Ayúdanos a que cada huellita vuelva a casa. Si ves a alguna, contacta a su familia.</p>
                </div>

                <div class="col-12 col-lg-5">
                    <form action="{{ route('perdidas.index') }}" method="GET">
                        @if (request('especie')) <input type="hidden" name="especie" value="{{ request('especie') }}"> @endif
                        @if (request('estado')) <input type="hidden" name="estado" value="{{ request('estado') }}"> @endif

                        <div class="input-group">
                            <input type="search" name="buscar" class="form-control form-control-lg"
                                   placeholder="Buscar por nombre, raza o lugar..." value="{{ request('buscar') }}">
                            <button class="btn btn-light border" type="submit" aria-label="Buscar">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- FILTROS -->
            <div class="d-flex flex-wrap gap-2 mb-2">
                <a href="{{ route('perdidas.index', request()->only('buscar', 'estado')) }}"
                   class="perdidas-filtro btn btn-success {{ request('especie') ? '' : 'is-active' }}">Todas</a>

                @foreach (\App\Models\MascotaPerdida::ESPECIES as $valor => $etiqueta)
                    <a href="{{ route('perdidas.index', array_merge(request()->only('buscar', 'estado'), ['especie' => $valor])) }}"
                       class="perdidas-filtro btn btn-success {{ request('especie') === $valor ? 'is-active' : '' }}">{{ $etiqueta }}</a>
                @endforeach
            </div>

            <div class="d-flex flex-wrap gap-2 mb-4">
                <a href="{{ route('perdidas.index', request()->only('buscar', 'especie')) }}"
                   class="perdidas-filtro btn btn-outline-success {{ request('estado') ? '' : 'is-active' }}">Todos los estados</a>

                @foreach (\App\Models\MascotaPerdida::ESTADOS as $estado)
                    <a href="{{ route('perdidas.index', array_merge(request()->only('buscar', 'especie'), ['estado' => $estado])) }}"
                       class="perdidas-filtro btn btn-outline-success {{ request('estado') === $estado ? 'is-active' : '' }}">{{ $estado === 'Perdida' ? 'Perdidas' : 'Encontradas' }}</a>
                @endforeach
            </div>

            <!-- MASCOTAS PERDIDAS PUBLICADAS -->
            <div class="row g-4">

                @forelse ($mascotas as $mascota)

                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                        <div class="perdida-card card h-100 shadow-sm border-0">

                            @if ($mascota->imagen_url)
                                <img src="{{ $mascota->imagen_url }}" class="perdida-img card-img-top"
                                     alt="Foto de {{ $mascota->nombre }}">
                            @else
                                <div class="perdida-sin-foto d-flex align-items-center justify-content-center">
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
                                    <span class="badge {{ $mascota->estado === 'Encontrada' ? 'text-bg-success' : 'text-bg-danger' }}">{{ $mascota->estado }}</span>
                                    <span class="badge bg-info text-dark">{{ $mascota->especie }}</span>
                                </div>

                                <p class="text-secondary small mb-1">
                                    <i class="bi bi-geo-alt-fill"></i> {{ $mascota->lugar_perdida }}
                                </p>
                                <p class="text-secondary small mb-2">
                                    <i class="bi bi-calendar-event"></i> {{ $mascota->fecha_perdida->format('d/m/Y') }}
                                </p>

                                <p class="card-text">{{ \Illuminate\Support\Str::limit($mascota->descripcion, 90) }}</p>

                                <button type="button" class="perdida-btn-detalles btn btn-success mt-auto"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalPerdida{{ $mascota->id }}">
                                    Ver detalles
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL DE DETALLES -->
                    <div class="modal fade" id="modalPerdida{{ $mascota->id }}" tabindex="-1"
                         aria-labelledby="tituloPerdida{{ $mascota->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                            <div class="modal-content border-0 rounded-4 overflow-hidden">

                                <div class="perdida-modal-header modal-header text-white">
                                    <h5 class="modal-title fw-bold" id="tituloPerdida{{ $mascota->id }}">
                                        <i class="bi bi-search-heart"></i> {{ $mascota->nombre }}
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>

                                <div class="modal-body p-4">
                                    <div class="row g-4">

                                        <div class="col-12 col-lg-5">
                                            @if ($mascota->imagen_url)
                                                <img src="{{ $mascota->imagen_url }}" class="perdida-modal-img img-fluid rounded-3 w-100 shadow-sm"
                                                     alt="Foto de {{ $mascota->nombre }}">
                                            @else
                                                <div class="perdida-sin-foto rounded-3 d-flex align-items-center justify-content-center">
                                                    <div class="text-center text-secondary">
                                                        <i class="bi bi-image fs-1"></i>
                                                        <p class="mb-0">Sin fotografía</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-12 col-lg-7">
                                            <p class="mb-2">
                                                <span class="badge {{ $mascota->estado === 'Encontrada' ? 'text-bg-success' : 'text-bg-danger' }}">{{ $mascota->estado }}</span>
                                                <span class="badge bg-info text-dark">{{ $mascota->especie }}</span>
                                            </p>

                                            <ul class="list-unstyled mb-3">
                                                <li><strong>Raza:</strong> {{ $mascota->raza ?: 'No especificada' }}</li>
                                                <li><strong>Color:</strong> {{ $mascota->color }}</li>
                                                <li><strong>Sexo:</strong> {{ $mascota->sexo }}</li>
                                                <li><strong>Se perdió el:</strong> {{ $mascota->fecha_perdida->format('d/m/Y') }}</li>
                                                <li><strong>Lugar:</strong> {{ $mascota->lugar_perdida }}</li>
                                            </ul>

                                            <h6 class="fw-bold">Señas particulares</h6>
                                            <p>{{ $mascota->descripcion }}</p>

                                            <div class="perdida-contacto rounded-3 p-3">
                                                <h6 class="fw-bold mb-2">¿La viste? Contacta a su familia</h6>
                                                <p class="mb-1"><i class="bi bi-person me-2"></i>{{ trim(($mascota->usuario->name ?? '') . ' ' . ($mascota->usuario->apellido ?? '')) ?: 'Usuario' }}</p>
                                                @if ($mascota->usuario?->phone)
                                                    <p class="mb-1"><i class="bi bi-telephone me-2"></i><a href="tel:{{ $mascota->usuario->phone }}">{{ $mascota->usuario->phone }}</a></p>
                                                @endif
                                                @if ($mascota->usuario?->email)
                                                    <p class="mb-0"><i class="bi bi-envelope me-2"></i><a href="mailto:{{ $mascota->usuario->email }}">{{ $mascota->usuario->email }}</a></p>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <div class="perdidas-vacio text-center p-5 rounded-4">
                            <i class="bi bi-search-heart fs-1"></i>
                            <h4 class="mt-2">No hay mascotas perdidas con esos filtros</h4>
                            <p class="mb-3">Si perdiste a tu mascota, publícala para que más personas te ayuden a encontrarla.</p>
                            <a href="{{ route('perdidas.create') }}" class="btn btn-success">Agregar mascota perdida</a>
                        </div>
                    </div>
                @endforelse

            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $mascotas->links() }}
            </div>

        </main>
    </div>
</div>

@endsection
