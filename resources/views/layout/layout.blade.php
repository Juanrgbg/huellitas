
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="path/to/icon-wizard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;600;800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- El @yield('title tiene como funcion heredar el titulo delas otras views') --}}
    <title>@yield('title')</title>
</head>
<style>
    /* Se */
    body {
        font-family: "Baloo 2", sans-serif;
        
    }

</style>
<body style="background:#F5F1E8">

@yield('content')


    <footer class="container-fluid  p-3 d-flex flex-wrap gap-4 justify-content-between align-items-center" style="background:#1F5639;">

  <!-- Marca -->
  <div class="d-flex flex-column">
    <div class="d-flex align-items-center">
      <i class="bi bi-house-heart-fill me-2 fs-1 text-light"></i>
      <h3 class="fs-3 fw-bold text-light mb-0">Huellitas a casa</h3>
    </div>
    <p class="text-light mb-0 ">Cada huellita merece un hogar</p>
  </div>

  <!-- Navegación -->
  <div class="list-pets">
    <ul class="list-unstyled mx-3 mb-0">
      <li class="mb-2"><a href="#" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover">Inicio</a></li>
      <li class="mb-2"><a href="#" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover">Mascotas</a></li>
      <li class="mb-2"><a href="#" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover">Quienes somos</a></li>
      <li class="mb-2"><a href="#" class="link-light link-underline-opacity-0 link-underline-opacity-100-hover">Contactanos</a></li>
    </ul>
  </div>

  <!-- Mensaje final -->
  <div class="footer-right d-flex align-items-center text-center text-md-start">
    <i class="bi bi-heart-fill me-3 fs-1 text-light"></i>
    <p class="text-light mb-0">Todos juntos podemos<br>hacer la diferencia</p>
  </div>

</footer>



    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>