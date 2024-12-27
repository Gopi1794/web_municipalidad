<?php
include 'conexion.php';

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id_usuario = $_POST['id_usuario'];
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fechaDeNacimiento'];
    $genero = $_POST['genero'];
    $convive = isset($_POST['convivencia']) ? 1 : 0;
    $parentesco = $_POST['parentesco'];
    $otro_parentesco = isset($_POST['otro_parentesco']) ? $_POST['otro_parentesco'] : NULL;

    // Preparar la consulta
    $stmt = $conexion->prepare("INSERT INTO familiar (id_usuario, apellido, nombre, dni, fecha_nacimiento, genero, convive, parentesco, otro_parentesco) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Error en la preparación: " . $conexion->error);
    }

    // Corregir el bind_param
    $stmt->bind_param("ississsss", $id_usuario, $apellido, $nombre, $dni, $fecha_nacimiento, $genero, $convive, $parentesco, $otro_parentesco);

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
?>
