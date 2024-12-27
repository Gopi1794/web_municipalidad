<?php
session_start(); // Inicia la sesión

// Asegúrate de que la conexión a la base de datos esté establecida

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
            // Guardar los datos del usuario en la sesión
            $_SESSION['id_usuario'] = $datos->id_usuario;
            $_SESSION['nombre_usuario'] = $datos->nombre;
            $_SESSION['apellido_usuario'] = $datos->apellido;
            $_SESSION['dni_usuario'] = $datos->dni;
            $_SESSION['cuil1_usuario'] = $datos->cuil1;
            $_SESSION['cuil2_usuario'] = $datos->cuil2;
            $_SESSION['cuil3_usuario'] = $datos->cuil3;
            $_SESSION['fechaDeNacimiento_usuario'] = $datos->fechaDeNacimiento;
            $_SESSION['genero_usuario'] = $datos->genero;
            $_SESSION['celular_usuario'] = $datos->celular;
            $_SESSION['email_usuario'] = $datos->email;
            $_SESSION['pais_usuario'] = $datos->pais;
            $_SESSION['provincia_usuario'] = $datos->provincia;
            $_SESSION['municipalidad_usuario'] = $datos->municipalidad;
            $_SESSION['localidad_usuario'] = $datos->localidad;
            $_SESSION['calle_usuario'] = $datos->calle;
            $_SESSION['entre_calle_usuario'] = $datos->entreCalle;
            $_SESSION['altura_usuario'] = $datos->altura;

            // Consulta para obtener datos del familiar
            $stmt2 = $conexion->prepare("SELECT * FROM familiar WHERE id_usuario = ?");
            $stmt2->bind_param("i", $datos->id_usuario);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            // Guardar los datos del familiar en la sesión
            $_SESSION['familiares'] = [];
            while ($familiar = $result2->fetch_assoc()) {
                $_SESSION['familiares'][] = $familiar;
            }

            // Redirigir a la página de inicio
            header("Location: index.php");
            exit;
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
        }

        // Cierre de la declaración
        $stmt->close();
        $stmt2->close();
    }
}

if (!empty($_POST["btnGuardarFamiliar"])) {
    // Captura de los datos del formulario del familiar
    $nombre_familiar = $_POST["nombre_familiar"];
    $apellido_familiar = $_POST["apellido_familiar"];
    $dni_familiar = $_POST["dni_familiar"];
    $fechaDeNacimiento_familiar = $_POST["fechaDeNacimiento_familiar"];
    $genero_familiar = $_POST["genero_familiar"];
    $id_usuario = $_SESSION['id_usuario'];

    // Guardar los datos del familiar en la base de datos
    $stmt = $conexion->prepare("INSERT INTO familiar (id_usuario, nombre, apellido, dni, fechaDeNacimiento, genero) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $id_usuario, $nombre_familiar, $apellido_familiar, $dni_familiar, $fechaDeNacimiento_familiar, $genero_familiar);
    $stmt->execute();

    // Actualizar la sesión con los nuevos datos del familiar
    $stmt2 = $conexion->prepare("SELECT * FROM familiar WHERE id_usuario = ?");
    $stmt2->bind_param("i", $id_usuario);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    $_SESSION['familiares'] = [];
    while ($familiar = $result2->fetch_assoc()) {
        $_SESSION['familiares'][] = $familiar;
    }

    // Redirigir a la misma página para refrescar los datos
    header("Location: ../../../../public/misanvicente/ciudadano/datos_user.php");
    exit;
}

if (isset($_POST['btnCerrar']) || isset($_GET['cerrarSesion'])) {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    header("Location: ../../public/misanvicente/index.html");
    exit;
}
?>