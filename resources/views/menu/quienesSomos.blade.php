@extends('layout.layout')

@section('title','nosotras')

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/somos-view.css') }}">
@endpush

{{-- NAVBAR --}}
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid mx-5" style="">
      <a class="tarjeta-animal navbar-brand fs-3 fs-lg-2 fw-bold d-flex align-items-center" style="color: #1F5639" href="#">
        <i class="tarjeta-animal bi bi-house-heart-fill me-2 fs-2 " style="color: #1F5639"></i>Huellitas a Casa
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
      aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav mx-auto text-center text-lg-start">
        <li class="nav-item"><a class=" texto nav-link active text-success fs-5" href="#">Inicio</a></li>
        <li class="nav-item"><a class=" texto nav-link text-success fs-5" href="{{ route('mascotas.index') }}">Mascotas</a></li>
        <li class="nav-item"><a class=" texto nav-link text-success fs-5" href="{{ route('perdidas.index') }}">Mascotas perdidas</a></li>
        <li class="nav-item"><a class=" texto nav-link text-success fs-5" href="{{ route('quienesSomos') }}">Quiénes Somos</a></li>
        <li class="nav-item"><a class=" texto nav-link text-success fs-5" href="{{ route('manual') }}">Manual</a></li>
      </ul>
      
      <div class="d-flex align-items-center justify-content-center gap-2 mt-2 mt-lg-0">
        
        @guest
        <a href="{{ route('login') }}" class="btn btn-link" aria-label="Iniciar sesión">
          <i class="tarjeta-animal bi bi-person text-success fs-4"></i>
        </a>
        <a href="{{ route('login') }}" class="btn fw-bold text-white" style="background:#2C9678">
          Iniciar Sesión
        </a>
        @endguest
        
        @auth
        
        @php $usuario = auth()->user(); @endphp 
        
        <a href="{{ route('profile.index') }}" class="d-flex align-items-center gap-2 text-decoration-none me-2">
          @if ($usuario->avatar)
          <img src="{{ $usuario->avatar }}"
          alt="Foto de {{ $usuario->name }}"
          width="40" height="40"
          class="rounded-circle object-fit-cover border border-2 border-success"
          referrerpolicy="no-referrer">
          
          @else
          <span class="rounded-circle d-inline-flex align-items-center justify-content-center text-white fw-bold"
          style="width:40px; height:40px; background:#2C9678;">
          {{ $usuario->initials() }}
        </span>
        @endif
        
        <span class="text-success fw-semibold">Hola, {{ $usuario->name }}</span>
      </a>
      
      <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-success btn-sm">Cerrar sesión</button>
      </form>
      @endauth
    </div>
  </div>
</div>
</nav>

