<?php 

include 'login.php';

$dni = $_POST['dni'] ?? '';
$cuil1 = $_POST['cuil1'] ?? '';
$cuil2 = $_POST['cuil2'] ?? '';
$cuil3 = $_POST['cuil3'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$fechaDeNacimiento = $_POST['nacimiento'] ?? '';
$genero = $_POST['genero'] ?? '';
$email = $_POST['email'] ?? '';
$repEmail = $_POST['repEmail'] ?? '';
$pais = $_POST['pais'] ?? '';
$otroPais = $_POST['otroPais'] ?? '';
$provincia = $_POST['provincia'] ?? '';
$municipalidad = $_POST['municipalidad'] ?? '';
$localidad = $_POST['localidad'] ?? '';
$calle = $_POST['calle'] ?? '';
$entreCalle = $_POST['entreCalle'] ?? '';
$altura = $_POST['altura'] ?? '';
$piso = $_POST['piso'] ?? '';
$depto = $_POST['depto'] ?? '';
$observacion = $_POST['per_observacion'] ?? '';


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
if (empty($dni) || empty($cuil1) || empty($cuil2) || empty($cuil3) || empty($contrasena) || empty($apellido) || empty($nombre) || empty($fechaDeNacimiento) || empty($genero) || empty($email) || empty($repEmail)) {
    die("Todos los campos son obligatorios.");
}

if ($email !== $repEmail) {
    die("Los correos electrónicos no coinciden.");
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


// Hashear la contraseña
$hashedPassword = password_hash($contrasena, PASSWORD_BCRYPT);

// Consulta preparada para insertar datos
try {
    $sql = "INSERT INTO usuarios (dni, cuil1, cuil2, cuil3, contrasena, apellido, nombre, fecha_nacimiento, genero, email, pais, otro_pais, provincia, municipalidad, localidad, calle, entre_calle, altura, piso, depto, observacion) 
            VALUES (:dni, :cuil1, :cuil2, :cuil3, :contrasena, :apellido, :nombre, :fecha_nacimiento, :genero, :email, :pais, :otro_pais, :provincia, :municipalidad, :localidad, :calle, :entre_calle, :altura, :piso, :depto, :observacion)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':dni' => $dni,
        ':cuil1' => $cuil1,
        ':cuil2' => $cuil2,
        ':cuil3' => $cuil3,
        ':contrasena' => $hashedPassword,
        ':apellido' => $apellido,
        ':nombre' => $nombre,
        ':fecha_nacimiento' => $fechaDeNacimiento,
        ':genero' => $genero,
        ':email' => $email,
        ':pais' => $pais,
        ':otro_pais' => $otroPais,
        ':provincia' => $provincia,
        ':municipalidad' => $municipalidad,
        ':localidad' => $localidad,
        ':calle' => $calle,
        ':entre_calle' => $entreCalle,
        ':altura' => $altura,
        ':piso' => $piso,
        ':depto' => $depto,
        ':observacion' => $observacion
    ]);

    echo "Registro exitoso";
} catch (PDOException $e) {
    die("Error al registrar: " . $e->getMessage());
}
?>
