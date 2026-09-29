<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/indexcss.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card-body">
        <h2>Iniciar Sesion</h2>
        <p>Bienvenido a nuestra pagina web, Sigue ayudando a que mas mascotas encuentren un hogar lleno de amor. </p>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-open-fill" style="color: #1F5639;"></i></span>
                <input type="email" class="form-control" placeholder="Correo electrónico" >
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill" style="color: #1F5639;"></i></span>
                <input type="password" class="form-control" placeholder="Contraseña" >
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="recordarme">
                <label class="form-check-label" for="recordarme" style="color: #1F5639;">Recordarme</label>
            </div>
            <a href="/" class="m-0" style="text-decoration: none; color: #1F5639;">¿Olvidaste tu contraseña?</a>
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-success" type="button"><a style="text-decoration: none; color: white;" href="">Iniciar Sesion</a></button>
        </div>

        <div class="divider my-3">
            <span>o</span>
        </div>

        <div class="button-google">
        <button type="button" class="btn btn-google w-100 py-2 d-flex align-items-center justify-content-center gap-2">
            <!-- Icono SVG oficial de Google -->
            <svg width="20" height="20" viewBox="0 0 48 48">
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
            </svg>
            <span>Continuar con Google</span>
        </button>
        </div>

    </div>








</body>
</html>
@section ('content')
    <div>
        <h1>holaa</h1>
    </div>
@endsection