<div class="container-fluid">
    <div class="row min-vh-100 justify-content-center">


        <!-- CONTENIDO PRINCIPAL -->
        <main class="col-12 col-md-9 col-xl-10 p-4 p-lg-5 mx-5 m-5" style="background-color: #F5F1E8; ">

            <!-- HERO BANNER -->
            <div class="quienes-hero-card text-white p-4 p-md-5 mb-4">
                <div class="d-inline-flex align-items-center gap-2 badge-sena px-3 py-1 rounded-pill mb-3">
                    <i class="bi bi-mortarboard-fill"></i>
                    <span>SENA Caldas • Tecnico en Desarrollo de Software</span>
                </div>
                <h1 class="display-6 fw-bold mb-2">Un poco de nosotros</h1>
                <p class="lead mb-0 text-white-50 fs-5" style="max-width: 800px;">
                    Somos tres estudiantes de un tecnico del SENA del pueblo de <strong class="text-white">Riosucio, Caldas</strong>, unidos por una sola misión: utilizar la tecnico para salvar y cambiar la vida de las mascotas que más lo necesitan.
                </p>
            </div>


            <!-- LOS TRES CHICOS DEL SENA -->
            <div class="mb-5">
                <div class="text-center mb-4">
                    <span class="badge rounded-pill px-3 py-2 text-white mb-2" style="background-color: #2C9678;">
                        <i class="bi bi-stars me-1"></i> 
                    </span>
                    <h2 class="fw-bold display-6" style="color: #1F5639;">Equipo de desarrollo</h2>
                    <p class="text-secondary fs-5" style="max-width: 650px; margin: 0 auto;">
                        Detrás de cada pantalla, botón y funcionalidad de Huellitas a Casa estamos nosotros tres trabajando con dedicación.
                    </p>
                </div>

                <div class="row g-4 justify-content-center">

                    <!-- CHICO 1: FRONTEND & UI/UX -->
                    <div class="col-12 col-md-6 col-xl-4 team-col">
                        <div class="team-card h-100 p-4 text-center d-flex flex-column">
                            <div class="team-avatar-wrapper mb-3">
                                <div class="team-avatar">
                                    <i class="bi bi-laptop"></i>
                                </div>
                                <span class="team-badge-sena">Aprendiz SENA</span>
                            </div>

                            <h4 class="fw-bold mb-1" style="color: #1F5639;">Juan David</h4>
                            <span class="badge bg-success-subtle text-success mb-3 align-self-center">
                                Desarrollo Frontend & UI/UX
                            </span>

                            <p class="text-secondary small mb-3">
                                Encargado de diseñar la experiencia visual, las animaciones fluidas y de garantizar que la plataforma sea intuitiva, moderna y cálida tanto en computadores como en celulares.
                            </p>

                        </div>
                    </div>

                    <!-- CHICO 2: BACKEND & BASE DE DATOS -->
                    <div class="col-12 col-md-6 col-xl-4 team-col">
                        <div class="team-card h-100 p-4 text-center d-flex flex-column">
                            <div class="team-avatar-wrapper mb-3">
                                <div class="team-avatar">
                                    <i class="bi bi-database-check"></i>
                                </div>
                                <span class="team-badge-sena">Aprendiz SENA</span>
                            </div>

                            <h4 class="fw-bold mb-1" style="color: #1F5639;">Samuel</h4>
                            <span class="badge bg-success-subtle text-success mb-3 align-self-center">
                                Desarrollo Backend & Lógica
                            </span>

                            <p class="text-secondary small mb-3">
                                Diseña la arquitectura del servidor en Laravel, la seguridad de las cuentas de usuario, el registro de publicaciones.
                            </p>
                        </div>
                    </div>

                    <!-- CHICO 3: GESTIÓN & ENLACE COMUNITARIO -->
                    <div class="col-12 col-md-6 col-xl-4 team-col">
                        <div class="team-card h-100 p-4 text-center d-flex flex-column">
                            <div class="team-avatar-wrapper mb-3">
                                <div class="team-avatar">
                                    <i class="bi bi-heart-fill"></i>
                                </div>
                                <span class="team-badge-sena">Aprendiz SENA</span>
                            </div>

                            <h4 class="fw-bold mb-1" style="color: #1F5639;">Andres</h4>
                            <span class="badge bg-success-subtle text-success mb-3 align-self-center">
                                Enlace Comunitario & Rescate
                            </span>

                            <p class="text-secondary small mb-3">
                               Desarrolla la arquitectura de bases de datos y el almacenamiento seguro de las fotografías de cada animalito.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- PILARES Y VALORES -->
            <div class="mb-5">
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="pilar-card p-4 text-center">
                            <div class="pilar-icon mb-2">
                                <i class="bi bi-shield-heart"></i>
                            </div>
                            <h5 class="fw-bold" style="color: #1F5639;">Bienestar Animal</h5>
                            <p class="text-muted small mb-0">Priorizamos siempre la salud física y emocional de cada animalito que llega a la plataforma.</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="pilar-card p-4 text-center">
                            <h5 class="fw-bold" style="color: #1F5639;">Compromiso SENA</h5>
                            <p class="text-muted small mb-0">Formación técnica con sentido humano para resolver desafíos de nuestra sociedad.</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="pilar-card p-4 text-center">
                            <h5 class="fw-bold" style="color: #1F5639;">Adopción Responsable</h5>
                            <p class="text-muted small mb-0">Conectamos adoptantes comprometidos que brinden hogares permanentes y amorosos.</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="pilar-card p-4 text-center">
                            <h5 class="fw-bold" style="color: #1F5639;">Orgullo Riosuceño</h5>
                            <p class="text-muted small mb-0">Nacidos en Riosucio, Caldas, soñamos con inspirar a más jóvenes en toda Colombia.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BANNER DE LLAMADO A LA ACCIÓN -->
            <div class="cta-quienes p-4 p-md-5 text-center">
                <img src="{{ asset('images/huellita_transparente.png') }}" alt="huellita" width="55" height="55" class="mb-3">
                <h3 class="fw-bold mb-2" style="color: #1F5639;">¿Quieres ser parte de esta bonita historia?</h3>
                <p class="text-secondary mb-4 mx-auto" style="max-width: 600px;">
                    Puedes explorar a las mascotas que están esperando un hogar hoy mismo o contactarnos si deseas colaborar con nosotros.
                </p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="{{ route('mascotas.index') }}" class="btn btn-cta-adopta px-4 py-2">
                        <i class="bi bi-paw-fill me-2"></i>Ver Mascotas en Adopción
                    </a>
                </div>
            </div>

        </main>
    </div>
</div>

@endsection