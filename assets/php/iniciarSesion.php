<?php
    session_start();
    include_once("conexion.php");

    $usuario=$_POST['usuario'];
    $contrasena=$_POST['contrasena'];

    $query = 'SELECT cedula FROM conc_usuario WHERE usuario="'.$usuario.'" AND contrasena="'.$contrasena.'"';
    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec)); 
    $fila = mysqli_fetch_array($rs);

    if(isset($fila)){
        $_SESSION['usuario_cedula']=$fila;
        echo "correcto";
    }else{
        echo "efe";
    }
        
?>