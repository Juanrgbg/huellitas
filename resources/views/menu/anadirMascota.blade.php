@extends('layout.layout')

@section('title','Create pets')


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

            <a href="{{ route('home') }}" class="nav-link text-white rounded p-3" style="background-color: #196741;">
                <i class="bi bi-paw-fill"></i> Mascotas
            </a>

            <a href="{{ route('home') }}" class="nav-link text-white rounded p-3" style="background-color: #196741;">
                <i class="bi bi-plus-circle"></i> Añadir Mascota
            </a>

            <a href="{{ route('home') }}" class="nav-link text-white rounded p-3" style="background-color: #196741;">
                <i class="bi bi-person-fill"></i> Perfil
            </a>

            <a href="{{ route('home') }}"class="nav-link text-white rounded p-3" style="background-color: #196741;">
                <i class="bi bi-box-arrow-right"></i> Iniciar sesión
            </a>

        </nav>
    </div>
</aside>

        <!-- CONTENIDO DE FORMULARIO CREAR PUBLICACION O MASCOTA -->

        <main class=" row-cols-1  col-md-12 col-xl-10 p-4 p-lg-5" 
              style="background-color: #F5F1E8;">

            <div class="container-fluid" style="">
                <div class="row mb-3 justify-content-center">
                    <div class="col-12 col-xl-11 col-xxl-10">

                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-4 p-lg-5">

                                    <h1 class=" fw-bold text-verde">Publicar mascota</h1>

                                    <p class="text-secondary">Completa la información para que más personas puedan conocer y adoptar a tu mascota.</p>

                                    <form class="row g-4" onsubmit="ir('buscar');return false">

                                    <div class="col-lg-7">

                                    <div class="caja mb-4">

                                    <h2 class="h6 fw-bold text-verde mb-3">Información básica</h2>

                                    <div class="row g-3">

                                    <div class="col-12">
                                        <label class="form-label small fw-semibold">Nombre *</label>
                                        <input class="form-control" placeholder="Ej. Luna" required>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label small fw-semibold">Especie *</label>
                                        <select class="form-select">
                                            <option selected disabled>Selecciona una especie</option>
                                            <option>Perro</option>
                                            <option>Gato</option>
                                            <option>Exótica</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label small fw-semibold">Raza</label>
                                        <input class="form-control" placeholder="Ej. Mestizo, Bulldog, Siamés...">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label small fw-semibold">Edad (aprox.) *</label>
                                        <select class="form-select">
                                            <option disable selected>Selecciona una edad</option>
                                            <option>Menos de 1 año</option>
                                            <option>1–3 años</option>
                                            <option>4+ años</option>
                                        </select>
                                    </div>

                                    </div>

                                    </div>

                                    <div class="caja">
                                    <h2 class="h6 fw-bold text-verde mb-3">Información adicional</h2>
                                    <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Tamaño *</label>
                                        <select class="form-select">
                                            <option disabled selected>Selecciona un tamaño</option>
                                            <option>Pequeño</option>
                                            <option>Mediano</option>
                                            <option>Grande</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Sexo *</label>
                                        <select class="form-select">
                                            <option disabled selected>Selecciona un sexo</option>
                                            <option>Macho</option>
                                            <option>Hembra</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label small fw-semibold">Descripción *</label>
                                        <textarea maxlength="100" class="form-control" rows="4" placeholder="Cuéntanos su historia, personalidad y lo que necesita..."></textarea>
                                    </div>

                                    </div>

                                    </div>

                                    </div>

                                    <div class="col-lg-5">
                                        <div class="caja mb-4">
                                            <h2 class="h6 fw-bold text-verde mb-3">Imagen de la mascota</h2>
                                            <label class="subida d-block" style="cursor:pointer"><i class="bi bi-cloud-arrow-up"></i>
                                            <div class="fw-semibold mt-2">Arrastra una imagen aquí</div><div class="small">o haz clic para seleccionar</div>
                                            <div class="small mt-3">Formatos: JPG, PNG. Tamaño máximo: 5MB</div>
                                            <input type="file" accept="image/*" hidden></label>
                                        </div>

                                    <div class="caja">

                                    <h2 class="h6 fw-bold text-verde mb-3">Datos de contacto</h2>

                                    <div class="mb-3">
                                        <label class="form-label small fw-semibold">Tu nombre *</label>
                                        <input class="form-control" placeholder="Ej. Juan Pérez">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small fw-semibold">Correo electrónico *</label>
                                        <input type="email" class="form-control" placeholder="ejemplo@correo.com">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label small fw-semibold">Teléfono *</label>
                                        <input type="tel" class="form-control" placeholder="Ej. 300 123 4567">
                                    </div>

                                    <button class="btn btn-huella w-100 py-2 text-light" style="background-color: #2C9678; border: none;">
                                        <i class="bi bi-paw me-2"></i>Publicar Mascota
                                    </button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection