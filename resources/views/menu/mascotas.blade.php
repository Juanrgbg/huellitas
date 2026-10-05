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

.mascota-card {
min-height: 300px;
overflow: hidden;
}

.mascota-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

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

                <a href="#" class="d-block text-white p-2 text-decoration-none tabs">
                    <img src="{{ asset('images/HuellaBlancaa.png') }}" width="25px" height="25px"> Mascotas
                </a>

                <a href="#" class="d-block text-white p-2 text-decoration-none tabs">
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
                            <h3>Max</h3>
                        </div>
                    </div>
                </div>  
                <div class="col-12 col-md-3">
                    <div class="card mascota-card">
                        <div class="card-body">
                            <h1>Hola</h1>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card mascota-card">
                        <div class="card-body">
                            <h1>Hola</h1>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card mascota-card">
                        <div class="card-body">
                            <h1>Hola</h1>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card mascota-card">
                        <div class="card-body">
                            <h1>Hola</h1>
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
</script>







@endsection