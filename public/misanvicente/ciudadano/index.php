<?php
session_start(); // Iniciar la sesión

// Verificar si las claves 'nombre' y 'apellido' están definidas en la sesión
$nombre = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : 'Incie'; // Si no existe, valor vacío
$apellido = isset($_SESSION['apellido_usuario']) ? $_SESSION['apellido_usuario'] : 'Sesion , Por favor'; // Si no existe, valor vacío

// Obtener la primera letra de nombre y apellido (solo si no están vacíos)
$inicialNombre = !empty($nombre) ? substr($nombre, 0, 1) : ''; // Si $nombre está vacío, devolver ''
$inicialApellido = !empty($apellido) ? substr($apellido, 0, 1) : ''; // Si $apellido está vacío, devolver ''

// Combinar las iniciales
$iniciales = strtoupper($inicialNombre . $inicialApellido); // Combinar en mayúsculas
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi San Vicente</title>
    <link rel="stylesheet"href="../../css/style-register.css"> 
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <header class="cabeza">
        <div class="nav-bar">
            <a href="index.php" class="logo"><img src="../../img/logos_sanvicente/logo_misanvicente.png" alt="Logo"></a>
            <div class="menu-container">
            <div class="user"><a href="datos_user.php"><p><?php echo $iniciales; ?></p></a></div>
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
                        <li><a href="login_ciudadanos.php"><i class="uil uil-signin"></i>INGRESAR</a>
                        <li><a href="new_account.php"><i class="uil uil-plus"></i>CREAR CUENTA</a>
                        <li><a href="#"><i class="uil uil-files-landscapes-alt"></i>TRAMITES</a>
                        <li><a href="#"><i class="uil uil-message"></i>ENVIAR CONSULTA</a>
                    </ul>
                    <a href="../../../index.html" class="logo-principal"><img src="../../img/logos_sanvicente/logo_menu_misanvicente.png" alt="Logo"></a>
                </nav>
                <i class="uil uil-multiply nav-close-btn"></i>
            </div>
        </div>
        <div class="primer">
            <div class="tramite-login">
                <div class="tramite">
                <?php
    
                    if (isset($_SESSION['nombre_usuario']) && isset($_SESSION['apellido_usuario'])) {
                    echo '<h2>Bienvenido, ' . htmlspecialchars($_SESSION['nombre_usuario']) . ' ' . htmlspecialchars($_SESSION['apellido_usuario']) . '!</h2>';
                    } else {
                    echo '<p>No se ha iniciado sesión.</p>';
                    }
                    ?>
                    <input class="search" id="buscar" name="query" placeholder="Buscar Tramite">
                    <input class="button-buscar" id="button-buscar" type="submit" value="Buscar">
                </div>
            </div>
        </div>
            <div class="primer">
                    <h2>Registro Municipal Único y Permanente de Demanda Habitacional</h2>
                    <hr>
                    <p>El “Registro Municipal Único y Permanente de Demanda Habitacional” tiene por objeto reunir información relativa a aquellas “familias que habitan en el partido de San Vicente”, se encuentran en situación de déficit habitacional y aspiran a acceder a una vivienda digna.</p>

                        <p>personas interesadas podrán inscribirse “en línea” a través de la página web oficial  o podrán solicitar “un turno para ser atendidos en dependencias municipales” a los mismos fines.</p>
                        
                        <h3>Requisitos básicos para inscribirse en el Registro:</h3>
                        
                        <p>a) Habitar el grupo familiar en el partido de San Vicente.</p>
                        <p>b) Informar composición del grupo familiar conviviente, indicando número de DNI y CUIL/CUIT del solicitante –que será el titular- y de quienes integran el grupo familiar conviviente.</p>
                        <p>c) Informar si la/el titular o quienes integran el grupo familiar conviviente percibe ingresos de manera formal o informal, o es beneficiaria/o de algún plan social, en todos los casos indicando monto.</p>
                        <p>d) Informar si el grupo familiar está integrado con alguna persona discapacitada.</p>
                        <p>e) Informar si la solicitante –titular- es madre sola.</p>
                        <p>f) Informar situación habitacional actual.</p>
                        
                        <h3>Documentación a acompañar:</h3>
                        <p>• DNI y CUIL/CUIT del solicitante –titular- y de quienes integran el grupo familiar conviviente. </p>
                        <p>• Documentación que acredite los vínculos de familia de quienes integran el grupo familiar conviviente.</p>
                        <p>• Recibo de haberes del solicitante y de todo el grupo familiar conviviente cuando tuvieren un trabajo formal o fueran jubilados o pensionados.</p>
                        <p>• Certificado de discapacidad.</p>
                        
                        <p>La información y la documentación arriba indicada son básicas, sin perjuicio de otra que se pueda exigir a través de la página oficial o en las dependencias municipales.</p>
                        
                        <p>La inscripción tiene el alcance de una “declaración jurada”.</p>
                        
                        <h3>Pasos a seguir para realizar el trámite de inscripción:</h3>
                        <p>1) Ingresar al Registro Municipal Único y Permanente de Demanda Habitacional desde el botón de acceso que al final de este instructivo.</p>
                        <p> 2) Registrarse como usuario, para lo cual se deberá contar con una dirección de correo electrónico.</p>
                        <p> 3) Validación del correo electrónico.</p>
                        <p>4) Completar formulario con datos personales y del grupo familiar conviviente.</p>
                        <p>5) Subir la documentación que se requiere en formato PDF.</p>
                        <p> 6) Marcar el cuadro que indica que los datos informados y la documentación subida revisten carácter de Declaración Jurada.</p>
                        <p>7) Al finalizar, presionar el botón “Guardar”.</p>
                        
                        <p>Se podrá ingresar al Registro tantas veces que sea necesario para actualizar los datos</p>

                        <h2>Archivos asociados</h2>
                        <hr>

                        <p>Certificado de discapacidad del solicitante</p>
                        <p>Certificado de discapacidad (2º opcional)</p>
                        <p>Certificado de discapacidad (3º opcional)</p>
                        <p>Recibo de haberes (solicitante - opcional)</p>
                        <p>Recibo de haberes (un familiar - opcional)</p>
                        <p>Recibo de haberes (otro familiar - opcional)</p>
            </div>

            <script>
                window.addEventListener("scroll", function() {
                    const header = document.querySelector("header");
                    header.classList.toggle("sticky", window.scrollY > 0);
                });
            </script>


            <script>
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
            
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../../../vendor/SweetAlert.js"></script>
            
        
</body>
</html>