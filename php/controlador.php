<?php
session_start(); // Inicia la sesión

if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST["cuil1"]) || empty($_POST["cuil2"]) || empty($_POST["cuil3"]) || empty($_POST["contrasena"])) {
        echo '<div class="alert alert-danger">DEBES LLENAR TODOS LOS CAMPOS</div>';
    } else {
        // Captura de los datos del formulario
        $cuil1 = $_POST["cuil1"];
        $cuil2 = $_POST["cuil2"];
        $cuil3 = $_POST["cuil3"];
        $contrasena = $_POST["contrasena"];

        // Preparación de la consulta
        $stmt = $conexion->prepare("SELECT * FROM datos WHERE cuil1 = ? AND cuil2 = ? AND cuil3 = ? AND contrasena = ?");
        $stmt->bind_param("ssss", $cuil1, $cuil2, $cuil3, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificación de si existe el usuario
        if ($datos = $result->fetch_object()) {
            // Guardar el nombre y apellido del usuario en la sesión
            $_SESSION['nombre_usuario'] = $datos->nombre;
            $_SESSION['apellido_usuario'] = $datos->apellido;

            // Redirigir a la página de inicio
            header("Location: ../misanvicente/index.php");
            exit;
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
        }

        // Cierre de la declaración
        $stmt->close();
    }
}
?>
