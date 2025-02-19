<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id_usuario = $_POST['id_usuario'];
    $apellido_familiar = $_POST['apellido_familiar'];
    $nombre_familiar = $_POST['nombre_familiar'];
    $dni_familiar = $_POST['dni_familiar'];
    $fechaDeNacimiento_familiar = $_POST['fechaDeNacimiento_familiar'];
    $genero_familiar = $_POST['genero_familiar'];
    // Aquí manejamos el valor de convivencia (SI/NO)
    $convive_familiar = isset($_POST['convivencia_familiar']) ? ($_POST['convivencia_familiar'] === "SI" ? 1 : 0) : 0;
    $parentesco_familiar = $_POST['parentesco_familiar'];
    // Aquí verificamos el valor de otro_parentesco_familiar
    $otro_parentesco_familiar = isset($_POST['otro_parentesco_familiar']) ? $_POST['otro_parentesco_familiar'] : NULL;

    // Preparar la consulta
    $stmt = $conexion->prepare("INSERT INTO familiar (id_usuario, apellido_familiar, nombre_familiar, dni_familiar, fechaDeNacimiento_familiar, genero_familiar, convive_familiar, parentesco_familiar, otro_parentesco_familiar) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Error en la preparación: " . $conexion->error);
    }

    // Corregir el bind_param
    $stmt->bind_param("issssisss", $id_usuario, $apellido_familiar, $nombre_familiar, $dni_familiar, $fechaDeNacimiento_familiar, $genero_familiar, $convive_familiar, $parentesco_familiar, $otro_parentesco_familiar);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo '<script>
        alert("Registro exitoso");
        window.location = "../../public/misanvicente/ciudadano/datos_user.php";
    </script>';
    } else {
        echo "Error al vincular familiar: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();
