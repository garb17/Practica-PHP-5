<?php
    $ruta="Main"; 
    if(isset($_GET['Acarpeta'])){
        $ruta=($_GET['Acarpeta']);
        if($ruta=="Main"){
            header("Location: gestionar.php");
        }
    }

   

    include_once("assets/php/gestionarArchivos.php");
    include_once("assets/php/crearCarpeta.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica-PHP-3</title>
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/fdb097e44b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="margen">
        <div class="margen2">
            <div style="border: 2px solid rgb(242, 242, 242);border-radius: 3%;background-color:  rgb(229, 229, 229);">
                <div class="row">
                    <p class="left-align">&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn-floating waves-effect waves-light red"><i class="material-icons"><i class="fa-solid fa-arrow-right fa-rotate-180 fa-lg" style="color:rgb(255,255,255)"></i></i></a></p>
                    <h1 class="center-align">GESTIÓN DE ARCHIVOS</h1>
                </div>
                <?php echo $resultado ?>
                <div class="margen-gestion">
                    <div class="row">

                    <?php
                        echo '<h4 class="truncate"><i class="fa-solid fa-folder fa-lg"></i>&nbsp;&nbsp;'.$ruta.'</h4><br>';
                        obtener_archivos($ruta);
                    ?>
                    </div>
                </div>
                <br>
                <form class="col s12" action="" method="post">
                    <div class="row margen-carpeta">
                        <div class="input-field col m5 s12 ">
                            <input id="idCarpeta" type="text" name="txtCarpeta"  required>
                            <label for="idCarpeta">Crear nueva carpeta...</label>
                        </div>
                        <div class="input-field col m3 s12 ">
                            <button class="btn waves-effect waves-light" type="submit" value="Guardar" name="btnGuardar">Guardar
                                <i class="fa-regular fa-floppy-disk"></i>
                            </button> 
                        </div>
                    </div>
                </form>
                <br>
                <br>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>