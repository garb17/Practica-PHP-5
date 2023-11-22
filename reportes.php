<?php

    session_start();
    include_once("assets/php/conexion.php");

    $cont=1;

    $query = "SELECT sede, sucursal FROM emb_sede ORDER BY sede ASC";
    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); 

    if(!isset($_SESSION['sucursal'])&&isset($_SESSION['id_usuario'])){
        session_destroy();
        header("Location: index.php");
    }

    $_SESSION['ubiAnterior']="reporte.php";
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

    <section class="contenedor-vertical">
        <div class="contenedor-horizontal card-principal">
            
            <div class="contenido">
                <a href="menu.php" ><i class="fa-solid fa-arrow-right fa-rotate-180 fa-lg" style="color:white"></i></a>
                <div class="dropdown alinear-derecha">
                    <button id="ajustes" class="btn btn-secondary " style="background-color:#9dc4ed; border-color:#9dc4ed" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                        <i class="fa-solid fa-gear fa-lg" style="color:#246db3"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sede</a></li>
                        <li><a class="dropdown-item" href="cerrar-sesion.php">Cerrar sesión</a></li>
                    </ul>
                </div>    
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modificar sede</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <div class="form-floating">
                                    <select class="form-select" id="selectSucursal" name='selectSucursal'aria-label="Floating label select example">
                                        <?php   
                                            $query = "SELECT sede, sucursal FROM emb_sede ORDER BY sede ASC";
                                            $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); 
                                            while($fila = mysqli_fetch_array($rs)){  
                                                if($fila['sucursal']==$_SESSION['sucursal']){ ?>
                                                    <option value="<?php echo $fila['sucursal'];  ?>" selected><?php echo $fila['sede']." - ".$fila['sucursal']; ?></option>
                                        <?php       }else{ ?>
                                                        <option value="<?php echo $fila['sucursal'];  ?>"><?php echo $fila['sede']." - ".$fila['sucursal']; ?></option>
                                        <?php       }
                                            }?>
                                    </select>
                                    <label for="floatingSelect">Elige la sede de la Embotelladora Thomsom</label>
                                </div>              
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="cambioSucursal()">Cambiar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <br><br>

            <h1 class="text-center display-4 separacion-grande-bottom ">REPORTES</h1>

            <div class="contenido">
                <div class="row contenido">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-floating">
                            <select class="form-select" id="idReporte" onchange="selectReporte()" aria-label="Floating label select example">
                                <option value="clientes">Clientes</option>
                                <option value="compras">Compras realizas</option>
                                <option value="usuarios">Ventas por parte del usuarios</option>
                            </select>
                            <label for="idReporte">Reporte de...</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contenido contenido-vertical">
                <div class="contenido">
                    <div class="table-responsive"  id="clientes">
                        <table class="table text-center table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Direccion</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                    $query = 'SELECT cedula, nombre, apellido, telefono, direccion FROM emb_cliente ORDER BY cedula ASC';
                                    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); 
                                    while($fila = mysqli_fetch_array($rs)){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $cont; ?></th>
                                    <td><?php echo $fila["cedula"]; ?></td>
                                    <td><?php echo $fila["nombre"]." ".$fila["apellido"]; ?></td>
                                    <td><?php echo $fila["telefono"]; ?></td>
                                    <td><?php echo $fila["direccion"]; ?></td>
                                </tr>
                                <?php $cont++; } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive" id="compras" style="display:none">
                        <table class="table text-center table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Sucursal</th>
                                    <th scope="col">Precio unitario</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                    
                                    $query =    'SELECT cl.cedula, cl.nombre, cl.apellido, s.sede, s.sucursal , c.precio, c.cantidad, c.total, c.fecha, c.hora FROM emb_compra c 
                                                INNER JOIN emb_cliente cl ON c.cedula_cliente=cl.cedula
                                                INNER JOIN emb_sede s ON c.id_sede=s.id ORDER BY cl.cedula ASC';
                                    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); 
                                    while($fila = mysqli_fetch_array($rs)){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $fila["cedula"]; ?></td>
                                    <td><?php echo $fila["nombre"]." ".$fila["apellido"]; ?></td>
                                    <td><?php echo $fila["sede"]." - ".$fila["sucursal"]; ?></td>
                                    <td><?php echo $fila["precio"]."$"; ?></td>
                                    <td><?php echo $fila["cantidad"]; ?></td>
                                    <td><?php echo $fila["total"]."$"; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($fila["fecha"])); ?></td>
                                    <td><?php echo $fila["hora"]; ?></td>
                                </tr>
                                <?php $cont++; } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive" id="usuarios" style="display:none">
                        <table class="table text-center table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Sucursal</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                    $cont=1;
                                    $query =    'SELECT us.cedula, us.nombre, us.apellido, s.sede, s.sucursal , c.cantidad, c.fecha, c.hora FROM emb_compra c 
                                                INNER JOIN emb_usuario us ON c.cedula_usuario=us.cedula
                                                INNER JOIN emb_sede s ON c.id_sede=s.id ORDER BY us.cedula ASC';
                                    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); 
                                    while($fila = mysqli_fetch_array($rs)){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $cont; ?></th>
                                    <td><?php echo $fila["cedula"]; ?></td>
                                    <td><?php echo $fila["nombre"]." ".$fila["apellido"]; ?></td>
                                    <td><?php echo $fila["sede"]." - ".$fila["sucursal"]; ?></td>
                                    <td><?php echo $fila["cantidad"]; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($fila["fecha"])); ?></td>
                                    <td><?php echo $fila["hora"]; ?></td>
                                </tr>
                                <?php $cont++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="centrar-boton">
                <button type="button" onclick="generarReporte()" class="btn btn-primary btn-lg">Generar&nbsp;&nbsp;<i class="fa-solid fa-file-invoice fa-lg"></i></button>
            </div>
        </div>    

    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/main.js?v=<?php echo time(); ?>"></script>
</body>
</html>