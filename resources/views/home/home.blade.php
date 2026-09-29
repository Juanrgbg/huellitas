@extends('layout.layout')

@section('title', 'home')

@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand fs-3 fs-lg-2 fw-bold d-flex align-items-center" style="color: #1F5639" href="#">
      <i class="bi bi-house-heart-fill me-2 fs-2" style="color: #1F5639"></i>Huellitas a Casa
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav mx-auto text-center text-lg-start">
        <li class="nav-item"><a class="nav-link active text-success fs-5" href="#">Inicio</a></li>
        <li class="nav-item"><a class="nav-link text-success fs-5" href="#">Mascotas</a></li>
        <li class="nav-item"><a class="nav-link text-success fs-5" href="#">Quiénes Somos</a></li>
        <li class="nav-item"><a class="nav-link text-success fs-5" href="#">Contacto</a></li>
      </ul>

      <div class="d-flex align-items-center justify-content-center gap-2 mt-2 mt-lg-0">
        <button class="btn btn-link"><i class="bi bi-search text-success fs-5"></i></button>
        <button class="btn btn-link"><i class="bi bi-person text-success fs-4"></i></button>
        <button class="btn fw-bold text-white" style="background:#2C9678"><a style="text-decoration: none; color:white;" href="{{ route('login.index') }}">Iniciar Sesión</a></button>
      </div>
    </div>
  </div>
</nav>

{{-- Hero --}}
<header class="position-relative text-white py-5 px-3 px-md-5 d-flex align-items-center"
        style="background: url('{{ asset('images/head_home.png') }}') center/cover no-repeat; min-height: 480px;">

  <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-25" style="z-index: 1;"></div>

  <div class="container-fluid position-relative py-3 py-md-5" style="z-index: 2;">
    <div class="row align-items-center">
      <div class="col-12 col-md-8 col-lg-6 text-center text-md-start">
        <h1 class="display-5 display-md-4 fw-bold mb-2 text-white">Huellitas a Casa</h1>
        <h3 class="h3 h2-md fw-semibold mb-3 text-white">Cada huellita merece un hogar.</h3>
        <p class="fs-5 mb-4 text-white opacity-90">
          Adopta, no compres. Dale una segunda oportunidad a un amigo que te lo agradecerá para siempre.
        </p>
        <button type="button"
                class="btn btn-lg px-4 py-2 rounded-pill fw-medium text-white shadow-sm d-inline-flex align-items-center gap-2"
                style="background-color: #2C9678; border: none;">
          <i class="bi bi-paw-fill fs-5"></i>
          <span>Ver mascotas</span>
        </button>
      </div>
    </div>
  </div>
</header>

<section class="container my-4">
  <div class="row g-4">

    {{-- ===== Columna izquierda: buscar por especie ===== --}}
    <div class="col-12 col-lg-8">

      {{-- Encabezado --}}
      <div class="d-flex align-items-center gap-3 mb-3">
        <img src="{{ asset('images/huellita_verde.png') }}" alt="" width="44" height="44" style="object-fit:contain">
        <div>
          <h4 class="fw-bold mb-0" style="color:#1F5639">Buscar por especie</h4>
          <p class="mb-0 small" style="color:#2C9678">Encuentra a tu compañero ideal</p>
        </div>
      </div>

      {{-- Tres tarjetas --}}
      <div class="row row-cols-1 row-cols-sm-3 g-3">

        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
            <div class="card-body d-flex flex-column align-items-center justify-content-center py-4">
              <img src="{{ asset('images/perro.png') }}" alt="Perro" class="img-fluid mb-3" style="max-height:80px; object-fit:contain">
              <a href="#" class="stretched-link text-decoration-none fw-bold fs-5" style="color:#1F5639">Perros &rarr;</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
            <div class="card-body d-flex flex-column align-items-center justify-content-center py-4">
              <img src="{{ asset('images/gato.png') }}" alt="Gato" class="img-fluid mb-3" style="max-height:80px; object-fit:contain">
              <a href="#" class="stretched-link text-decoration-none fw-bold fs-5" style="color:#1F5639">Gatos &rarr;</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100 border-0 shadow-sm rounded-4 text-center">
            <div class="card-body d-flex flex-column align-items-center justify-content-center py-4">
              <img src="{{ asset('images/conejo.png') }}" alt="Conejo" class="img-fluid mb-3" style="max-height:80px; object-fit:contain">
              <a href="#" class="stretched-link text-decoration-none fw-bold" style="color:#1F5639">Especies exóticas &rarr;</a>
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- ===== Columna derecha: tarjeta con foto ===== --}}
    <div class="col-12 col-lg-4">
      <div class="card h-100 border-0 shadow-sm rounded-4 position-relative">
        <i class="bi bi-heart position-absolute top-0 end-0 m-3 fs-5" style="color:#1F5639"></i>
        <div class="row g-0 h-100 align-items-center p-3">
          <div class="col-5">
            <img src="{{ asset('images/perro_promo.png') }}" alt="Perro sonriendo"
                 class="img-fluid rounded-3 w-100 object-fit-cover" style="height:190px">
          </div>
          <div class="col-7 ps-3">
            <h5 class="fw-bold" style="color:#1F5639">Ellos también sienten, también aman.</h5>
            <p class="small mb-2" style="color:#2C9678">Dales la oportunidad de ser parte de tu familia.</p>
            <img src="{{ asset('images/huellita_verde.png') }}" alt="" width="20" height="20" style="object-fit:contain">
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

{{-- ===== Franja: Adopta / Dona / Comparte ===== --}}
<section class="container my-4">
  <div class="rounded-4 py-4 px-3" style="background:#e3f1ec">
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-around gap-4">

      <a href="#" class="d-flex align-items-center gap-3 text-decoration-none flex-fill justify-content-center">
        <img src="{{ asset('images/huellita_verde.png') }}" alt="" width="48" height="48" style="object-fit:contain">
        <div>
          <h5 class="fw-bold mb-0" style="color:#1F5639">Adopta</h5>
          <p class="mb-0 small" style="color:#2C9678">Cambia una vida.</p>
        </div>
      </a>

      <div class="vr d-none d-md-block"></div>

      <a href="#" class="d-flex align-items-center gap-3 text-decoration-none flex-fill justify-content-center">
        <i class="bi bi-heart" style="font-size:2.8rem; color:#1F5639"></i>
        <div>
          <h5 class="fw-bold mb-0" style="color:#1F5639">Dona</h5>
          <p class="mb-0 small" style="color:#2C9678">Apoya nuestra causa.</p>
        </div>
      </a>

      <div class="vr d-none d-md-block"></div>

      <a href="#" class="d-flex align-items-center gap-3 text-decoration-none flex-fill justify-content-center">
        <i class="bi bi-house" style="font-size:2.8rem; color:#1F5639"></i>
        <div>
          <h5 class="fw-bold mb-0" style="color:#1F5639">Comparte</h5>
          <p class="mb-0 small" style="color:#2C9678">Ayuda a difundir.</p>
        </div>
      </a>

    </div>
  </div>
</section>





@endsection