<?php 
include 'conexion.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Buscar el token en la base de datos
    $query = "SELECT * FROM datos WHERE token = ? AND verificado = 0 LIMIT 1";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Si el token es válido, marcar como verificado
        $update_query = "UPDATE datos SET verificado = 1 WHERE token = ?";
        $update_stmt = mysqli_prepare($conexion, $update_query);
        mysqli_stmt_bind_param($update_stmt, "s", $token);
        mysqli_stmt_execute($update_stmt);

        echo '<script>
                alert("Tu correo ha sido verificado correctamente.");
                window.location = "login.php";
              </script>';
    } else {
        echo '<script>
                alert("El token es inválido o el correo ya ha sido verificado.");
                window.location = "login.php";
              </script>';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    echo '<script>
            alert("No se proporcionó un token de verificación.");
            window.location = "login.php";
          </script>';
}
?>
