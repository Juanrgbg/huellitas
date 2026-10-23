@extends('layout.layout')

@section('title','Create pets')

@section('content')

<div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">

        <!-- MENÚ LATERAL -->
        <aside class="col-12 col-md-3 col-xl-2 text-white p-3" style="background-color: #20583F;">

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
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit"
                                    class="nav-link text-white rounded p-3 w-100 text-start border-0"
                                    style="background-color: #196741;">
                                <i class="bi bi-box-arrow-right"></i>
                                Cerrar sesión
                            </button>
                        </form>
                    @endauth

                </nav>
            </div>
        </aside>

        <!-- CONTENIDO: FORMULARIO CREAR PUBLICACIÓN -->
        <main class="col-12 col-md-9 col-xl-10 p-4 p-lg-5" style="background-color: #F5F1E8;">

            <div class="container-fluid">
                <div class="row mb-3 justify-content-center">
                    <div class="col-12 col-xl-11 col-xxl-10">

                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-4 p-lg-5">

                                <h1 class="fw-bold text-verde">Dar en adopcion</h1>

                                <p class="text-secondary">Completa la información para que más personas puedan conocer y adoptar a tu mascota.</p>

                                <form class="row g-4" action="{{ route('anadirMascota.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- COLUMNA IZQUIERDA -->
                                    <div class="col-lg-7">

                                        <div class="caja mb-4">
                                            <h2 class="h6 fw-bold text-verde mb-3">Información básica</h2>

                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <label class="form-label small fw-semibold">Nombre *</label>
                                                    <input class="form-control @error('nombre') is-invalid @enderror"
                                                           name="nombre" value="{{ old('nombre') }}" placeholder="Ej. Luna" required>
                                                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label small fw-semibold">Especie *</label>
                                                    <select class="form-select @error('especie') is-invalid @enderror" name="especie" required>
                                                        <option value="" disabled @selected(! old('especie'))>Selecciona una especie</option>
                                                        @foreach (array_keys(\App\Models\MenuMascotas::ESPECIES) as $opcion)
                                                        <option value="{{ $opcion }}" @selected(old('especie') === $opcion)>{{ $opcion }}</option>
                                                    @endforeach
                                                    </select>
                                                    @error('especie') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label small fw-semibold">Raza</label>
                                                    <input class="form-control" name="raza" value="{{ old('raza') }}" placeholder="Ej. Mestizo, Bulldog, Siamés...">
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label small fw-semibold">Edad (aprox.) *</label>
                                                    <select class="form-select @error('edad') is-invalid @enderror" name="edad" required>
                                                        <option value="" disabled @selected(! old('edad'))>Selecciona una edad</option>
                                                        @foreach (['Menos de 1 año', '1-3 años', '4+ años'] as $opcion)
                                                            <option value="{{ $opcion }}" @selected(old('edad') === $opcion)>{{ $opcion }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('edad') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                            </div>
                                        </div>

                                        <div class="caja">
                                            <h2 class="h6 fw-bold text-verde mb-3">Información adicional</h2>

                                            <div class="row g-3">

                                                <div class="col-md-6">
                                                    <label class="form-label small fw-semibold">Tamaño *</label>
                                                    <select class="form-select @error('tamano') is-invalid @enderror" name="tamano" required>
                                                        <option value="" disabled @selected(! old('tamano'))>Selecciona un tamaño</option>
                                                        @foreach (['Pequeño', 'Mediano', 'Grande'] as $opcion)
                                                            <option value="{{ $opcion }}" @selected(old('tamano') === $opcion)>{{ $opcion }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('tamano') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label small fw-semibold">Sexo *</label>
                                                    <select class="form-select @error('sexo') is-invalid @enderror" name="sexo" required>
                                                        <option value="" disabled @selected(! old('sexo'))>Selecciona un sexo</option>
                                                        @foreach (['Macho', 'Hembra'] as $opcion)
                                                            <option value="{{ $opcion }}" @selected(old('sexo') === $opcion)>{{ $opcion }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('sexo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label small fw-semibold">Descripción *</label>
                                                    <textarea name="descripcion" maxlength="500" required
                                                              class="form-control @error('descripcion') is-invalid @enderror"
                                                              rows="4" placeholder="Cuéntanos su historia, personalidad y lo que necesita...">{{ old('descripcion') }}</textarea>
                                                    @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- COLUMNA DERECHA -->
                                    <div class="col-lg-5">

                                        <div class="caja mb-4">
                                            <h2 class="h6 fw-bold text-verde mb-3">Imagen de la mascota (Obligatoria)</h2>

                                            <label class="subida d-block" style="cursor:pointer">
                                                <i class="bi bi-cloud-arrow-up"></i>
                                                <div class="fw-semibold mt-2">Haz clic para seleccionar una imagen</div>
                                                <div id="nombreArchivo" class="small text-success"></div>
                                                <div class="small mt-3">Formatos: JPG, PNG. Tamaño máximo: 5MB</div>
                                                <input required type="file" name="imagen" accept="image/*" hidden
                                                       onchange="document.getElementById('nombreArchivo').textContent = this.files[0]?.name ?? ''">
                                            </label>
                                            @error('imagen') <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="caja">
                                            <h2 class="h6 fw-bold text-verde mb-3">Datos de contacto</h2>

                                            <p class="small text-secondary">Se mostrarán los datos de tu perfil.</p>

                                            <p class="mb-1"><i class="bi bi-person me-2"></i>{{ trim(auth()->user()->name . ' ' . auth()->user()->apellido) }}</p>
                                            <p class="mb-1"><i class="bi bi-envelope me-2"></i>{{ auth()->user()->email }}</p>
                                            <p class="mb-3"><i class="bi bi-telephone me-2"></i>{{ auth()->user()->phone ?: 'Sin teléfono registrado' }}</p>

                                            @unless (auth()->user()->phone)
                                                <div class="alert alert-warning small">
                                                    Agrega tu teléfono para que puedan contactarte.
                                                    <a href="{{ route('profile.profileEdit') }}">Editar perfil</a>
                                                </div>
                                            @endunless

                                            <button class="btn btn-huella w-100 py-2 text-light" style="background-color: #2C9678; border: none;">
                                                <i class="bi bi-paw me-2"></i>Publicar Mascota
                                            </button>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>

    </div>
</div>

@endsection