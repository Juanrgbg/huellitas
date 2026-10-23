
@extends('layout.layout')

@section('title', 'Editar publicaciones')

@section('content')

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
                <div class="alert alert-success alert-dismissible fade show"
                     role="alert">
                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Cerrar"></button>
                </div>
            @endif

            <!-- MENSAJES DE VALIDACIÓN -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Revisa los siguientes errores:</strong>

                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- TÍTULO -->
            <div class="row align-items-center mb-4">
                <div class="col-12">
                    <h1 class="fw-bold text-dark">
                        Edita tus publicaciones
                    </h1>

                    <p class="ms-2 mb-3">
                        Edita tus publicaciones sin complicarte la vida.
                    </p>
                </div>
            </div>

            <!-- FILTROS -->
            <div class="d-flex flex-wrap gap-2 mb-4">
                <a href="{{ route('editpets.index') }}"
                   class="btn btn-success">
                    Todos
                </a>

                @foreach (\App\Models\MenuMascotas::ESPECIES as $valor => $etiqueta)
                    <a href="{{ route('editpets.index', ['especie' => $valor]) }}" class="btn btn-success">
                        {{ $etiqueta }}
                    </a>
                @endforeach         
            </div>

            <!-- MASCOTAS PUBLICADAS -->
            <div class="row g-4">

                @forelse ($mascotas as $mascota)

                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">

                        <div class="card h-100 shadow-sm border-0">

                            <!-- IMAGEN -->
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

                            <!-- INFORMACIÓN DE LA MASCOTA -->
                            <div class="card-body d-flex flex-column gap-2">

                                <h4 class="card-title">
                                    {{ $mascota->nombre }}

                                    @if ($mascota->sexo === 'Macho')
                                        <i class="bi bi-gender-male text-primary"></i>
                                    @elseif ($mascota->sexo === 'Hembra')
                                        <i class="bi bi-gender-female text-danger"></i>
                                    @endif
                                </h4>

                                <div>
                                    <span class="badge bg-info text-dark">
                                        {{ $mascota->especie }}
                                    </span>
                                </div>

                                <p class="text-secondary mb-1">
                                    {{ $mascota->edad }} -
                                    {{ $mascota->tamano }}
                                </p>

                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($mascota->descripcion, 100) }}
                                </p>

                                <!-- BOTONES -->
                                <div class="d-flex gap-2 mt-auto">

                                    <button
                                        type="button"
                                        class="btn btn-outline-success flex-fill"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar{{ $mascota->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar
                                    </button>

                                    <button
                                        type="button"
                                        class="btn btn-danger flex-fill"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEliminar{{ $mascota->id }}">
                                        <i class="bi bi-trash2"></i>
                                        Eliminar
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL EDITAR PUBLICACIÓN -->
                    <div class="modal fade mt-0"
                         id="modalEditar{{ $mascota->id }}"
                         tabindex="-1"
                         aria-labelledby="tituloEditar{{ $mascota->id }}"
                         aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                            <div class="modal-content border-0 rounded-4">

                                <!-- ENCABEZADO -->
                                <div class="modal-header text-white"
                                     style="background-color: #20583F;">

                                    <h5 class="modal-title fw-bold"
                                        id="tituloEditar{{ $mascota->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                        Editar publicación: {{ $mascota->nombre }}
                                    </h5>

                                    <button type="button"
                                            class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"
                                            aria-label="Cerrar"></button>
                                </div>

                                <!-- FORMULARIO DE EDICIÓN -->
                                <form action="{{ route('mascotas.update', $mascota->id) }}"
                                      method="POST"
                                      enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')

                                    <div class="modal-body p-3">

                                        <!-- NOMBRE  Y ESPECIE-->
                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label for="nombre{{ $mascota->id }}"
                                                    class="form-label fw-semibold">
                                                    Nombre de la mascota
                                                </label>
                                                
                                            <input
                                                type="text"
                                                id="nombre{{ $mascota->id }}"
                                                name="nombre"
                                                class="form-control"
                                                value="{{ $mascota->nombre }}"
                                                required>
                                        </div>

                                        <!-- ESPECIE -->
                                        <div class="col-md-6 mb-3">
                                            <label for="especie{{ $mascota->id }}" class="form-label fw-semibold">
                                                Especie
                                            </label>
                                            
                                            <select id="especie{{ $mascota->id }}" name="especie" class="form-select" required>
                                            @foreach (array_keys(\App\Models\MenuMascotas::ESPECIES) as $opcion)
                                                <option value="{{ $opcion }}" @selected($mascota->especie === $opcion)>
                                                    {{ $opcion }}
                                                </option>
                                            @endforeach
                                        </select>                                       
                                    </div>
                                </div>

                                        <!-- SEXO Y EDAD -->
                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label for="sexo{{ $mascota->id }}"
                                                       class="form-label fw-semibold">
                                                    Sexo
                                                </label>

                                                <select
                                                    id="sexo{{ $mascota->id }}"
                                                    name="sexo"
                                                    class="form-select"
                                                    required>

                                                    <option value="Macho"
                                                        {{ $mascota->sexo == 'Macho' ? 'selected' : '' }}>
                                                        Macho
                                                    </option>

                                                    <option value="Hembra"
                                                        {{ $mascota->sexo == 'Hembra' ? 'selected' : '' }}>
                                                        Hembra
                                                    </option>

                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="edad{{ $mascota->id }}"
                                                       class="form-label fw-semibold">
                                                    Edad
                                                </label>

                                                <select id="edad{{ $mascota->id }}" name="edad" class="form-select" required>
                                                @foreach (['Menos de 1 año', '1-3 años', '4+ años'] as $opcion)
                                                    <option value="{{ $opcion }}" @selected($mascota->edad === $opcion)>{{ $opcion }}</option>
                                                @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <!-- TAMAÑO Y DESCRIPCION -->
                                        <div class="row">
                                            <div class=" col-md-6 mb-3">
                                                <label for="tamano{{ $mascota->id }}"
                                                    class="form-label fw-semibold">
                                                    Tamaño
                                                </label>
                                                
                                                <select
                                                id="tamano{{ $mascota->id }}"
                                                name="tamano"
                                                class="form-select"
                                                required>
                                                
                                                <option value="Pequeño"
                                                {{ $mascota->tamano == 'Pequeño' ? 'selected' : '' }}>
                                                Pequeño
                                            </option>
                                            
                                            <option value="Mediano"
                                            {{ $mascota->tamano == 'Mediano' ? 'selected' : '' }}>
                                            Mediano
                                        </option>
                                        
                                        <option value="Grande"
                                        {{ $mascota->tamano == 'Grande' ? 'selected' : '' }}>
                                        Grande
                                                </option>

                                            </select>
                                        </div>
                                        
                                        <!-- DESCRIPCIÓN -->
                                        <div class="col-md-6 mb-3">
                                            <label for="descripcion{{ $mascota->id }}"
                                                class="form-label fw-semibold">
                                                Descripción
                                            </label>
                                            
                                            <textarea
                                            id="descripcion{{ $mascota->id }}" name="descripcion" maxlength="500" class="form-control" rows="4" style="height: 50px" required>{{ $mascota->descripcion }}</textarea>
                                        </div>
                                        </div>
                                        
                                        {{-- CAMPO DE RAZA (NO ESTABA) --}}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="raza{{ $mascota->id }}" class="form-label fw-semibold">Raza</label>
                                                <input type="text" id="raza{{ $mascota->id }}" name="raza"
                                                    class="form-control" value="{{ $mascota->raza }}" maxlength="100">
                                            </div>
                                        </div>

                                        <!-- FOTO ACTUAL -->
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">
                                                Fotografía actual
                                            </label>

                                            @if ($mascota->imagen)
                                                <div class="mb-2">
                                                    <img
                                                        src="{{ asset('storage/' . $mascota->imagen) }}"
                                                        alt="Foto actual de {{ $mascota->nombre }}"
                                                        class="rounded"
                                                        style="width: 120px; height: 120px; object-fit: cover;">
                                                </div>
                                            @else
                                                <p class="text-secondary">
                                                    Esta mascota no tiene fotografía.
                                                </p>
                                            @endif

                                            <label for="imagen{{ $mascota->id }}"
                                                   class="form-label">
                                                Seleccionar una nueva foto (opcional)
                                            </label>

                                            <input
                                                type="file"
                                                id="imagen{{ $mascota->id }}"
                                                name="imagen"
                                                class="form-control"
                                                accept="image/*">
                                        </div>

                                    </div>

                                    <!-- BOTONES -->
                                    <div class="modal-footer">

                                        <button type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal">
                                            Cancelar
                                        </button>

                                        <button type="submit"
                                                class="btn btn-success"
                                                style="background-color: #20583F;">
                                            <i class="bi bi-check-circle"></i>
                                            Guardar cambios
                                        </button>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL CONFIRMAR ELIMINACIÓN -->
                    <div class="modal fade"
                         id="modalEliminar{{ $mascota->id }}"
                         tabindex="-1"
                         aria-labelledby="tituloEliminar{{ $mascota->id }}"
                         aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 rounded-4">

                                <div class="modal-header text-white bg-danger">
                                    <h5 class="modal-title"
                                        id="tituloEliminar{{ $mascota->id }}">
                                        <i class="bi bi-exclamation-triangle"></i>
                                        Eliminar publicación
                                    </h5>

                                    <button type="button"
                                            class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"
                                            aria-label="Cerrar"></button>
                                </div>

                                <div class="modal-body p-4">
                                    ¿Estás seguro de que deseas eliminar la publicación de
                                    <strong>{{ $mascota->nombre }}</strong>?

                                    <p class="text-secondary mt-2 mb-0">
                                        Esta acción no se puede deshacer.
                                    </p>
                                </div>

                                <div class="modal-footer">

                                    <button type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal">
                                        Cancelar
                                    </button>

                                    <form action="{{ route('mascotas.destroy', $mascota->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                            Sí, eliminar
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                @empty

                    <div class="col-12">
                        <div class="alert alert-info d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
                            <span>
                                <i class="bi bi-info-circle"></i>
                                @if (request()->filled('especie'))
                                    No tienes mascotas de esa especie.
                                @else
                                    Aún no tienes mascotas publicadas.
                                @endif
                            </span>
                            <a href="{{ route('anadirMascota.index') }}" class="btn btn-success btn-sm">
                                Publicar mi primera mascota
                            </a>
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

