<?php

    session_start();
    include_once("conexion.php");
    $bool=false;
    $arreglo["bool"]="a";

    if(isset($_POST['cedula'])&&(!empty($_POST['cedula'])||$_POST['cedula']=="0")){
        if(!$_POST['cedula']<1&&ctype_digit($_POST['cedula'])){
            if(isset($_POST['nombre'])&&(!empty($_POST['nombre'])||$_POST['nombre']=="0")){ 
                if(ctype_alpha($_POST['nombre'])){
                    if(isset($_POST['apellido'])&&(!empty($_POST['apellido'])||$_POST['apellido']=="0")){
                        if(ctype_alpha($_POST['apellido'])){
                            if(isset($_POST['telefono'])&&(!empty($_POST['telefono'])||$_POST['telefono']=="0")){
                                if(ctype_digit($_POST['telefono'])){
                                    if(strlen($_POST['telefono'])==11){
                                        if(isset($_POST['direccion'])&&(!empty($_POST['direccion'])||$_POST['direccion']=="0")){
                                            if(isset($_POST['correo'])&&(!empty($_POST['correo'])||$_POST['correo']=="0")){
                                                if(isset($_POST['contrasena'])&&(!empty($_POST['contrasena'])||$_POST['contrasena']=="0")){

                                                    $cedula=$_POST['cedula'];
                                                    $nombre=$_POST['nombre'];
                                                    $apellido=$_POST['apellido'];
                                                    $telefono=$_POST['telefono'];
                                                    $direccion=$_POST['direccion'];
                                                    $correo=$_POST['correo'];
                                                    $contrasena=$_POST['contrasena'];
                                                    $tipo=$_POST['tipo'];


                                                    if($tipo=="crear"){

                                                        $query='SELECT * from emb_usuario WHERE cedula="'.$cedula.'"';
                                                        $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                        $fila = mysqli_fetch_array($rs);

                                                        if(!isset($fila)){
                                                            $query='SELECT * from emb_usuario WHERE correo="'.$correo.'"';
                                                            $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                            $fila = mysqli_fetch_array($rs);

                                                            if(!isset($fila)){
                                                                $query='INSERT INTO emb_usuario(cedula, nombre, apellido, telefono, direccion, correo, contrasena) VALUES ("'.$cedula.'","'.$nombre.'","'.$apellido.'","'.$telefono.'","'.$direccion.'","'.$correo.'","'.$contrasena.'")';
                                                                $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                                $arreglo["respuesta"]="El usuario se ha creado con exito";
                                                            }else{
                                                                $arreglo["respuesta"]="Error, el correo ya se encuentra registrado en el sistema";
                                                                $bool=true;
                                                            }
                                                        }else{
                                                            $arreglo["respuesta"]="Error, la cedula ya se encuentra registrado en el sistema";
                                                            $bool=true;
                                                        }
                                                    }


                                                    // Si es diferente a la cedula que ya esta registrado
                                                    if($tipo=="modificar"){
                                                        
                                                        if($cedula!=$_SESSION["id_usuario"][0]){

                                                            $query='SELECT * from emb_usuario WHERE cedula="'.$cedula.'"';
                                                            $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                            $fila = mysqli_fetch_array($rs);

                                                            // Ahora busca la cedula diferente con los demas registrados en la bdd, Si no se encuetra entonces..
                                                            if(!isset($fila)){

                                                                //Ahora a comprobar el correo
                                                                $query='SELECT correo from emb_usuario WHERE cedula="'.$_SESSION["id_usuario"][0].'"';
                                                                $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                                $fila = mysqli_fetch_array($rs);

                                                                // //Si el correo es diferente al que esta registrado
                                                                if($fila[0]!=$correo){
                                                                    
                                                                    $query='SELECT * from emb_usuario WHERE correo="'.$correo.'"';
                                                                    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                                    $fila = mysqli_fetch_array($rs);

                                                                    // Ahora busca el correo diferente con los demas registrados en la bdd, Si no se encuetra entonces..
                                                                    if(!isset($fila)){

                                                                        $query='UPDATE emb_usuario SET cedula="'.$cedula.'"  , nombre="'.$nombre.'"  , apellido="'.$apellido.'"  , telefono="'.$telefono.'"  , direccion="'.$direccion.'", correo="'.$correo.'" , contrasena="'.$contrasena.'" WHERE cedula="'.$_SESSION["id_usuario"][0].'"';
                                                                        $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                                        $_SESSION["id_usuario"][0]=$cedula;

                                                                    }else{
                                                                        $arreglo["respuesta"]="Error, el correo ya se encuentra registrado en el sistema";
                                                                        $bool=true;
                                                                    }
                                                                }else{
                                                                    $query='UPDATE emb_usuario SET cedula="'.$cedula.'"  , nombre="'.$nombre.'"  , apellido="'.$apellido.'"  , telefono="'.$telefono.'"  , direccion="'.$direccion.'", correo="'.$correo.'" , contrasena="'.$contrasena.'" WHERE cedula="'.$_SESSION["id_usuario"][0].'"';
                                                                    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                                    $_SESSION["id_usuario"][0]=$cedula;
                                                                }
                                                            }else{
                                                                $arreglo["respuesta"]="Error, la cedula ya se encuentra registrado en el sistema";
                                                                $bool=true;
                                                            }


                                                        }else{
                                                            
                                                            //Ahora a comprobar el correo
                                                            $query='SELECT correo from emb_usuario WHERE cedula="'.$_SESSION["id_usuario"][0].'"';
                                                            $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                            $fila = mysqli_fetch_array($rs);
                                                            

                                                            //Si el correo es diferente al que esta registrado
                                                            if($fila[0]!=$correo){

                                                                $query='SELECT * from emb_usuario WHERE correo="'.$correo.'"';
                                                                $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                                $fila = mysqli_fetch_array($rs);

                                                                // Ahora busca el correo diferente con los demas registrados en la bdd, Si no se encuetra entonces..
                                                                if(!isset($fila)){

                                                                    $query='UPDATE emb_usuario SET cedula="'.$cedula.'"  , nombre="'.$nombre.'"  , apellido="'.$apellido.'"  , telefono="'.$telefono.'"  , direccion="'.$direccion.'", correo="'.$correo.'" , contrasena="'.$contrasena.'" WHERE cedula="'.$_SESSION["id_usuario"][0].'"';
                                                                    $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                                    $_SESSION["id_usuario"][0]=$cedula;

                                                                }else{
                                                                    $arreglo["respuesta"]="Error, el correo ya se encuentra registrado en el sistema";
                                                                    $bool=true;
                                                                }
                                                            }else{
                                                                $query='UPDATE emb_usuario SET cedula='.$cedula.'  , nombre="'.$nombre.'"  , apellido="'.$apellido.'"  , telefono="'.$telefono.'"  , direccion="'.$direccion.'", correo="'.$correo.'" , contrasena="'.$contrasena.'" WHERE cedula="'.$_SESSION["id_usuario"][0].'"';
                                                                $rs = mysqli_query($conec, $query) or die('Error: ' . mysqli_error($conec));
                                                                $_SESSION["id_usuario"][0]=$cedula;

                                                            }
                                                        }
                                                    }

                                                    $arreglo["ubiAnterior"]=$_SESSION['ubiAnterior'];

                                                }else{
                                                    $arreglo["respuesta"]="Error, campo contraseña esta vacio";
                                                    $bool=true;
                                                }
                                            }else{
                                                $arreglo["respuesta"]="Error, campo correo esta vacio";
                                                $bool=true;
                                            }
                                        }else{
                                            $arreglo["respuesta"]="Error, campo direccion esta vacio";
                                            $bool=true;
                                        }
                                    }else{
                                        $arreglo["respuesta"]="Error, la longitud del telefono es invalido";
                                        $bool=true;
                                    }
                                }else{
                                    $arreglo["respuesta"]="Error, el campo telefono debe ser de tipo numerico";
                                    $bool=true;
                                }
                            }else{
                                $arreglo["respuesta"]="Error, campo telefono esta vacio";
                                $bool=true;
                            }
                        }else{
                            $arreglo["respuesta"]="Error, el campo apellido debe ser de tipo alfabetico";
                            $bool=true;
                        }
                    }else{
                        $arreglo["respuesta"]="Error, campo apellido esta vacio";
                        $bool=true;
                    }
                }else{
                    $arreglo["respuesta"]="Error, el campo nombre debe ser de tipo alfabetico";
                    $bool=true;
                }
            }else{
                $arreglo["respuesta"]="Error, campo nombre esta vacio";
                $bool=true;
            }
        }else{
            $arreglo["respuesta"]="Error, cedula invalida";
            $bool=true;
        }
    }else{
        $arreglo["respuesta"]="Error, campo cedula esta vacio";
        $bool=true;
    }

    if($bool){
        $arreglo["bool"]="efe";
    }

    echo json_encode($arreglo);

?>