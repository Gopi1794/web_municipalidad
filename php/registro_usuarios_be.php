<?php 

include 'login.php';

$nombre_completo = $_POST['nombre_completo'];
$email = $_POST['email'];
$user = $_POST['user'];
$contrasena = $_POST['contrasena'];

$query = "INSERT INTO datos (nombre_completo, email, user, contrasena)
        VALUES ('$nombre_completo' , '$email' , '$user' , '$contrasena')";


// Verificar que los campos no estén vacíos (puedes añadir más validaciones según necesites)
if (empty($nombre_completo) || empty($email) || empty($user) || empty($contrasena)) {
    echo '
    <script>
    alert("Por favor, completa todos los campos.");
    window.location = "login.php"; // Redirige a la página de registro nuevamente
    </script>';
    exit();
}
//verificar que el correo no se repita en la base de datos

$verificar_correo = mysqli_query ($conexion , "SELECT * FROM datos WHERE email = '$email'");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
    <script>
    alert("El correo electrónico ya está registrado. Por favor, utiliza otro.");
    window.location = "login.php"; // Redirige a la página de registro nuevamente
    </script>';
    exit();
}

$verificar_user = mysqli_query ($conexion , "SELECT * FROM datos WHERE user = '$user'");

if (mysqli_num_rows($verificar_user) > 0) {
    echo '
    <script>
    alert("El nombre de usuario no disponible. Por favor, utiliza otro.");
    window.location = "login.php"; // Redirige a la página de registro nuevamente
    </script>';
    exit();
}

 // Utiliza una consulta preparada para evitar la inyección SQL


// Consulta preparada para insertar datos
$query = "INSERT INTO datos (nombre_completo, email, user, contrasena) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "ssss", $nombre_completo, $email, $user, $contrasena);
mysqli_stmt_execute($stmt);

// Verificar errores en la inserción
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo '
    <script>
    alert("Registro exitoso.");
    window.location = "login.php"; // Redirige a la página de login
    </script>';
} else {
    echo '
    <script>
    alert("Error al registrar. Inténtalo nuevamente.");
    window.location = "login.php"; // Redirige a la página de registro nuevamente
    </script>';
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>