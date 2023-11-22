<?php

    function obtener_edad($fecha_nacimiento){
        $nacimiento = new DateTime($fecha_nacimiento);
        $ahora = new DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);
        return $diferencia->format("%y");
    }

?>