<?php

$servidor="localhost";
$usuario="root";
$clave="";
$baseDeDatos="login_register_bd";

$conexion = mysqli_connect ("localhost" , "root" , "" , "login_register_bd");

//prueba de conexion
/*
if($conexion){
    echo "Conectado exitosamente a la base de datos";
}else{
    echo "No se a podido conectar a la base de datos";
} */
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-register.css">
    <title>Login y Registro</title>
</head>

<body>
    <section class="session__login_registrer">

        <!--Contenedor general-->
        <div class="container_all">
            <!--Contenedor trasero-->
            <div class="box_back">
                <div class="box_back_login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="box_back_Registrer">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Registrate para inicar sesión</p>
                    <button id="btn__resgistrarse">Registrarse</button>
                </div>
            </div>
            <!--Contenedor delantero-->
            <div class="container__login-resgister">
                <form action="" class="form__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Correo electronico">
                    <input type="password" placeholder="Contraseña">
                    <button>Entrar</button>
                </form>
                <form action="../php/registro_usuarios_be.php" method="POST" class="form__registrer">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name="nombre_completo">
                    <input type="text" placeholder="Correo Electronico" name="email">
                    <input type="text" placeholder="Usuario" name="user">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button>Registrarse</button>
                </form>
            </div>
        </div>
    </section>
    <script src="../js/login.js"></script>
</body>

</html>

