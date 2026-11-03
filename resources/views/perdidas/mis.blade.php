@extends('layout.layout')

@section('title', 'Editar publicaciones perdidas')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perdidas-mis-view.css') }}">
@endpush

@section('content')

<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">

        @include('perdidas._menu', ['activo' => 'editar'])

        <!-- CONTENIDO PRINCIPAL -->
        <main class="perdidas-main col-12 col-md-9 col-xl-10 p-4 p-lg-5">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <div>
                    <h1 class="fw-bold text-dark mb-1">Mis publicaciones</h1>
                    <p class="mb-0">Edita los datos, marca a tu mascota como encontrada o elimina la publicación.</p>
                </div>
                <a href="{{ route('perdidas.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i> Agregar mascota perdida
                </a>
            </div>

            <div class="row g-4">

                @forelse ($mascotas as $mascota)
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="mis-card card h-100 border-0 shadow-sm">

                            @if ($mascota->imagen_url)
                                <img src="{{ $mascota->imagen_url }}" class="mis-img card-img-top" alt="Foto de {{ $mascota->nombre }}">
                            @else
                                <div class="mis-sin-foto d-flex align-items-center justify-content-center">
                                    <i class="bi bi-image fs-1 text-secondary"></i>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">{{ $mascota->nombre }}</h4>

                                <div class="mb-2">
                                    <span class="badge {{ $mascota->estado === 'Encontrada' ? 'text-bg-success' : 'text-bg-danger' }}">{{ $mascota->estado }}</span>
                                    <span class="badge bg-info text-dark">{{ $mascota->especie }}</span>
                                </div>

                                <p class="text-secondary small mb-1"><i class="bi bi-geo-alt-fill"></i> {{ $mascota->lugar_perdida }}</p>
                                <p class="text-secondary small mb-3"><i class="bi bi-calendar-event"></i> {{ $mascota->fecha_perdida->format('d/m/Y') }}</p>

                                <div class="d-flex gap-2 mt-auto">
                                    <a href="{{ route('perdidas.edit', $mascota->id) }}" class="mis-btn btn btn-success flex-fill">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>

                                    <form action="{{ route('perdidas.destroy', $mascota->id) }}" method="POST" class="flex-fill"
                                          onsubmit="return confirm('¿Seguro que quieres eliminar la publicación de {{ addslashes($mascota->nombre) }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mis-btn btn btn-outline-danger w-100">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="mis-vacio text-center p-5 rounded-4">
                            <i class="bi bi-clipboard2-heart fs-1"></i>
                            <h4 class="mt-2">Aún no tienes publicaciones</h4>
                            <p class="mb-3">Cuando publiques una mascota perdida, podrás editarla desde aquí.</p>
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
