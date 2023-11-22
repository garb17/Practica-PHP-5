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
<body id="inicio">

    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" style="background-color: #00002e !important;">
        <div class="container-fluid" >
            <a class="navbar-brand" href="#inicio"><img id="logo" src="assets/img/logo.jpg" alt="Logo" width="55"></a>
            <h3 style="color:white; float:center">MENU</h3>
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

    <section class="contenedor-vertical">
        <div class="contenedor-horizontal">
            <h3 class="dsiplay-3">REGISTRO</h3><hr>
            <div class="row contenido card-principal color-card-principal margen-inferior">
                <div class="col-md-4 col-sm-12">
                    <a href="agregarRepuesto.php" style="text-decoration: none; color: black;"><div class="card-menu contenido color-principal">
                        <div class="row">
                            <h5 class="text-center">Repuesto</h5>
                        </div>
                        <div class="card-body contenido-vertical">
                            <p class=" contenido text-center separacion-grande-bottom ">Ingresa los datos de los repuestos de vehículo en el sistema</p>
                            <div class="centrar-boton">
                                <div class="cuadrado-menu color-cuadro-principal">
                                    <i class="fa-solid fa-toolbox fa-lg" style="color:white"></i>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-4 col-sm-12">
                    <a href="agregarReparacion.php" style="text-decoration: none; color: black;"><div class="card-menu contenido color-principal">
                        <div class="row">
                            <h5 class="text-center">Reparación</h5>
                        </div>
                        <div class="card-body contenido-vertical">
                            <p class=" contenido text-center separacion-grande-bottom">Inserta todos los datos de la reparacion de un vehículo en el sistema</p>
                            <div class="centrar-boton">
                                <div class="cuadrado-menu color-cuadro-principal">
                                    <i class="fa-solid fa-wrench fa-lg" style="color:white"></i>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-4 col-sm-12">
                    <a href="agregarMecanico.php" style="text-decoration: none; color: black;"><div class="card-menu contenido color-principal">
                        <div class="row">
                            <h5 class="text-center">Mecáncico</h5>
                        </div>
                        <div class="card-body contenido-vertical">
                            <p class=" contenido text-center separacion-grande-bottom ">Añade datos personales y profesional del mecánico en el sistema</p>
                            <div class="centrar-boton">
                                <div class="cuadrado-menu color-cuadro-principal">
                                <i class="fa-solid fa-user-plus fa-lg" style="color:white"></i>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div>
            </div>

            <h3 class="dsiplay-3">GESTIÓN</h3><hr>
            <div class="row contenido card-principal color-card-secunadario margen-inferior">
                <div class="col-md-3 col-sm-12">
                    <a href="#" style="text-decoration: none; color: black;"><div class="card-menu contenido color-secundario">
                        <div class="row">
                            <h5 class="text-center">Repuesto</h5>
                        </div>
                        <div class="card-body contenido-vertical">
                            <p class=" contenido text-center separacion-grande-bottom ">Se registra la compra del embotellado del cliente</p>
                            <div class="centrar-boton">
                                <div class="cuadrado-menu color-cuadro-secundario">
                                    <i class="fa-solid fa-toolbox fa-lg" style="color:white"></i>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-3 col-sm-12">
                    <a href="#" style="text-decoration: none; color: black;"><div class="card-menu contenido color-secundario">
                        <div class="row">
                            <h5 class="text-center">Cliente</h5>
                        </div>
                        <div class="card-body contenido-vertical">
                            <p class=" contenido text-center separacion-grande-bottom ">Se realizan los reportes de acuerdo a una serie de filtros.</p>
                            <div class="centrar-boton">
                                <div class="cuadrado-menu color-cuadro-secundario">
                                    <i class="fa-solid fa-users-gear fa-lg" style="color:white"></i>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-3 col-sm-12">
                    <a href="" style="text-decoration: none; color: black;"><div class="card-menu contenido color-secundario">
                        <div class="row">
                            <h5 class="text-center">Reparación</h5>
                        </div>
                        <div class="card-body contenido-vertical">
                            <p class=" contenido text-center separacion-grande-bottom ">Se visualiza y se puede modificar los datos del cliente</p>
                            <div class="centrar-boton">
                                <div class="cuadrado-menu color-cuadro-secundario">
                                    <i class="fa-solid fa-wrench fa-lg" style="color:white"></i>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-3 col-sm-12">
                    <a href="" style="text-decoration: none; color: black;"><div class="card-menu contenido color-secundario">
                        <div class="row">
                            <h5 class="text-center">Mecánico</h5>
                        </div>
                        <div class="card-body contenido-vertical">
                            <p class=" contenido text-center separacion-grande-bottom ">Se visualiza y se puede modificar los datos del cliente</p>
                            <div class="centrar-boton">
                                <div class="cuadrado-menu color-cuadro-secundario">
                                    <i class="fa-solid fa-user fa-lg" style="color:white"></i>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div>
            </div> 
            
            <h3 class="dsiplay-3">REPORTES</h3><hr>
            <div class="row contenido card-principal color-card-terciario">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-5 col-sm-12">
                    <a href="#" style="text-decoration: none; color: black;"><div class="card-menu contenido color-terciario">
                        <div class="row">
                            <h5 class="text-center">Reportes generales</h5>
                        </div>
                        <div class="card-body contenido-vertical">
                            <p class=" contenido text-center separacion-grande-bottom ">Se registra la compra del embotellado del cliente</p>
                            <div class="centrar-boton">
                                <div class="cuadrado-menu color-cuadro-terciario">
                                    <i class="fa-solid fa-file-invoice fa-lg" style="color:white"></i>
                                </div>
                            </div>
                        </div>
                    </div></a>
                </div>
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