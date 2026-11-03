@extends('layout.layout')

@section('title', 'Agregar mascota perdida')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perdidas-create-view.css') }}">
@endpush

@section('content')

<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">

        @include('perdidas._menu', ['activo' => 'agregar'])

        <main class="perdidas-main col-12 col-md-9 col-xl-10 p-4 p-lg-5">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-11 col-xxl-10">

                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-lg-5">

                            <h1 class="perdidas-titulo fw-bold">Agregar mascota perdida</h1>
                            <p class="text-secondary">Completa la información para que más personas puedan ayudarte a encontrarla.</p>

                            <div class="create-consejo rounded-3 p-3 mb-4">
                                <i class="bi bi-lightbulb-fill me-2"></i>
                                Una foto clara, el lugar exacto y las señas particulares (collar, manchas, cicatrices) ayudan mucho.
                            </div>

                            @include('perdidas._form', [
                                'accion' => route('perdidas.store'),
                                'metodo' => 'POST',
                                'textoBoton' => 'Publicar mascota perdida',
                                'mascota' => null,
                            ])

                        </div>
                    </div>

                </div>
            </div>
        </main>

    </div>
</div>

@endsection
