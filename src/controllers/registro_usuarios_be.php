<?php 
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $dni = $_POST['dni'];
    $cuil1 = $_POST['cuil1'];
    $cuil2 = $_POST['cuil2'];
    $cuil3 = $_POST['cuil3'];
    $contrasena = $_POST['contrasena'];
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $fechaDeNacimiento = $_POST['fechaDeNacimiento'];
    $email = $_POST['email'];
    $repEmail = $_POST['repEmail'];
    $pais = $_POST['pais'];
    $otropais = $_POST['otropais'];
    $provincia = $_POST['provincia'];
    $municipalidad = $_POST['municipalidad'];
    $localidad = $_POST['localidad'];
    $calle = $_POST['calle'];
    $entreCalle = $_POST['entreCalle'];
    $altura = $_POST['altura'];
    $piso = $_POST['piso'];
    $depto = $_POST['depto'];
    $per_observacion = $_POST['per_observacion'];

    // Validar campos vacíos
    if (empty($dni) || empty($cuil1) || empty($cuil2) || empty($cuil3) || empty($contrasena) || empty($apellido) || 
        empty($nombre) || empty($fechaDeNacimiento) || empty($email) || empty($repEmail) || empty($pais)) {
        echo '<script>
                alert("Por favor, complete todos los campos.");
                window.location = "login.php";
              </script>';
        exit();
    }

    // Verificar coincidencia de correos electrónicos
    if ($email !== $repEmail) {
        echo '<script>
                alert("Los correos electrónicos no coinciden. Verifique.");
                window.location = "login.php";
              </script>';
        exit();
    }

    // Verificar que el correo y el DNI no se repitan en la base de datos
    $verificar_user = mysqli_query($conexion, "SELECT * FROM datos WHERE dni = '$dni'");
    if (mysqli_num_rows($verificar_user) > 0) {
        echo '<script>
                alert("Esta persona ya está registrada.");
                window.location = "login.php";
              </script>';
        exit();
    }

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM datos WHERE email = '$email'");
    if (mysqli_num_rows($verificar_correo) > 0) {
        echo '<script>
                alert("El Email ya fue utilizado. Por favor use otro.");
                window.location = "login.php";
              </script>';
        exit();
    }

    // Generar token único para verificación
    $token = bin2hex(random_bytes(6)); // Token de 100 caracteres en hexadecimal

    // Utiliza una consulta preparada para evitar la inyección SQL
    $query = "INSERT INTO datos (dni, cuil1, cuil2, cuil3, contrasena, apellido, nombre, fechaDeNacimiento, email, repEmail, 
            pais, otropais, provincia, municipalidad, localidad, calle, entreCalle, altura, piso, depto, per_observacion, token, verificado) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssss", 
        $dni, $cuil1, $cuil2, $cuil3, $contrasena, $apellido, $nombre, $fechaDeNacimiento, $email, $repEmail, 
        $pais, $otropais, $provincia, $municipalidad, $localidad, $calle, $entreCalle, $altura, $piso, $depto, $per_observacion, $token);
    
    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {
        // Enviar correo de verificación
        $subject = "Verificación de correo electrónico";
        $message = "Hola, por favor verifica tu correo haciendo clic en el siguiente enlace:\n\n";
        $message .= "http://localhost/verificar_email.php?token=" . $token;
        $headers = "From: no-reply@tu-dominio.com";

        if (mail($email, $subject, $message, $headers)) {
            echo '<script>
                    alert("Registro exitoso. Se ha enviado un correo de verificación a tu email.");
                    window.location = "login.php";
                  </script>';
        } else {
            echo '<script>
                    alert("Hubo un error al enviar el correo de verificación.");
                    window.location = "login.php";
                  </script>';
        }
    } else {
        echo '<script>
                alert("Hubo un error al registrar. Inténtelo nuevamente.");
                window.location = "login.php";
              </script>';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
}
?>
