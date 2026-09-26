@extends('layout.layout')

@section('title', 'home')

@section('content')


{{-- Nombre de pagina y navbar --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand marca fs-2 fw-bold" style="color: #1F5639" href="#"><i class="bi bi-house-heart-fill me-1 fs-1 " style="color: #1F5639"></i>Huellitas a Casa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      {{-- Links redirigir a otra pagina --}}
      <ul class="navbar-nav mx-auto" style="color: #2C9678">
        <li class="nav-item"><a class="nav-link active text-success fs-5" href="#">Inicio</a></li>
        <li class="nav-item"><a class="nav-link text-success fs-5" href="#">Mascotas</a></li> 
        <li class="nav-item"><a class="nav-link text-success fs-5" href="#">Quiénes Somos</a></li>
        <li class="nav-item"><a class="nav-link text-success fs-5" href="#">Contacto</a></li>
      </ul>

      <div class="d-flex align-items-center gap-2 mt-2 mt-lg-0">
        <button class="btn btn-link text-verde"><i class="bi bi-search text-success" style="font-size:1.3rem"></i></button>
        <button class="btn btn-link text-verde"><i class="bi bi-person text-success " style="font-size:1.5rem"></i></button>
        <button class="btn fw-bold" style="background:#2C9678; color:white">Iniciar Sesión</button>
      </div>
    </div>
  </div>
</nav>
{{-- div que almacena todo el head incluido la imagen y el boton "Ver mascotas"  --}}
<div class="container col-xxl-8 px-4 py-5 mx-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    
    <!-- Imagen o ilustración del Hero -->
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSSVOHqJtRsVRoEsb2Z7A6nCzU_1xn0vCXUm0PnylkL1A&s=10" class="img-fluid rounded shadow-sm" loading="lazy">
    </div>
    
    <!-- Contenido de texto y botones -->
    <div class="col-lg-6 ">
      <h1 class="display-6 fw-bold text-body-emphasis lh-1 mb-2">Huellitas a Casa</h1>
      <h3 class="display-7 fw-bold text-body-emphasis lh-1 mb-2">Cada huellita cuenta.</h3>
      <p class="lead mt-4">Adopta, no compres. Dale una segunda oportunidad a un amigo que te lo agradece de por vida</p>
      {{-- Boton de head  para ver mascotas --}}
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 rounded-pill" style="background:#2C9678"><i class="bi bi-house"></i> Ver mascotas</button>
      </div>
    </div>
  </div>
</div>



<div class="container mt-0 my-3 " style="margin-left: -33%">
    <div class="d-flex align-items-center justify-content-center">
        <i class="bi bi-leaf-fill me-3" style="font-size: 35px; color: #1F5639;"></i>

        <div class="d-flex flex-column">
            <h4 class="fw-bold mb-0" style="color: #1F5639;">
                Busca tu Especie
            </h4>
            <p class="mb-0" style="color: #2C9678;">Encuentra a tu mejor amigo</p>
        </div>
    </div>
</div>


{{-- se utiliza un div para mostrar un titulo y tres targets donde cada una redirige a busca la especie de cada animal --}}
<div class="row g-3">

  <div class="card mx-5" style="width: 14rem; height: 12;">
    <div class="card-body">
      <h5 class="fw-bold text-center" style="margin-top: 100px;">Perros -></h5>
    </div>
  </div>
  
  <div class="card mx-5 " style="width: 15rem; height: 10;">
    <div class="card-body">
      <h5 class="fw-bold text-center" style="margin-top: 100px;">Gatos -></h5>
    </div>
  </div>

  <div class="card mx-5 " style="width: 15rem; height: 10;">
    <div class="card-body">
      <h5 class="fw-bold text-center" style="margin-top: 100px;">Especies Exoticas -></h5>
    </div>
  </div>
</div>
{{-- imagen derecha de la pantalla debajo del head --}}
<div>

</div>












@endsection