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

    <nav class="navbar sticky-top bg-body-tertiary" style="background-color: #00002e !important;">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img id="logo" src="assets/img/logo.jpg" alt="Logo" width="55" >
            </a>
        </div>
    </nav>

    <section class="contenedor-vertical">
        
        <div class="contenedor-horizontal-grande">
            <div class=" card-login">
                <h1 class="text-center display-4 separacion-corta-bottom">INICIAR SESIÓN</h1>
                <div class="centrar-boton">
                    <img id="img-login" src="assets/img/user2RM.png" class="separacion-corta-bottom" alt="" width=150px><br><br>
                </div>
                <div class="contenedor-horizontal">
                    <div class="contenedor-horizontal">
                        <div class="contenedor-horizontal">
                            <div class="contenedor-horizontal">
                                <div class="contenedor-horizontal">
                                        <form action="" method="post">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control" id="idUsuario"  placeholder="name" required>
                                                <label for="idUsuario">Usuario</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="idContrasena" placeholder="Password" required>
                                                <label for="idContrasena">Contraseña</label>
                                            </div><br>
                                            <div class="centrar-boton">
                                                <button type="button" onclick="iniciarSesion()" class="btn btn-primary btn-lg">Ingresar <i class="fa-solid fa-right-to-bracket fa-lg"></i></button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><h5 class="text-center" style="color:red" id="result"></h5>
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