<?php
session_start(); // Inicia la sesión

if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST["dni_adm"]) || empty($_POST["contrasena_adm"])) {
        echo '<div class="alert alert-danger">DEBES LLENAR TODOS LOS CAMPOS</div>';
    } else {
        // Captura de los datos del formulario
        $dni_adm = $_POST["dni_adm"];
        $contrasena_adm = $_POST["contrasena_adm"];

        // Preparación de la consulta
        $stmt = $conexion->prepare("SELECT * FROM adm WHERE dni_adm = ? AND contrasena_adm = ?");
        $stmt->bind_param("ss", $dni_adm, $contrasena_adm); // Solo dos tipos "ss" para las dos variables
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificación de si existe el usuario
        if ($datos = $result->fetch_object()) {
            // Guardar los datos del usuario en la sesión
            $_SESSION['dni_adm'] = $datos->nombre;  // Cambiado a $datos
            $_SESSION['contrasena_adm'] = $datos->apellido;  // Cambiado a $datos

            // Redirigir a la página de inicio
            header("Location: ../misanvicente/index.php ");
            exit;
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
        }

        // Cierre de la declaración
        $stmt->close();
    }
}
?>
