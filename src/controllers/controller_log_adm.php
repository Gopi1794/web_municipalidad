<?php
session_start(); // Inicia la sesión

include 'conexion.php'; // Conexión a la base de datos

if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST["dni_adm"]) || empty($_POST["contrasena_adm"])) {
        echo '<div class="alert alert-danger">DEBES LLENAR TODOS LOS CAMPOS</div>';
    } else {
        // Captura de los datos del formulario
        $dni_adm = $_POST["dni_adm"];
        $contrasena_adm = $_POST["contrasena_adm"];

        // Preparación de la consulta
        $stmt = $conexion->prepare("SELECT * FROM adm WHERE dni_adm = ? AND contrasena_adm = ?");
        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . $conexion->error);
        }

        $stmt->bind_param("ss", $dni_adm, $contrasena_adm);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificación de si existe el usuario
        if ($adm = $result->fetch_object()) {
            $_SESSION['dni_adm'] = $adm->dni_adm;
            $_SESSION['contrasena_adm'] = $adm->contrasena_adm;
            $_SESSION['nombre_adm'] = $adm->nombre;
            $_SESSION['apellido_adm'] = $adm->apellido; 

            // Redirigir a la página de inicio
            header("Location: ../../public/misanvicente/administrativo/index_adm.php");
            exit;
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
        }

        $stmt->close();
    }
}
?>

