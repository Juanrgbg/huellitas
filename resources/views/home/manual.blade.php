@extends('layout.layout')

@section('title', 'Manual de usuario | Huellitas a Casa')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/manual-view.css') }}">
@endpush

@section('content')

  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid mx-5" style="">
      <a class="tarjeta-animal navbar-brand fs-3 fs-lg-2 fw-bold d-flex align-items-center" style="color: #1F5639" href="{{ route('home') }}">
        <i class="tarjeta-animal bi bi-house-heart-fill me-2 fs-2 " style="color: #1F5639"></i>Huellitas a Casa
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
      aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav mx-auto text-center text-lg-start">
        <li class="nav-item"><a class=" texto nav-link text-success fs-5" href="{{ route('home') }}">Inicio</a></li>
        <li class="nav-item"><a class=" texto nav-link text-success fs-5" href="{{ route('mascotas.index') }}">Mascotas</a></li>
        <li class="nav-item"><a class=" texto nav-link text-success fs-5" href="{{ route('perdidas.index') }}">Mascotas perdidas</a></li>
        <li class="nav-item"><a class=" texto nav-link text-success fs-5" href="{{ route('quienesSomos') }}">Quiénes Somos</a></li>
        <li class="nav-item"><a class=" texto nav-link active text-success fs-5" href="{{ route('manual') }}">Manual</a></li>
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


<main class="manual">
    <header class="manual__header">
        <h1>Aprende a usar Huellitas a Casa</h1>
        <p>
            En este video te mostramos cómo usar la página, desde crear tu cuenta
            hasta ayudar a una mascota a volver a casa.
        </p>
    </header>

    <div class="manual__grid">
        <section aria-label="Video del manual de usuario">
            <div class="manual__player">
                {{-- Opción A: video alojado en tu proyecto --}}
                <video
                    id="manualVideo"
                    controls
                    preload="metadata"
                    poster="{{ asset('img/manual-portada.jpg') }}">
                    <source src="{{ asset('videos/manual-huellitas.mp4') }}" type="video/mp4">
                    <track kind="captions" srclang="es" label="Español"
                           src="{{ asset('videos/manual-huellitas-es.vtt') }}" default>
                    Tu navegador no puede reproducir este video.
                    <a href="{{ asset('videos/manual-huellitas.mp4') }}">Descárgalo aquí</a>.
                </video>

                {{-- Opción B: YouTube (comenta el <video> de arriba y descomenta esto).
                     Los capítulos con tiempos no funcionan con el iframe sin la API de YouTube.
                <iframe
                    src="https://www.youtube.com/embed/TU_ID_DE_VIDEO"
                    title="Manual de usuario de Huellitas a Casa"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; picture-in-picture"
                    allowfullscreen></iframe>
                --}}
            </div>
            <p class="manual__caption">Duración aproximada: 5 minutos. Puedes activar los subtítulos desde el reproductor.</p>
        </section>

        <aside class="manual__chapters" aria-label="Capítulos del video">
            <h2>Salta al tema que necesitas</h2>
            <ol>
                <li>
                    <button type="button" data-time="0">
                        <span><strong>Crear tu cuenta</strong><small>Registro e inicio de sesión</small></span>
                        <time>0:00</time>
                    </button>
                </li>
                <li>
                    <button type="button" data-time="45">
                        <span><strong>Reportar una mascota perdida</strong><small>Fotos, descripción y ubicación</small></span>
                        <time>0:45</time>
                    </button>
                </li>
                <li>
                    <button type="button" data-time="120">
                        <span><strong>Buscar mascotas</strong><small>Filtros por zona, especie y fecha</small></span>
                        <time>2:00</time>
                    </button>
                </li>
                <li>
                    <button type="button" data-time="190">
                        <span><strong>Adoptar</strong><small>Ver mascotas y enviar tu solicitud</small></span>
                        <time>3:10</time>
                    </button>
                </li>
                <li>
                    <button type="button" data-time="255">
                        <span><strong>Contactar a otros usuarios</strong><small>Mensajes y seguimiento</small></span>
                        <time>4:15</time>
                    </button>
                </li>
            </ol>
        </aside>
    </div>


</main>

<script>
    (function () {
        const video = document.getElementById('manualVideo');
        if (!video) return;

        const buttons = document.querySelectorAll('.manual__chapters button[data-time]');

        buttons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                video.currentTime = parseFloat(btn.dataset.time);
                video.play();
                video.scrollIntoView({ behavior: 'smooth', block: 'center' });
            });
        });

        // Marca el capítulo que se está viendo
        video.addEventListener('timeupdate', function () {
            let activo = null;
            buttons.forEach(function (btn) {
                if (video.currentTime >= parseFloat(btn.dataset.time)) activo = btn;
            });
            buttons.forEach(function (btn) {
                btn.setAttribute('aria-current', btn === activo ? 'true' : 'false');
            });
        });
    })();
</script>
@endsection