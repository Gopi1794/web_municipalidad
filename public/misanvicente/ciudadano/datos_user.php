<?php
session_start(); // Iniciar la sesión

// Verificar si las claves están definidas en la sesión
$nombre = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : '';
$apellido = isset($_SESSION['apellido_usuario']) ? $_SESSION['apellido_usuario'] : ''; 
$dni = isset($_SESSION['dni_usuario']) ? (int)$_SESSION['dni_usuario'] : 0; 
$cuil1 = isset($_SESSION['cuil1_usuario']) ? (int)$_SESSION['cuil1_usuario'] : 0; 
$cuil2 = isset($_SESSION['cuil2_usuario']) ? (int)$_SESSION['cuil2_usuario'] : 0;
$cuil3 = isset($_SESSION['cuil3_usuario']) ? (int)$_SESSION['cuil3_usuario'] : 0;
$fechaDeNacimiento = isset($_SESSION['fechaDeNacimiento_usuario']) ? $_SESSION['fechaDeNacimiento_usuario'] : '';
$email = isset($_SESSION['email_usuario']) ? $_SESSION['email_usuario'] : '';
$celular = isset($_SESSION['celular_usuario']) ?  (int)$_SESSION['celular_usuario'] : '';
$genero = isset($_SESSION['genero_usuario']) ?  $_SESSION['genero_usuario'] : '';
$pais = isset($_SESSION['pais_usuario']) ? $_SESSION['pais_usuario'] : '';
$provincia = isset($_SESSION['provincia_usuario']) ? $_SESSION['provincia_usuario'] : '';
$municipalidad = isset($_SESSION['municipalidad_usuario']) ? $_SESSION['municipalidad_usuario'] : '';
$localidad = isset($_SESSION['localidad_usuario']) ? $_SESSION['localidad_usuario'] : '';
$calle = isset($_SESSION['calle_usuario']) ? $_SESSION['calle_usuario'] : '';
$entreCalle = isset($_SESSION['entre_calle_usuario']) ? $_SESSION['entre_calle_usuario'] : '';
$altura = isset($_SESSION['altura_usuario']) ? $_SESSION['altura_usuario'] : '';
$verificado = isset($_SESSION['verificacion']) ? (int)$_SESSION['verificacion'] : 0;


// Verificar que la fecha no esté vacía y sea válida
if (!empty($fechaDeNacimiento)) {
    // Convertir la fecha del formato Y-m-d a un objeto DateTime
    $date = DateTime::createFromFormat('Y-m-d', $fechaDeNacimiento);  // El formato de la fecha en la base de datos
    if ($date !== false) {
        // Formatear la fecha para mostrar en un formato más legible (d/m/Y)
        $fechaDeNacimiento = $date->format('d/m/Y');  // El formato para mostrar la fecha
    } else {
        $fechaDeNacimiento = 'Fecha no válida';
    }
} else {
    $fechaDeNacimiento = 'Fecha no válida o no definida';
}

// Inicializar la variable para la fecha formateada

// Mostrar valores para depuración
// var_dump($nombre, $apellido, $dni ,$cuil1 , $cuil2 , $cuil3, $fechaDeNacimiento,$email, $pais , $provincia);

// Obtener la primera letra de nombre y apellido
$inicialNombre = !empty($nombre) ? substr($nombre, 0, 1) : '';
$inicialApellido = !empty($apellido) ? substr($apellido, 0, 1) : '';
$iniciales = strtoupper($inicialNombre . $inicialApellido); 
$cuilTotal = $cuil1 . '-' . $cuil2 . '-' . $cuil3;

