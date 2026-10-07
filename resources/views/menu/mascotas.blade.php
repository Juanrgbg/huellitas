@extends('layout.layout')

@section('title','Mascotas')


@section('content')
<style>

.sidebar {
background-color: #1F5639;
min-height: 100vh;
}

.tabs {
border: solid 1px rgba(0, 0, 0, 0.13);
background-color: #1c683f;
border-radius: 7px;
font-size: 20px;
}

.tabs:hover {
background-color: #0b7436;
}

.tabs.active {
background-color: #0b7436;
}

.mascota-card {
min-height: 300px;
overflow: hidden;
}

.mascota-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.ver-detalles {
background-color: #1F5639;
}

.ver-detalles:hover {
background-color: #206942;
}


/* Ajustes para móviles */
@media (max-width: 767.98px) {
    /* Mantiene el sidebar oculto por defecto en móvil */
    .sidebar {
        position: fixed;
        top: 0;
        left: -280px; /* Lo oculta fuera de la pantalla a la izquierda */
        width: 260px;
        height: 100vh;
        z-index: 1050;
        transition: left 0.3s ease-in-out;
        box-shadow: 4px 0 10px rgba(0, 0, 0, 0.3);
    }

    /* Clase que activa el script cuando presionas el botón de las 3 líneas */
    .sidebar.active-mobile {
        left: 0 !important; /* Desliza el sidebar hacia adentro */
        display: block !important;
    }
}
</style>



 <div class="container-fluid">

        <div class="row">

            <!-- Sidebar -->
            <aside class="col-md-2 d-none d-md-block sidebar">

                <div class="text-start text-white p-2">
                    <a href="#" style="text-decoration:none; color: white; font-size: 30px;"><i class="bi bi-house-heart-fill"> Huellitas a casa</i></a>
                </div>

                <nav>

                <a href="#" class="d-block text-white p-2 text-decoration-none tabs">
                    <i class="bi bi-house"></i> Inicio
                </a>

                <a href="{{ route('mascotas.index') }}" class="d-block text-white p-2 text-decoration-none tabs {{ request()->routeIs('mascotas.*') ? 'active' : '' }}">
                    <img src="{{ asset('images/HuellaBlancaa.png') }}" width="25px" height="25px"> Mascotas
                </a>

                <a href="{{ route('mascotas.create') }}" class="d-block text-white p-2 text-decoration-none tabs">
                    <i class="bi bi-plus-circle-fill"></i> Añadir Mascota
                </a>

                <a href="#" class="d-block text-white p-2 text-decoration-none tabs">
                    <i class="bi bi-person-fill"></i> Perfil
                </a>

                <a href="#" class="d-block text-white p-2 text-decoration-none tabs">
                    <i class="bi bi-arrow-bar-right"></i> Cerrar Sesión
                </a>

            </nav>

        </aside>


        <!-- CONTENIDO -->
        <main class="col-12 col-md-10 p-2 p-md-5">

            <!-- BOTON CELULAR -->
            <a class="d-md-none" id="show" style="text-decoration: none; color: gray; font-size: 25px;" href=""><i class="bi bi-justify"></i></a>

            
            <div class="d-flex justify-content-between">
                    <h1>Buscar Mascotas</h1>
                    <div class="input-group mb-2 w-25">
                        <input type="text" class="form-control" placeholder="Buscar por nombre,raza...">
                        <button class="input-group-text"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                    
                <p class="ps-3">Encuentra a tu nuevo mejor amigo.</p>
                
                <div class="d-flex gap-2 m-3">
                    <button type="button" class="btn btn-success">Todos</button>
                    <button type="button" class="btn btn-success">Perros</button>
                    <button type="button" class="btn btn-success">Gatos</button>
                    <button type="button" class="btn btn-success">Especies Exoticas</button>
                </div>

                <div class="row g-3">

                <div class="col-12 col-md-3">
                    <div class="card mascota-card">
                        <img src="{{ asset('images/max.jpg') }}" class="card-img-top mascota-img" alt="Max">
                        <div class="card-body">
                            <h3>Max <i style="color: rgb(0, 162, 255)" class="bi bi-gender-male"></i></h3>
                            <p class="d-flex w-25 justify-content-center shadow-sm rounded bg-info bg-opacity-50 mb-2">Perro</p>
                            <p class="text-muted fs-5 font-monospace mb-1">2 años - Mediano</p>
                            <p class="fs-5">Cariñoso, juguetón y le encanta pasear.</p>
                            <a class="d-flex border align-items-center justify-content-center text-decoration-none text-white rounded m-2 p-2 fs-5 ver-detalles" href="#">Ver detalles</a>
                        </div>
                    </div>
                </div>  
                <div class="col-12 col-md-3">
                    <div class="card mascota-card">
                        <img src="{{ asset('images/luna.jpg') }}" class="card-img-top mascota-img" alt="luna">
                        <div class="card-body">
                            <h3>Luna</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card mascota-card">
                        <img src="{{ asset('images/rocky.jpg') }}" class="card-img-top mascota-img" alt="rocky">
                        <div class="card-body">
                            <h3>Rocky</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card mascota-card">
                        <img src="{{ asset('images/tortuga.jpg') }}" class="card-img-top mascota-img" alt="tortuga">
                        <div class="card-body">
                            <h3>Tortuga</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card mascota-card">
                        <img src="{{ asset('images/nieve.jpg') }}" class="card-img-top mascota-img" alt="nieve">
                        <div class="card-body">
                            <h3>Nieve</h3>
                        </div>
                    </div>
                </div>                    
                    
                </div>

        </main>









        </div>










   </div>




<script>
    document.addEventListener("DOMContentLoaded", function () {
        const showBtn = document.getElementById("show");
        const sidebar = document.querySelector(".sidebar");

        // Prevenir la recarga de página al hacer clic en el botón
        showBtn.addEventListener("click", function (e) {
            e.preventDefault();
            
            // Alterna la visibilidad del sidebar en móvil
            sidebar.classList.toggle("active-mobile");
        });

        // Opcional: Cerrar el menú al hacer clic fuera de él
        document.addEventListener("click", function (e) {
            if (!sidebar.contains(e.target) && !showBtn.contains(e.target)) {
                sidebar.classList.remove("active-mobile");
            }
        });
    });


    const tabs = document.querySelectorAll(".tabs");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {

            tabs.forEach(t => t.classList.remove("active"));

         tab.classList.add("active");
        });
    });
</script>







@endsection