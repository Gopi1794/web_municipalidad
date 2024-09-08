<?php
session_start(); // Iniciar la sesión

// Verificar si las claves están definidas en la sesión
$nombre = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : '';
$apellido = isset($_SESSION['apellido_usuario']) ? $_SESSION['apellido_usuario'] : ''; 
$dni = isset($_SESSION['dni_usuario']) ? (int)$_SESSION['dni_usuario'] : 0; 
$cuil1 = isset($_SESSION['cuil1_usuario']) ? (int)$_SESSION['cuil1_usuario'] : 0; 
$cuil2 = isset($_SESSION['cuil2_usuario']) ? (int)$_SESSION['cuil2_usuario'] : 0;
$cuil3 = isset($_SESSION['cuil3_usuario']) ? (int)$_SESSION['cuil3_usuario'] : 0;
$fechaDeNacimientoSesion = isset($_SESSION['fechaDeNacimiento_usuario']) ? $_SESSION['fechaDeNacimiento_usuario'] : '';

// Inicializar la variable para la fecha formateada
$fechaDeNacimiento = '';

// Verificar que la fecha no esté vacía y sea válida
if (!empty($fechaDeNacimientoSesion) && strtotime($fechaDeNacimientoSesion) !== false) {
    $timestamp = strtotime($fechaDeNacimientoSesion);
    $format = 'd/m/Y'; // Puedes cambiar esto al formato que prefieras
    $fechaDeNacimiento = date($format, $timestamp);
} else {
    $fechaDeNacimiento = 'Fecha no válida o no definida';
}
// Inicializar la variable para la fecha formateada

// Mostrar valores para depuración
var_dump($nombre, $apellido, $dni ,$cuil1 , $cuil2 , $cuil3, $fechaDeNacimiento);

// Obtener la primera letra de nombre y apellido
$inicialNombre = !empty($nombre) ? substr($nombre, 0, 1) : '';
$inicialApellido = !empty($apellido) ? substr($apellido, 0, 1) : '';
$iniciales = strtoupper($inicialNombre . $inicialApellido); 
$cuilTotal = $cuil1 . '-' . $cuil2 . '-' . $cuil3;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi San Vicente</title>
    <link rel="stylesheet" href="../css/style-register.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <header class="cabeza">
        <div class="nav-bar">
            <a href="index.html" class="logo"><img src="../img/logoMiSanVicente.png" alt="Logo"></a>
            <div class="menu-container">
                <div class="user"><a href="#"><p><?php echo $iniciales; ?></p></a></div>
                <div class="btn-menu">
                    <i class="uil uil-align-right-justify nav-menu-btn-miSanvi"></i>
                </div>
            </div>
        </div>
    </header>
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
                <ul>
                    <li><a href="../php/login_2.php"><i class="uil uil-signin"></i>INGRESAR</a></li>
                    <li><a href="../php/login.php"><i class="uil uil-plus"></i>CREAR CUENTA</a></li>
                    <li><a href="#"><i class="uil uil-files-landscapes-alt"></i>TRAMITES</a></li>
                    <li><a href="#"><i class="uil uil-message"></i>ENVIAR CONSULTA</a></li>
                </ul>
                <a href="../index.html" class="logo-principal"><img src="../img/logomenu.png" alt="Logo"></a>
            </nav>
            <i class="uil uil-multiply nav-close-btn"></i>
        </div>
    </div>

    <div class="primer">
        <h2>Datos de la cuenta</h2>
        <hr>
        <div class="primer">
            <h2>Datos Personales</h2>
            <hr>
            <table>DNI:</table> <h3><?php echo $dni; ?></h3>
            <hr>
            <table>CUIL:</table> <h3><?php echo $cuilTotal; ?></h3>
            <hr>
            <table>NOMBRE:</table> <h3><?php echo strtoupper($nombre); ?></h3>
            <hr>
            <table>APELLIDO:</table> <h3><?php echo strtoupper($apellido); ?></h3>
            <hr>
            <table>FECHA NAC:</table> <h3><?php echo $fechaDeNacimiento; ?></h3>
            <hr>
            <table>GENERO:</table> <h3><?php echo $dni; ?></h3>
        </div>
    </div>

    <script>
        window.addEventListener("scroll", function() {
            const header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });

        document.addEventListener("DOMContentLoaded", function() {
            const menuBtnMiSanvicente = document.querySelector(".nav-menu-btn-miSanvi");
            const closeBtnMiSanvicente = document.querySelector(".nav-close-btn");
            const navegationMiSanVicente = document.querySelector(".cont-menu");

            menuBtnMiSanvicente.addEventListener("click", () => {
                navegationMiSanVicente.classList.add("active");
            });

            closeBtnMiSanvicente.addEventListener("click", () => {
                navegationMiSanVicente.classList.remove("active");
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/SweetAlert.js"></script>
</body>
</html>
