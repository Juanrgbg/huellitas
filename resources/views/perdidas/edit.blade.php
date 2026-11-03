@extends('layout.layout')

@section('title', 'Editar mascota perdida')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perdidas-edit-view.css') }}">
@endpush

@section('content')

<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">

        @include('perdidas._menu', ['activo' => 'editar'])

        <main class="perdidas-main col-12 col-md-9 col-xl-10 p-4 p-lg-5">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-11 col-xxl-10">

                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-lg-5">

                            <a href="{{ route('perdidas.mis') }}" class="edit-volver small text-decoration-none">
                                <i class="bi bi-arrow-left"></i> Volver a mis publicaciones
                            </a>

                            <h1 class="perdidas-titulo fw-bold mt-2">Editar a {{ $mascota->nombre }}</h1>
                            <p class="text-secondary">Actualiza los datos. Si ya apareció, cambia el estado a «Encontrada».</p>

                            @include('perdidas._form', [
                                'accion' => route('perdidas.update', $mascota->id),
                                'metodo' => 'PUT',
                                'textoBoton' => 'Guardar cambios',
                                'mascota' => $mascota,
                            ])

                        </div>
                    </div>

                </div>
            </div>
        </main>

    </div>
</div>

@endsection
