<?php 

include 'login.php';

$dni = $_POST['dni'];
$cuil1 = $_POST['cuil1'];
$cuil2 = $_POST['cuil2'];
$cuil3 = $_POST['cuil3'];
$contrasena = $_POST['contrasena'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$nacimiento = $_POST['nacimiento'];
$repEmail = $_POST['repEmail'];
$email = $_POST['email'];
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

$query = "INSERT INTO datos (dni, cuil1, cuil2, cuil3 ,contrasena,apellido ,nombre ,  nacimiento , email  , repEmail ,pais,otropais, provincia ,municipalidad ,localidad ,calle ,entreCalle ,altura , piso , depto, per_observacion)
        VALUES ('$dni' 
        , '$cuil1' , 
        '$cuil2' , 
        '$cuil3' , 
        '$contrasena' ,
        '$apellido' ,
        '$nombre', 
        '$nacimiento' ,
        '$email' ,
        '$repEmail' ,
        '$pais',
        '$otropais',
        '$provincia',
        '$municipalidad', 
        '$localidad' , 
        '$calle', 
        '$entreCalle', 
        '$altura',
        '$piso' , 
        '$depto' , 
        '$per_observacion')";


// Verificar que los campos no estén vacíos (puedes añadir más validaciones según necesites)
if (empty($dni) || 
empty($cuil1) || 
empty($cuil2) || 
empty($cuil3) ||
empty($contrasena) ||
empty($apellido) || 
empty($nombre) || 
empty($nacimiento) || 
empty($email) || 
empty($repEmail) || 
empty($pais)) {
    echo '<script>
            Swal.fire({
                icon: "error",
                title: "Campo vacío",
                text: "Por favor, complete todos los campos."
            });
        </script>';
    exit();
}

    if (empty($email) || empty($repEmail) || $email !== $repEmail) {
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Campo vacío",
                text: "No repitio bien su mail , verifique cual es el correcto."
            });
        </script>';
        exit();
    }



//verificar que el correo no se repita en la base de datos

$verificar_user = mysqli_query ($conexion , "SELECT * FROM datos WHERE dni = '$dni'");

if (mysqli_num_rows($verificar_user) > 0) {
    echo '
    <script>
            Swal.fire({
                icon: "error",
                title: "Campo vacío",
                text: "Esta persona ya esta registrada"
            });
        </script>';
    exit();
}


$verificar_correo = mysqli_query ($conexion , "SELECT * FROM datos WHERE email = '$email'");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
    <script>
            Swal.fire({
                icon: "error",
                title: "Campo vacío",
                text: "El Email ya fue utilizado. Por favor use otro"
            });
        </script>';
    exit();
}


 // Utiliza una consulta preparada para evitar la inyección SQL


// Consulta preparada para insertar datos
$query = "INSERT INTO datos (dni, cuil1, cuil2, cuil3, contrasena, apellido, nombre, nacimiento, email, repEmail, 
        pais, otropais, provincia, municipalidad, localidad, calle, entreCalle, altura, piso, depto, per_observacion) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "sssssssssssssssssssss", 
    $dni, $cuil1, $cuil2, $cuil3, $contrasena, $apellido, $nombre, $nacimiento, $email, $repEmail, 
    $pais, $otropais, $provincia, $municipalidad, $localidad, $calle, $entreCalle, $altura, $piso, $depto, $per_observacion);
mysqli_stmt_execute($stmt);

// Verificar errores en la inserción
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo '<script>
    Swal.fire({
        icon: "success",
        title: "Registro exitoso",
        text: "Su registro ha sido completado exitosamente."
    }).then(function() {
        window.location = "login.php"; // Redirige a la página de login
    });
    </script>';
} else {
    echo '<script>
    Swal.fire({
        icon: "error",
        title: "Error en el registro",
        text: "Hubo un error al registrar. Inténtelo nuevamente."
    }).then(function() {
        window.location = "login.php"; // Redirige a la página de registro nuevamente
    });
    </script>';
}

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>