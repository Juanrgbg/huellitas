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

    {{-- El @yield('title tiene como funcion heredar el titulo delas otras views') --}}
    <title>@yield('title')</title>
</head>
<style>
    /* Se */
    body {
        font-family: "Baloo 2", sans-serif;
        
    }

</style>
<body style="background:#F5F1E8">


<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="mb-4">
                <a href="{{ route('profile.index') }}"
                   class="text-decoration-none"
                   style="color: #1F5639;">
                    <i class="bi bi-arrow-left me-2"></i>
                    Volver a mi perfil
                </a>

                <h2 class="fw-bold mt-3"
                    style="color: #1F5639;">
                    Editar perfil
                </h2>

                <p class="text-secondary">
                    Actualiza tus datos para que otros usuarios
                    puedan contactarte sobre las mascotas en adopción.
                </p>
            </div>

            {{-- Errores de validación --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Revisa los siguientes campos:</strong>
                        <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                 @endforeach
                        </ul>
                </div>
                @endif

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('profile.update') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        {{-- Foto actual --}}
                        <div class="text-center mb-4">
                        @if ($usuario->avatar)
                            <img src="{{ $usuario->avatar }}" alt="Foto de perfil" width="100" height="100"
                            class="rounded-circle object-fit-cover border border-3 border-success"
                            referrerpolicy="no-referrer">
                        @else
                            <span class="rounded-circle d-inline-flex align-items-center justify-content-center text-white fw-bold fs-1"
                            style="width:100px; height:100px; background:#2C9678;">
                            {{ $usuario->initials() }}
                            </span>
                        @endif
                        </div>



                        {{-- Nombre --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                Nombre
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $usuario->name) }}"
                                maxlength="255"
                                required
                            >

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Apellido --}}
                        <div class="mb-3">
                            <label for="apellido" class="form-label fw-semibold">
                                Apellido
                            </label>

                            <input
                                type="text"
                                name="apellido"
                                id="apellido"
                                class="form-control @error('apellido') is-invalid @enderror"
                                value="{{ old('apellido', $usuario->apellido) }}"
                                maxlength="255"
                                required
                            >

                            @error('apellido')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Correo --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                Correo electrónico
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $usuario->email) }}"
                                maxlength="255"
                                required
                                @readonly($usuario->google_id)
                            >

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">

                            {{-- Teléfono --}}
                            <div class="col-md-6 mb-3">
                                <label for="phone"
                                       class="form-label fw-semibold">
                                    Teléfono / WhatsApp
                                </label>

                                <input
                                    type="tel"
                                    name="phone"
                                    id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $usuario->phone) }}"
                                    maxlength="20"
                                    placeholder="Ej. 3001234567"
                                >

                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Ciudad --}}
                            <div class="col-md-6 mb-3">
                                <label for="city"
                                       class="form-label fw-semibold">
                                    Ciudad
                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    id="city"
                                    class="form-control @error('city') is-invalid @enderror"
                                    value="{{ old('city', $usuario->city) }}"
                                    maxlength="100"
                                    placeholder="Ej. Riosucio"
                                >

                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        {{-- Información no editable --}}
                        <div class="p-3 rounded-3 mb-4"
                             style="background-color: #F0F6F1;">

                            <p class="mb-1 fw-semibold"
                               style="color: #1F5639;">
                                <i class="bi bi-shield-check me-2"></i>
                                Información de la cuenta
                            </p>

                            <small class="text-secondary">
                            </small>
                        </div>

                        {{-- Acciones --}}
                        <div class="d-flex flex-column
                                    flex-sm-row justify-content-end gap-2">

                            <a href="{{ route('profile.index') }}"
                               class="btn btn-outline-secondary px-4">
                                Cancelar
                            </a>

                            <button type="submit"
                                    class="btn text-white px-4"
                                    style="background-color: #1F5639;">

                                <i class="bi bi-check-circle me-2"></i>
                                Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


