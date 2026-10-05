@extends('layout.layout')

@section('title', 'home')

@section('content')


  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid mx-5" style="">
      <a class="navbar-brand fs-3 fs-lg-2 fw-bold d-flex align-items-center" style="color: #1F5639" href="#">
        <i class="bi bi-house-heart-fill me-2 fs-2 " style="color: #1F5639"></i>Huellitas a Casa
      </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
      aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav mx-auto text-center text-lg-start">
        <li class="nav-item"><a class="nav-link active text-success fs-5" href="#">Inicio</a></li>
        <li class="nav-item"><a class="nav-link text-success fs-5" href="{{ route('mascotas.index') }}">Mascotas</a></li>
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
        <img src="{{ asset('images/huellita_beige.png') }}" alt="" width="44" height="44" style="object-fit:contain">
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
            <img src="data:image/jpeg;base64,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" alt="Perro sonriendo"
            class="img-fluid rounded-3 w-100 object-fit-cover" style="height:190px">
          </div>
          <div class="col-7 ps-3">
            <h5 class="fw-bold" style="color:#1F5639">Ellos también sienten, también aman.</h5>
            <p class="small mb-2" style="color:#2C9678">Dales la oportunidad de ser parte de tu familia.</p>
            <img src="{{ asset('images/huellita.png') }}" alt="" width="20" height="20" style="object-fit:contain">
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
        <img src="{{ asset('images/huellita_beige.png') }}" alt="" width="48" height="48" style="object-fit:contain">
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