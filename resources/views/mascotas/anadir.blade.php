@extends('layout.layout')

@section('title', 'Añadir Mascota')

@section('content')

<style>
    /* =========================
       COLORES HUELLITAS
       ========================= */
    :root {
        --verde-oscuro: #1F5639;
        --verde-menta: #DCEFE3;
        --beige: #F5F1E8;
        --blanco: #FFFFFF;
        --gris: #6B7280;
        --verde-azulado: #2C9678;
        --borde: #D1D5DB;
    }

    body {
        background-color: var(--beige);
    }

    /* =========================
       SIDEBAR
       ========================= */
    .sidebar {
        background-color: var(--verde-oscuro);
        min-height: 100vh;
    }

    .logo-huellitas {
        color: white;
        text-decoration: none;
        font-size: 25px;
        font-weight: 800;
    }

    .menu-item {
        display: block;
        color: white;
        text-decoration: none;
        padding: 12px 15px;
        margin-bottom: 7px;
        border-radius: 8px;
        font-size: 17px;
        transition: 0.2s;
    }

    .menu-item:hover {
        background-color: var(--verde-azulado);
        color: white;
    }

    .menu-item.active {
        background-color: var(--verde-azulado);
        font-weight: 600;
    }

    /* =========================
       CONTENIDO
       ========================= */
    .contenido {
        padding: 35px;
    }

    .titulo {
        color: var(--verde-oscuro);
        font-weight: 800;
        margin-bottom: 5px;
    }

    .subtitulo {
        color: var(--gris);
        margin-bottom: 30px;
    }

    /* =========================
       TARJETAS
       ========================= */
    .form-card {
        background-color: var(--blanco);
        border-radius: 15px;
        padding: 28px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
        margin-bottom: 25px;
    }

    .section-title {
        color: var(--verde-oscuro);
        font-weight: 800;
        margin-bottom: 20px;
    }

    .form-label {
        color: var(--verde-oscuro);
        font-weight: 600;
    }

    .form-control,
    .form-select {
        border: 1px solid var(--borde);
        border-radius: 8px;
        padding: 11px 13px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--verde-azulado);
        box-shadow: 0 0 0 0.2rem rgba(44, 150, 120, 0.15);
    }

    .campo-obligatorio {
        color: #c0392b;
    }

    /* =========================
       SUBIR IMAGEN
       ========================= */
    .upload-box {
        border: 2px dashed var(--borde);
        border-radius: 12px;
        min-height: 230px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 25px;
        background-color: #fafafa;
        cursor: pointer;
        transition: 0.2s;
    }

    .upload-box:hover {
        border-color: var(--verde-azulado);
        background-color: var(--verde-menta);
    }

    .upload-icon {
        font-size: 45px;
        color: var(--verde-azulado);
    }

    .upload-text {
        color: var(--verde-oscuro);
        font-weight: 600;
        margin-top: 10px;
    }

    .upload-info {
        color: var(--gris);
        font-size: 14px;
    }

    #imagen {
        display: none;
    }

    /* =========================
       PREVISUALIZACIÓN
       ========================= */
    #preview {
        max-width: 100%;
        max-height: 200px;
        border-radius: 10px;
        display: none;
        object-fit: cover;
    }

    /* =========================
       BOTÓN
       ========================= */
    .btn-publicar {
        background-color: var(--verde-oscuro);
        color: white;
        border: none;
        border-radius: 9px;
        padding: 13px 25px;
        font-weight: 700;
        transition: 0.2s;
    }

    .btn-publicar:hover {
        background-color: var(--verde-azulado);
        color: white;
    }

    /* =========================
       MÓVIL
       ========================= */
    @media (max-width: 767.98px) {

        .sidebar {
            position: fixed;
            top: 0;
            left: -280px;
            width: 260px;
            height: 100vh;
            z-index: 1050;
            transition: left 0.3s;
            box-shadow: 4px 0 12px rgba(0, 0, 0, 0.2);
        }

        .sidebar.active-mobile {
            left: 0;
        }

        .contenido {
            padding: 20px 15px;
        }

        .form-card {
            padding: 20px;
        }
    }
</style>


