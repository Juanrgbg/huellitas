{{-- Menú lateral del apartado "Mascotas perdidas". Uso: @include('perdidas._menu', ['activo' => 'ver']) --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/perdidas-menu-view.css') }}">
@endpush

<aside class="perdidas-menu col-12 col-md-3 col-xl-2 text-white p-3">

    <!-- Cabecera -->
    <div class="d-flex justify-content-between align-items-center mb-md-4">
        <h2 class="fw-bold fst-italic mb-0 fs-4">
            <i class="bi bi-house-heart-fill"></i>
            Huellitas a casa
        </h2>

        <button class="btn btn-outline-light d-md-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuPerdidas"
                aria-controls="menuPerdidas"
                aria-expanded="false"
                aria-label="Abrir menú">
            <i class="bi bi-list fs-4"></i>
        </button>
    </div>

    <!-- Navegación -->
    <div class="collapse d-md-block mt-3 mt-md-0" id="menuPerdidas">
        <nav class="nav flex-column gap-1">

            <a href="{{ route('home') }}" class="perdidas-link nav-link text-white rounded p-3">
                <i class="bi bi-house"></i> Inicio
            </a>

            <a href="{{ route('mascotas.index') }}" class="perdidas-link nav-link text-white rounded p-3">
                <i class="bi bi-house-heart-fill"></i> Mascotas
            </a>

            <p class="perdidas-menu-titulo small text-uppercase fw-semibold mt-3 mb-1 px-2">Mascotas perdidas</p>

            <a href="{{ route('perdidas.index') }}"
               class="perdidas-link nav-link text-white rounded p-3 {{ ($activo ?? '') === 'ver' ? 'is-active' : '' }}">
                <i class="bi bi-search-heart"></i> Ver publicadas
            </a>

            <a href="{{ route('perdidas.mis') }}"
               class="perdidas-link nav-link text-white rounded p-3 {{ ($activo ?? '') === 'editar' ? 'is-active' : '' }}">
                <i class="bi bi-pencil-square"></i> Editar publicaciones
            </a>

            <a href="{{ route('perdidas.create') }}"
               class="perdidas-link nav-link text-white rounded p-3 {{ ($activo ?? '') === 'agregar' ? 'is-active' : '' }}">
                <i class="bi bi-plus-circle"></i> Agregar mascota perdida
            </a>

            @auth
                <a href="{{ route('profile.index') }}" class="perdidas-link nav-link text-white rounded p-3 mt-3">
                    <i class="bi bi-person-fill"></i> Perfil
                </a>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="perdidas-link nav-link text-white rounded p-3 w-100 text-start border-0">
                        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="perdidas-link nav-link text-white rounded p-3 mt-3">
                    <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
                </a>
            @endauth

        </nav>
    </div>
</aside>
