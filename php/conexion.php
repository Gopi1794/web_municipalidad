<?php

$servidor="localhost";
$usuario="root";
$clave="";
$baseDeDatos="login_register_bd";

$conexion = mysqli_connect ("localhost" , "root" , "" , "login_register_bd");
$conexion->set_charset('utf8');

//prueba de conexion
/*
if($conexion){
    echo "Conectado exitosamente a la base de datos";
}else{
    echo "No se a podido conectar a la base de datos";
}*/

?>