<div class="container-fluid">
    <div class="row">

        {{-- =========================
             SIDEBAR
             ========================= --}}
        <aside class="col-md-2 d-none d-md-block sidebar">

            <div class="p-3 mb-3">
                <a href="#" class="logo-huellitas">
                    <i class="bi bi-house-heart-fill"></i>
                    Huellitas a casa
                </a>
            </div>

            <nav class="px-2">

                <a href="#" class="menu-item">
                    <i class="bi bi-house me-2"></i>
                    Inicio
                </a>

                <a href="{{ route('mascotas.index') }}" class="menu-item">
                    <i class="bi bi-heart-fill me-2"></i>
                    Mascotas
                </a>

                <a href="{{ route('mascotas.create') }}" class="menu-item active">
                    <i class="bi bi-plus-circle-fill me-2"></i>
                    Añadir Mascota
                </a>

                <a href="#" class="menu-item">
                    <i class="bi bi-person-fill me-2"></i>
                    Perfil
                </a>

                <a href="#" class="menu-item">
                    <i class="bi bi-arrow-bar-right me-2"></i>
                    Cerrar Sesión
                </a>

            </nav>
        </aside>


        {{-- =========================
             CONTENIDO PRINCIPAL
             ========================= --}}
        <main class="col-12 col-md-10 contenido">

            {{-- Botón menú móvil --}}
            <button
                type="button"
                id="show"
                class="btn d-md-none mb-3"
                style="color: var(--verde-oscuro); font-size: 25px;">
                <i class="bi bi-list"></i>
            </button>


            {{-- TÍTULO --}}
            <h1 class="titulo">
                Añadir Mascota
            </h1>

            <p class="subtitulo">
                Completa la información para encontrarle un nuevo hogar.
            </p>


            {{-- =========================
                 INFORMACIÓN BÁSICA
                 ========================= --}}
            <div class="form-card">

                <h3 class="section-title">
                    <i class="bi bi-heart-fill me-2"></i>
                    Información básica
                </h3>

                <div class="row g-4">

                    {{-- Nombre --}}
                    <div class="col-md-6">

                        <label for="nombre" class="form-label">
                            Nombre
                            <span class="campo-obligatorio">*</span>
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control"
                            placeholder="Ej. Max">

                    </div>


                    {{-- Especie --}}
                    <div class="col-md-6">

                        <label for="especie" class="form-label">
                            Especie
                            <span class="campo-obligatorio">*</span>
                        </label>

                        <select
                            id="especie"
                            name="especie"
                            class="form-select">

                            <option value="">Selecciona una especie</option>
                            <option value="perro">Perro</option>
                            <option value="gato">Gato</option>
                            <option value="ave">Ave</option>
                            <option value="otro">Otra</option>

                        </select>

                    </div>


                    {{-- Raza --}}
                    <div class="col-md-6">

                        <label for="raza" class="form-label">
                            Raza
                        </label>

                        <input
                            type="text"
                            id="raza"
                            name="raza"
                            class="form-control"
                            placeholder="Ej. Labrador">

                    </div>


                    {{-- Edad --}}
                    <div class="col-md-6">

                        <label for="edad" class="form-label">
                            Edad (aprox.)
                            <span class="campo-obligatorio">*</span>
                        </label>

                        <input
                            type="number"
                            id="edad"
                            name="edad"
                            class="form-control"
                            placeholder="Ej. 3"
                            min="0">

                    </div>


                    {{-- Tamaño --}}
                    <div class="col-md-6">

                        <label for="tamano" class="form-label">
                            Tamaño
                            <span class="campo-obligatorio">*</span>
                        </label>

                        <select
                            id="tamano"
                            name="tamano"
                            class="form-select">

                            <option value="">Selecciona el tamaño</option>
                            <option value="pequeno">Pequeño</option>
                            <option value="mediano">Mediano</option>
                            <option value="grande">Grande</option>

                        </select>

                    </div>


                    {{-- Sexo --}}
                    <div class="col-md-6">

                        <label for="sexo" class="form-label">
                            Sexo
                            <span class="campo-obligatorio">*</span>
                        </label>

                        <select
                            id="sexo"
                            name="sexo"
                            class="form-select">

                            <option value="">Selecciona el sexo</option>
                            <option value="macho">Macho</option>
                            <option value="hembra">Hembra</option>

                        </select>

                    </div>


                    {{-- Descripción --}}
                    <div class="col-12">

                        <label for="descripcion" class="form-label">
                            Descripción
                            <span class="campo-obligatorio">*</span>
                        </label>

                        <textarea
                            id="descripcion"
                            name="descripcion"
                            class="form-control"
                            rows="5"
                            placeholder="Cuéntanos un poco sobre la mascota..."></textarea>

                    </div>

                </div>

            </div>


            {{-- =========================
                 IMAGEN
                 ========================= --}}
            <div class="form-card">

                <h3 class="section-title">
                    <i class="bi bi-camera-fill me-2"></i>
                    Foto de la mascota
                </h3>

                <label for="imagen" class="upload-box">

                    <div id="upload-content">

                        <i class="bi bi-cloud-arrow-up upload-icon"></i>

                        <div class="upload-text">
                            Haz clic para seleccionar una imagen
                        </div>

                        <div class="upload-info">
                            JPG o PNG · Máximo 5 MB
                        </div>

                    </div>

                    <img id="preview" alt="Vista previa">

                </label>

                <input
                    type="file"
                    id="imagen"
                    name="imagen"
                    accept="image/jpeg,image/png">

            </div>


            {{-- =========================
                 DATOS DE CONTACTO
                 ========================= --}}
            <div class="form-card">

                <h3 class="section-title">
                    <i class="bi bi-person-lines-fill me-2"></i>
                    Datos de contacto
                </h3>

                <div class="row g-4">

                    {{-- Nombre --}}
                    <div class="col-md-4">

                        <label for="contacto_nombre" class="form-label">
                            Tu nombre
                            <span class="campo-obligatorio">*</span>
                        </label>

                        <input
                            type="text"
                            id="contacto_nombre"
                            name="contacto_nombre"
                            class="form-control"
                            placeholder="Tu nombre">

                    </div>


                    {{-- Correo --}}
                    <div class="col-md-4">

                        <label for="correo" class="form-label">
                            Correo electrónico
                            <span class="campo-obligatorio">*</span>
                        </label>

                        <input
                            type="email"
                            id="correo"
                            name="correo"
                            class="form-control"
                            placeholder="correo@ejemplo.com">

                    </div>


                    {{-- Teléfono --}}
                    <div class="col-md-4">

                        <label for="telefono" class="form-label">
                            Teléfono
                            <span class="campo-obligatorio">*</span>
                        </label>

                        <input
                            type="tel"
                            id="telefono"
                            name="telefono"
                            class="form-control"
                            placeholder="300 000 0000">

                    </div>

                </div>

            </div>


            {{-- =========================
                 BOTÓN
                 ========================= --}}
            <div class="text-end mb-5">

                <button
                    type="button"
                    class="btn btn-publicar">

                    <i class="bi bi-heart-fill me-2"></i>
                    Publicar Mascota

                </button>

            </div>

        </main>

    </div>
</div>


{{-- =========================
     JAVASCRIPT
     ========================= --}}
<script>

    // Menú móvil
    document.addEventListener("DOMContentLoaded", function () {

        const showBtn = document.getElementById("show");
        const sidebar = document.querySelector(".sidebar");

        if (showBtn && sidebar) {

            showBtn.addEventListener("click", function () {
                sidebar.classList.toggle("active-mobile");
            });

        }

    });


    // Vista previa de imagen
    const imagen = document.getElementById("imagen");
    const preview = document.getElementById("preview");
    const uploadContent = document.getElementById("upload-content");

    imagen.addEventListener("change", function () {

        const archivo = this.files[0];

        if (!archivo) {
            return;
        }

        // Comprobar tamaño máximo: 5 MB
        if (archivo.size > 5 * 1024 * 1024) {

            alert("La imagen no puede superar los 5 MB.");

            this.value = "";
            preview.style.display = "none";
            uploadContent.style.display = "block";

            return;
        }

        // Mostrar imagen
        const lector = new FileReader();

        lector.onload = function (e) {

            preview.src = e.target.result;
            preview.style.display = "block";
            uploadContent.style.display = "none";

        };

        lector.readAsDataURL(archivo);

    });

</script>

@endsection