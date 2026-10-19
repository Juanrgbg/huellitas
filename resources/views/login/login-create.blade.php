@extends('layout.layout')


@section('title','Login')

@section('content')
<body class="bg-success-subtle">
  
  {{-- Imagen de fondo de registrarse --}}
  <img src="{{ asset('images/login/fondo_create-count.png') }}" alt="fondito" class="detras">
  
  {{-- Se pospone la imagen para que quede detras de el contenedor que guarda el formulario de registrar usuario  --}}
    <style>
      <style>
        .atras {
          position: fixed;          
          top: 0;
          left: 0;
          width: 100%;
          height: 100vh;
          height: 100dvh;           /* en celular respeta la barra del navegador */
          object-fit: cover;        
          object-position: center top; 
          z-index: -1;
        }

        @media (max-width: 768px) {
          .atras {
            object-position: 70% center; 
          }
        }
        </style>
    </style>

<main class="container min-vh-100 d-flex align-items-center py-4">
  <div class="row  align-items-center g-4 mx-2" style="width: 100%">
    
    <!-- Nombre de la Marca-Titulo-->
    <section class=" text-center ">
      <h1 class="display-5 fw-bold text-success mb-1">Huellitas a Casa</h1>
      <p class="fw-semibold text-success-emphasis mb-4">Todos merecemos un hogar donde nos reciban con amor, .</p>
    </section>
    
    
    <!-- Tarjeta de login -->
    <section class="col-lg-5  mx-auto mt-0 p-0">
      <div class="card border-0 shadow rounded-4">
        <div class="card-body p-4 p-md-5 px-5">
          
          <h2 class="h3 fw-bold mb-2 text-center">Registrate ahora</h2>
          <p class="text-body-secondary small mb-4">
            Bienvenido aqui podras registrarte,  para poder ayudar a  que mascotas encuentren un hogar.
          </p>
          {{-- Se encuentra el input de nombre --}}
          <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <p class="">Nombre</p>
            <div class="input-group mb-3">
              <span class="input-group-text bg-white"><i class="bi bi-chat-text-fill text-success"></i></span>
              <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ingresa tu nombre" aria-label="Nombre" required>
              @error('name') <div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            
            {{-- Se encuentra el input de Apellido --}}
            <p class="mt-3">Apellido</p>
            <div class="input-group mb-3">
              <span class="input-group-text bg-white"><i class="bi bi-archive-fill text-success"></i></span>
              <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control @error('apellido') is-invalid @enderror" placeholder="Ingresa tu apellido" aria-label="Apellido" required>
              @error('apellido') <div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            
            {{-- Se encuentra el input del correo electronico --}}
            <p class="">Correo electronico</p>
            <div class="input-group mb-3">
              <span class="input-group-text bg-white"><i class="bi bi-envelope-fill text-success"></i></span>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Ingresa tu correo electronico" aria-label="Apellido" required>
                @error('email') <div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              
              
              {{-- Se encuentra el input de Contrasena --}}
              <p>Contraseña</p>
              <div class="input-group mb-3">
                <span class="input-group-text bg-white"><i class="bi bi-key-fill text-success"></i></span>
                <input type="password" name="password" id="clave" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" aria-label="Contraseña" required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div>@enderror
              </div>
              
              {{-- Se encuentra el input de confirmacion de Contrasena --}}
              <p>Confirmar contraseña</p>
              <div class="input-group mb-3">
                <span class="input-group-text bg-white"><i class="bi bi-lock-fill text-success"></i></span>
                <input type="password" name="password_confirmation" id="clave" class="form-control" placeholder="confirmar contraseña" aria-label="Contraseña" required>
              </div>
              

              <button type="submit" class="btn btn-success btn-lg w-100 mb-3">Crear cuenta</button>
              
            </form>
            
          </div>
        </div>
      </section>
      
    </div>
  </main>

  @endsection