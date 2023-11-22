<?php

    session_start();
    include_once("assets/php/conexion.php");
    include_once("assets/php/utilidades.php");

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
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" style="background-color: #00002e !important;">
        <div class="container-fluid" >
            <a class="navbar-brand" href="menu.php"><img id="logo" src="assets/img/logo.jpg" alt="Logo" width="55"></a>
            <h3 style="color:white; float:center">REGISTRAR REPARACIÓN</h3>
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
        <img src="assets/img/reparacion.png" alt="Reparacion" width="100%" height="250px">
        <div id="cliente">
            <div class="contenedor-horizontal contenido-vertical">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <p style="color:gray" class="text-center">Cliente</p>
                        <hr style="border: 2px solid gray !important">
                    </div>
                    
                    <div class="col-md-4 col-sm-4">
                        <p style="color:gray" class="text-center">Vehículo</p>
                        <hr style="border: 2px solid gray !important">
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <p style="color:gray" class="text-center">Reparación</p>
                        <hr style="border: 2px solid gray !important">
                    </div>
                </div>
            

                <form action="" method="post" id="idFormulario">
                    <div class="contenido">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control focus-ring focus-ring-warning border border-black" id="idCedula" onblur="verificarCedula()" placeholder=".form-control-sm" required>
                                    <label for="idCedula">Cédula</label>
                                </div>
                            </div>  
                            <div class="col-md-6 col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idNombre" placeholder=".form-control-sm" required>
                                    <label for="idNombre">Nombre</label>
                                </div>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idApellido" placeholder=".form-control-sm" required >
                                    <label for="idApellido">Apellido</label>
                                </div>
                            </div>  
                            <div class="col-md-6 col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control focus-ring focus-ring-warning border border-black" id="idTelefono" placeholder=".form-control-sm" required>
                                    <label for="idTelefono">Teléfono</label>
                                </div>
                            </div>   
                        </div> 
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idDireccion" placeholder=".form-control-sm" required>
                                    <label for="idDireccion">Dirección</label>
                                </div>
                            </div>   
                        </div>
                        <div class="row ">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idFecha" placeholder=".form-control-sm" required>
                                    <label for="idFecha">Fecha de nacimiento</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control focus-ring focus-ring-warning border border-black" id="idNum" placeholder=".form-control-sm" required>
                                    <label for="idNum">Numero de licencia</label>
                                </div>
                            </div>    
                        </div> 
                        <div class="centrar-boton">
                            <button type="button" class="btn btn-danger btn-lg espaciado" onclick="borrarFormularioCompra()">Borrar</button>
                            <button type="button" class="btn btn-primary btn-lg" onclick="registrarCompra()">Siguiente</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        

        <div id="vehiculos">
            <div class="contenedor-horizontal contenido-vertical">
                <div class="row separacion-grande-bottom">
                    <div class="col-md-4 col-sm-4">
                        <p style="color:green" class="text-center">Cliente</p>
                        <hr style="border: 2px solid green !important">
                    </div>
                    
                    <div class="col-md-4 col-sm-4">
                        <p style="color:gray" class="text-center">Vehículo</p>
                        <hr style="border: 2px solid gray !important">
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <p style="color:gray" class="text-center">Reparación</p>
                        <hr style="border: 2px solid gray !important">
                        <!-- <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <p style="color:gray" class="text-center">Mecánico</p>
                                <hr style="border: 2px solid gray !important">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <p style="color:gray" class="text-center">Repuesto</p>
                                <hr style="border: 2px solid gray !important">
                            </div>
                        </div> -->
                    </div>
                </div>

                <div> 
                
                <!-- PHP -->
                
                </div>

                <a href="" style="text-decoration: none; color: black;">
                    <div class="row g-0 card-principal" style="border: 2px dashed black !important">
                        <div class="col-md-3 mb-md-0 p-md-4 centrar-boton" style="background-color: #dfdfdf">
                            <img src="assets/img/agregarCarro2.png"  alt="..." width="100" class="">
                        </div>
                        <div class="col-md-9 p-4 ps-md-0 text-center">
                            <h5 class="mt-0">Agregar vehículo</h5>
                            <p>Ingresa el vehículo del cliente en el sistema</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div id="reparacion">
            <div class="contenedor-horizontal contenido-vertical">
                <div class="row separacion-grande-bottom">
                    <div class="col-md-4 col-sm-4">
                        <p style="color:green" class="text-center">Cliente</p>
                        <hr style="border: 2px solid green !important">
                    </div>
                    
                    <div class="col-md-4 col-sm-4">
                        <p style="color:green" class="text-center">Vehículo</p>
                        <hr style="border: 2px solid green !important">
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <p style="color:gray" class="text-center">Reparación</p>
                        <hr style="border: 2px solid gray !important">
                    </div>
                </div>


                <h5 class="display-6">Selecciona al mecánico:</h5>
                <div id="mecanicos" class="overflow-auto" style="margin-bottom: 5%">
                    <div class="cont">
                        <form action="">
                        <?php
                        
                            $query = "SELECT cedula, nombre, apellido, fecha_nacimiento, perfil_profesional, titulo, img_url FROM conc_mecanico ORDER BY nombre ASC";
                            $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); 
                            while($fila = mysqli_fetch_array($rs)){
                                $edad=obtener_edad($fila['fecha_nacimiento']);
                        
                        ?>
                                <div class="card mb-3" style="">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?php echo $fila['img_url']?>" class="img-fluid rounded-start" alt="Mecánico">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title text-uppercase"><?php echo $fila['nombre']." ".$fila['apellido']?></h5>
                                                <h6 class="card-title"><?php echo $fila['titulo']?></h6>
                                                <p class="card-text"><small class="text-body-secondary">Edad: <?php echo $edad ?> años</small></p>                                            
                                                <p class="card-text"><?php echo $fila['perfil_profesional']?></p>  
                                            </div>
                                        </div>
                                        <div class="col-md-2 centrar-boton">
                                            <div class="start-50">
                                                <div class="form-check">
                                                    <input id="checkbox" class="form-check-input border border-black" type="checkbox" value="<?php echo $fila['cedula']?>" id="<?php echo $fila['cedula']?>">
                                                </div>     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                        </form>
                    </div>
                </div>


                <h5 class="display-6">Repuestos:</h5>
                <div id="repuestos" class="overflow-auto">



                </div>

                <div class="centrar-boton separacion-grande-bottom">
                    <button type="button" class="btn btn-danger btn-lg espaciado" onclick="registrarCompra()">Regresar</button>
                    <button type="button" class="btn btn-primary btn-lg" onclick="registrarCompra()">Guardar</button>
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