$claseVerificacion = $verificado === 1 ? "texto-verde" : "texto-rojo";
$mensajeVerificacion = $verificado === 1 ? "Correo Verificado" : "Correo No Verificado";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi San Vicente</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style-register.css">
</head>
<body>
    <header class="cabeza">
        <div class="nav-bar">
            <a href="index.php" class="logo"><img src="../../img/logos_sanvicente/logo_misanvicente.png" alt="Logo"></a>
            <div class="menu-container">
            <button class="button-cerrar-iniciar" id="button-cerrar" type="button" name="btnCerrar">CERRAR SESION</button>

                <div class="user"><a href="#"><p><?php echo $iniciales; ?></p></a></div>
                <div class="btn-menu">
                    <i class="uil uil-align-right-justify nav-menu-btn-miSanvi"></i>
                </div>
            </div>
        </div>
    </header>
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
                <ul>
                    <li><a href="login_ciudadanos.php"><i class="uil uil-signin"></i>INGRESAR</a></li>
                    <li><a href="new_account.php"><i class="uil uil-plus"></i>CREAR CUENTA</a></li>
                    <li><a href="#"><i class="uil uil-files-landscapes-alt"></i>TRAMITES</a></li>
                    <li><a href="#"><i class="uil uil-message"></i>ENVIAR CONSULTA</a></li>
                </ul>
                <a href="../index.html" class="logo-principal"><img src="../../img/logos_sanvicente//logo_menu_misanvicente.png" alt="Logo"></a>
            </nav>              
            <i class="uil uil-multiply nav-close-btn"></i>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="primer4 modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-3 " style="color: #ffffff;" id="exampleModalToggleLabel">FAMILIAR</h1>
      </div>

      <div class="modal-body">
        <div class="primer3">
        <form action="../../../src/controllers/" method="post">
                <div class="datos">
                    <label for="apellido">APELLIDO:</label>
                    <input type="text" id="apellido" name="apellido" title="Apellido de la persona que se registra" required>
                </div>

                <div class="datos">
                    <label for="nombre">NOMBRE:</label>
                    <input type="text" id="nombre" name="nombre" title="Nombre de la persona que se registra" required>
                </div>

                <div class="datos">
                    <label for="dni1">DNI:</label>
                    <input type="number" id="dni1" name="dni" min="0" max="99999999" title="DNI de la persona que se registra 'SIN PUNTOS'" required>
                </div>

                <div class="datos">
                    <label for="fechaDeNacimiento">FECHA DE NACIMIENTO:</label>
                    <input type="date" id="fechaDeNacimiento" title="Fecha de nacimiento de la persona que se registra" name="fechaDeNacimiento" required>
                </div>
                
                <div class="datos">
                    <label for="genero">GENERO:</label>
                    <select id="genero" name="genero" title="Seleccione del sexo de la persona" required>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                        <option value="NO BINARIO">NO BINARIO</option>
                        <option value="INDEFINIDO">INDEFINIDO</option>
                    </select>
                </div>

                <div class="datos" >
                    <label for="convivencia">VIVE EN MI DOMICILIO</label>
                <input type="checkbox" required>
                </div>

                <div class="datos">
                    <label for="parentesco">PARENTESCO:</label>
                    <select id="parentesco" name="parentesco" title="parentesco del familiar" required>
                        <option value="CONYUGE O PAREJA">CONYUGE O PAREJA</option>
                        <option value="HIJO(A)/HIJASTRO(A)">HIJO(A) / HIJASTRO(A)</option>
                        <option value="MADRE/PADRE/SUEGRO(A)">MADRE/PADRE/SUEGRO(A)</option>
                        <option value="NUERA/YERNO">NUERA/YERNO</option>
                        <option value="OTROS FAMILIARES">OTROS FAMILIARES</option>
                        <option value="OTROS NO FAMILIARES">OTROS NO FAMILIARES</option>
                    </select>
                </div>
                
                <div class="datos" >
                    <label for="otro parentesco">OTRO PARENTESCO</label>
                <input type="checkbox" required>
                </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-success">GUARDAR</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <div class="primer3">
        <h2>Datos de la cuenta</h2>
        <hr>
        <div class="primer4">
            <h2>Datos Personales</h2>
            <hr>
            <table>DNI:</table> <h4><?php echo $dni; ?></h4>
            <hr>
            <table>CUIL:</table> <h4><?php echo $cuilTotal; ?></h4>
            <hr>
            <table>NOMBRE:</table> <h4><?php echo strtoupper($nombre); ?></h4>
            <hr>    
            <table>APELLIDO:</table> <h4><?php echo strtoupper($apellido); ?></h4>
            <hr>
            <table>FECHA NAC:</table> <h4><?php echo $fechaDeNacimiento; ?></h4>
            <hr>
            <table>GENERO:</table> <h4><?php echo $genero;?></h4>
            <br>
            <br>
            <h2>Datos de contacto</h2>
            <table>CELULAR:</table> <h4><?php echo $celular; ?></h4>
            <hr>
            <table>EMAIL:</table> 
<h4 class="<?php echo $claseVerificacion; ?>">
    <?php echo $email . ' - ' .  $mensajeVerificacion; ?>
</h4>

        
        </div>
        
        <div class="primer4">
            <h2>Residencia</h2>
            <hr>
            <table>PAIS:</table> <h4><?php echo $pais; ?></h4>
            <hr>
            <table>PROVINCIA:</table> <h4><?php echo $provincia; ?></h4>
            <hr>
            <table>MUNICIPIO:</table> <h4><?php echo $municipalidad ?></h4>
            <hr>
            <table>LOCALIDAD:</table> <h4><?php echo $localidad; ?></h4>
            <hr>
            <table>CALLE:</table> <h4><?php echo $calle; ?></h4>
            <hr>
            <table>ENTRE CALLE:</table><h4><?php echo$entreCalle ?></h4>
            <hr>
            <table>ALTURA:</table><h4><?php echo $altura ?></h4>
        </div>

        <div class="primer4">
            <h2>Archivos del Perfil</h2>
            <hr>
            <table><h4>FRENTE DEL DNI</h4><br>
            Envíenos una fotografía en formato horizontal del frente de su DNI:</table> <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupFile01">Subir</label>
  <input type="file" class="form-control" id="inputGroupFile01">
</div>
<table><h4>DORSO DEL DNI</h4><br>
            Envíenos una fotografía en formato horizontal del dorso de su DNI:</table> <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupFile01">Subir</label>
  <input type="file" class="form-control" id="inputGroupFile01">
</div>
        </div>

    <div class="primer4">
         <h2>Mis familiares vinculados</h2>
         <hr>
         <BR>
         <button type="button" id="myModal" class="button-cerrar-iniciar" data-bs-toggle="modal" data-bs-target="#exampleModal">
    AGREGAR FAMILAR
</button>
</div>

    
    </div>
    <script>
        window.addEventListener("scroll", function() {
            const header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });

        document.addEventListener("DOMContentLoaded", function() {
            const menuBtnMiSanvicente = document.querySelector(".nav-menu-btn-miSanvi");
            const closeBtnMiSanvicente = document.querySelector(".nav-close-btn");
            const navegationMiSanVicente = document.querySelector(".cont-menu");

            menuBtnMiSanvicente.addEventListener("click", () => {
                navegationMiSanVicente.classList.add("active");
            });

            closeBtnMiSanvicente.addEventListener("click", () => {
                navegationMiSanVicente.classList.remove("active");
            });
        });
    </script>
    <script defer src="../../js/ventana_emergente.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../../vendor/SweetAlert.js"></script>
    <script src="../../js/accionIniciarCrear.js"></script>
    

</body>
</html>
