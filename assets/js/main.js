function iniciarSesion(){

    let usuario=document.getElementById("idUsuario").value;
    let contrasena=document.getElementById("idContrasena").value;
    let datos={
        "usuario":usuario,
        "contrasena":contrasena
    };

    $.ajax({
        url: "assets/php/iniciarSesion.php",
        type: "post",
        data: datos,
        success: function(response){
            console.log(response);
        if(response=='correcto'){
            location.replace("menu.php");
        }
        else{
            $("#result").html("Error, usuario o contraseña incorrecta");

            setTimeout(()=>{
                document.getElementById("result").innerHTML="";
            },6000);
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#result").html("Error al realizar el cálculo");
    }
    });
      
}

function verificarCedula(){

    let cedula=document.getElementById("idCedula").value;
    let nombre=document.getElementById("idNombre");
    let apellido=document.getElementById("idApellido");
    let telefono=document.getElementById("idTelefono");
    let direccion=document.getElementById("idDireccion");

    let dato={"cedula":cedula};

    $.ajax({
        url: "assets/php/buscarCedulaCliente.php",
        type: "get",
        dataType:"json",
        data: dato,
        success: function(response){
        if(response!='efe'){
            document.getElementById("idNombre").value= response.nombre;
            nombre.disabled = true;
            document.getElementById("idApellido").value= response.apellido;
            apellido.disabled = true;
            document.getElementById("idTelefono").value= response.telefono;
            telefono.disabled = true;
            document.getElementById("idDireccion").value= response.direccion;
            direccion.disabled = true;
            
        }else{
            document.getElementById("idNombre").value= "";
            nombre.disabled = false;
            document.getElementById("idApellido").value= "";
            apellido.disabled = false;
            document.getElementById("idTelefono").value= "";
            telefono.disabled = false;
            document.getElementById("idDireccion").value= "";
            direccion.disabled = false;

        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#result").html("Error al realizar el cálculo");
    }
    });
}


function registrarCompra(){

    let cedula=document.getElementById("idCedula").value;
    let nombre=document.getElementById("idNombre").value;
    let apellido=document.getElementById("idApellido").value;
    let telefono=document.getElementById("idTelefono").value;
    let direccion=document.getElementById("idDireccion").value;

    let precio=document.getElementById("idPrecio").value;
    let cantidad=document.getElementById("idCantidad").value;
    
    let datos={
        "cedula":cedula,
        "nombre":nombre,
        "apellido":apellido,
        "telefono":telefono,
        "direccion":direccion,
        "precio":precio,
        "cantidad":cantidad
    };

    $.ajax({
        url: "assets/php/crearCompra.php",
        type: "post",
        dataType:"json",
        data: datos,
        success: function(response){
        if(response.respuesta=='Compra guardada con exito'){
            document.getElementById("result").style.color="green";
            $("#result").html(response.respuesta);

            let formulario = document.getElementById('idFormulario');
            formulario.reset();
            document.getElementById("idTotal").innerHTML="TOTAL 0 $";

            setTimeout(()=>{
                document.getElementById("result").innerHTML="";
            },4000);
            
        }
        else{
            document.getElementById("result").style.color="red";
            $("#result").html(response.respuesta);

            setTimeout(()=>{
                document.getElementById("result").innerHTML="";
            },6000);
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#result").html("Error al realizar el cálculo");
    }
    });
      
}

function selectReporte(){

    let tReporte=document.getElementById("idReporte").value;
    let clientes=document.getElementById("clientes");
    let compras=document.getElementById("compras");
    let usuarios=document.getElementById("usuarios");

    if(tReporte=="clientes"){
        clientes.style.display="block";
        compras.style.display="none";
        usuarios.style.display="none";
    }
    if(tReporte=="compras"){
        clientes.style.display="none";
        compras.style.display="block";
        usuarios.style.display="none";
    }
    if(tReporte=="usuarios"){
        clientes.style.display="none";
        compras.style.display="none";
        usuarios.style.display="block";
    }
}

function generarReporte(){

    let tReporte=document.getElementById("idReporte").value;

    if(tReporte=="clientes"){
        location.href ="assets/php/reportes/rpCliente.php";
    }else if(tReporte=="compras"){
        location.href ="assets/php/reportes/rpCompra.php";
    }else if(tReporte=="usuarios"){
        location.href ="assets/php/reportes/rpUsuario.php";
    }
 
}

function perfil(cedula){


    let dato={"cedula":cedula};
    
    $.ajax({
        url: "assets/php/buscarCedulaUsuario.php",
        type: "get",
        dataType:"json",
        data: dato,
        success: function(response){
        if(response!='efe'){
            document.getElementById("idCedula").value= cedula;
            document.getElementById("idNombre").value= response.nombre;
            document.getElementById("idApellido").value= response.apellido;
            document.getElementById("idTelefono").value= response.telefono;
            document.getElementById("idDireccion").value= response.direccion;
            document.getElementById("idCorreo").value= response.correo;
            document.getElementById("idContrasena").value= response.contrasena;
            
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#result").html("Error al realizar el cálculo");
    }
    });
}

function registrarUsuario(valor){

    let cedula=document.getElementById("idCedula").value;
    let nombre=document.getElementById("idNombre").value;
    let apellido=document.getElementById("idApellido").value;
    let telefono=document.getElementById("idTelefono").value;
    let direccion=document.getElementById("idDireccion").value;
    let correo=document.getElementById("idCorreo").value;
    let contrasena=document.getElementById("idContrasena").value;
    let tipo=valor;

    let datos={
        "cedula":cedula,
        "nombre":nombre,
        "apellido":apellido,
        "telefono":telefono,
        "direccion":direccion,
        "correo":correo,
        "contrasena":contrasena,
        "tipo":tipo
    };

    $.ajax({
        url: "assets/php/crearUsuario.php",
        type: "post",
        dataType:"json",
        data: datos,
        success: function(response){
        if(response.bool!='efe'){
            console.log("SII");
            location.href =response.ubiAnterior;
        }else{
            console.log("NOO");
            $("#result").html(response.respuesta);
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    $("#result").html("Error al realizar el cálculo");
    }
    });
}

function total(){
    let precio=document.getElementById("idPrecio").value;
    let cantidad=document.getElementById("idCantidad").value;
    let total=precio*cantidad;

    if(total>0){
        document.getElementById("idTotal").innerHTML="TOTAL "+parseFloat(total).toFixed(2)+"$";
    }else{
        document.getElementById("idTotal").innerHTML="TOTAL 0 $";
    }
}

function borrarFormularioCompra(){

    let nombre=document.getElementById("idNombre");
    let apellido=document.getElementById("idApellido");
    let telefono=document.getElementById("idTelefono");
    let direccion=document.getElementById("idDireccion");

    nombre.disabled = false;
    apellido.disabled = false;
    telefono.disabled = false;
    direccion.disabled = false;

    let formulario=document.getElementById("idFormulario");
    formulario.reset();

    document.getElementById("idTotal").innerHTML="TOTAL 0 $";
}

function borrarFormularioUsuario(){

    let formulario=document.getElementById("idFormulario");
    formulario.reset();
}

function cambioSucursal(){

    let sucursal=document.getElementById("selectSucursal").value;
    let dato={
        "sucursal":sucursal
    }

    $.ajax({
        url: "assets/php/cambioSucursal.php",
        type: "get",
        dataType:"json",
        data: dato,
        success: function(response){
            if(response.resultado=="ok"){  
                $('#staticBackdrop').modal('hide');

            } 
    },
    error: function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus, errorThrown);
    
    }
    });
}

