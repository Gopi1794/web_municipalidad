<?php

session_start(); // Inicia la sesión

$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : '';
$nombre = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : '';
$apellido = isset($_SESSION['apellido_usuario']) ? $_SESSION['apellido_usuario'] : '';

/*Datos de familiares*/

/*Datos de familiares*/
$nombre_familiar = isset($_SESSION['nombre_familiar']) ? $_SESSION['nombre_familiar'] : '';
$apellido_familiar = isset($_SESSION['apellido_familiar']) ? $_SESSION['apellido_familiar'] : '';
$dni_familiar = isset($_SESSION['dni_familiar']) ? (int)$_SESSION['dni_familiar'] : 0;
$fechaDeNacimiento_familiar = isset($_SESSION['fechaDeNacimiento_familiar']) ? $_SESSION['fechaDeNacimiento_familiar'] : '';
$genero_familiar = isset($_SESSION['genero_familiar']) ? $_SESSION['genero_familiar'] : '';


// Verificar que las fechas no estén vacías y sean válidas
if (!empty($fechaDeNacimiento) && !empty($fechaDeNacimiento_familiar)) {
    // Convertir la fecha del formato Y-m-d a un objeto DateTime
    $date = DateTime::createFromFormat('d-m-Y', $fechaDeNacimiento);
    $dateFamiliar = DateTime::createFromFormat('d-m-Y', $fechaDeNacimiento_familiar);

    // Validar y formatear las fechas
    if ($date !== false) {
        $fechaDeNacimiento = $date->format('d/m/Y');
    } else {
        $fechaDeNacimiento = 'Fecha no válida';
    }

    if ($dateFamiliar !== false) {
        $fechaDeNacimiento_familiar = $dateFamiliar->format('d/m/Y');
    } else {
        $fechaDeNacimiento_familiar = 'Fecha no válida';
    }
} else {
    if (empty($fechaDeNacimiento)) {
        $fechaDeNacimiento = 'Fecha de nacimiento no definida';
    }
    if (empty($fechaDeNacimiento_familiar)) {
        $fechaDeNacimiento_familiar = 'Fecha de nacimiento del familiar no definida';
    }
}

$inicialNombre = !empty($nombre) ? substr($nombre, 0, 1) : '';
$inicialApellido = !empty($apellido) ? substr($apellido, 0, 1) : '';
$iniciales = strtoupper($inicialNombre . $inicialApellido);

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

                <div class="user"><a href="#">
                        <p><?php echo $iniciales; ?></p>
                    </a></div>
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


    <!-- Modal de Editar Familiar -->
    <div class="modal fade" id="modalEditarFamiliar" tabindex="-1" aria-labelledby="editarFamiliarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarFamiliarLabel">Editar Familiar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarFamiliar">
                        <input type="hidden" id="familiarId" name="familiarId">

                        <div class="mb-3">
                            <label for="nombreFamiliar" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreFamiliar" name="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellidoFamiliar" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellidoFamiliar" name="apellido" required>
                        </div>

                        <div class="mb-3">
                            <label for="dniFamiliar" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dniFamiliar" name="dni" required>
                        </div>

                        <div class="mb-3">
                            <label for="fechaNacimientoFamiliar" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimientoFamiliar" name="fechaNacimiento" required>
                        </div>

                        <div class="mb-3">
                            <label for="generoFamiliar" class="form-label">Género</label>
                            <select class="form-select" id="generoFamiliar" name="genero" required>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="primer3">
        <div class="table-responsive-edit">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Genero</th>
                        <th>Parentesco</th>
                        <th>Convive</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['familiares']) && count($_SESSION['familiares']) > 0) {
                        foreach ($_SESSION['familiares'] as $familiar) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($familiar['nombre_familiar'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($familiar['apellido_familiar'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($familiar['dni_familiar'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($familiar['fechaDeNacimiento_familiar'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($familiar['genero_familiar'] ?? '') . "</td>";
                            echo "<td>CONYUGE O PAREJA</td>"; // Ajusta según sea necesario
                            echo "<td>SI</td>"; // Ajusta según sea necesario
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No hay datos disponibles</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
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
    <script src="../../js/loader.js"></script>
    <script defer src="../../js/ventana_emergente.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../../vendor/SweetAlert.js"></script>
    <script defer src="../../../vendor/SweetAlertRegister.js"></script>
    <script src="../../js/accionIniciarCrear.js"></script>

</body>

</html>