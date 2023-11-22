<?php

    session_start();

    if(!isset($_SESSION['usuario_cedula'])){
        session_destroy();
        header("Location: index.php");    
    }

?>


<!DOCTYPE html>
<html lang="es" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica-PHP-4</title>
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/fdb097e44b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body id="repuesto">

    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" style="background-color: #00002e !important;">
        <div class="container-fluid">
            <a class="navbar-brand" href="menu.php"><img id="logo" src="assets/img/logo.jpg" alt="Logo" width="55"></a>
            <h3 style="color:white; float:center">REGISTRAR MECÁNICO</h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="float:right !important">
                <ul class="navbar-nav" >
                    <li class="nav-item" >
                        <a class="nav-link float-end" href="cerrarSesion.php" style="color:red;"><h6>Cerrar Sesión</h6></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="border-color-principal">
        <img src="assets/img/mecanico.jpg" alt="Repuestos" width="100%" height="250px">
        <div class="contenedor-horizontal">
            <div class="row card-principal ">
                <form action="" method="post" id="idFormulario">
                    <div class="contenido">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control focus-ring focus-ring-warning border border-black" id="idCedula" onblur="verificarCedula()" placeholder=".form-control-sm" required>
                                    <label for="idCedula">Cédula</label>
                                </div>
                            </div>  
                            <div class="col-md-4 col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idNombre" placeholder=".form-control-sm" required>
                                    <label for="idNombre">Nombre</label>
                                </div>
                            </div>   
                            <div class="col-md-4 col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control focus-ring focus-ring-warning border border-black" id="idApellido" placeholder=".form-control-sm" required>
                                    <label for="idApellido">Apellido</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idTelefono" placeholder=".form-control-sm" required >
                                    <label for="idTelefono">Teléfono</label>
                                </div>
                            </div>  
                            <div class="col-md-4 col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idFecha" placeholder=".form-control-sm" required>
                                    <label for="idFecha">Fecha de nacimiento</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idTitulo" placeholder=".form-control-sm" required>
                                    <label for="idTitulo">Título académico</label>
                                </div>
                            </div>

                        </div> 
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idDireccion" placeholder=".form-control-sm" required>
                                    <label for="idDireccion">Dirección</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idPerfil" placeholder=".form-control-sm" required>
                                    <label for="idPerfil">Perfil profesional</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group mb-3">
                                <label class="input-group-text border border-black" for="imagen"><i class="fa-solid fa-image fa-lg"></i></label>
                                <input type="file" class="form-control form-control-lg focus-ring focus-ring-warning border border-black" id="imagen">
                            </div>
                        </div> 
                    </div>

                    <div class="centrar-boton">
                        <button type="button" class="btn btn-danger btn-lg espaciado" onclick="borrarFormularioCompra()">Borrar</button>
                        <button type="button" class="btn btn-primary btn-lg" onclick="registrarCompra()">Guardar <i class="fa-regular fa-floppy-disk fa-lg" style="color:white"></i></button>
                    </div>

                </form>
                <h5 class="text-center" id="result"></h5>
            </div>  
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-center text-white " style="background-color: #00002e;">
        <div class="container pt-4">
        <div class="mb-4">
            <!-- Facebook -->
            <a
            class="btn btn-outline-light btn-floating m-1"
            href="https://es-la.facebook.com/"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-facebook-f"></i
            ></a>
            <!-- Twitter -->
            <a
            class="btn btn-outline-light btn-floating m-1"
            href="https://twitter.com/i/flow/login?redirect_after_login=%2F%3Flang%3Des"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-twitter"></i
            ></a>
            <!-- Instagram -->
            <a
            class="btn btn-outline-light btn-floating m-1"
            href="https://www.instagram.com/"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-instagram"></i
            ></a>
            <!-- Github -->
            <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"
            data-mdb-ripple-color="dark"
            ><i class="fab fa-github"></i
            ></a>
        </div>
        </div>
        <div class="text-center text-light p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright: Gerardo Ramírez
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/main.js?v=<?php echo time(); ?>"></script>
</body>
</html>