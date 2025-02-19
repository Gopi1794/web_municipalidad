<?php
session_start(); // Iniciar la sesión

// Verificar si las claves están definidas en la sesión
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : '';
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

/*Datos de familiares*/


// Verificar que la fecha no esté vacía y sea válida
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
    <meta property="og:title" content="Mi San Vicente">
    <meta property="og:description" content="Gestion de persona de la Municipalidad de San Vicente.">
    <meta property="og:image" content="https://webmunicipal.online/public/img/logos_sanvicente/logo_misanvicente.png">
    <meta property="og:url" content="https://webmunicipal.online/public/misanvicente/ciudadano/index.php">
    <meta property="og:type" content="website">

    <meta name="description" content="Sistema de gestión de personas de la Municipalidad de San Vicente. Accede a la administración y gestión de trámites.">
    <meta name="keywords" content="San Vicente, Municipalidad, gestión, trámites, gobierno">
    <meta name="author" content="Municipalidad de San Vicente">
    <meta name="robots" content="index, follow">

    <link rel="icon" type="image/png" sizes="16x16" href="../../../favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../favicon/favicon-32x32.png">

    <!-- Apple Touch Icon (para iOS) -->
    <link rel="apple-touch-icon" sizes="180x180" href="../../../favicon/apple-touch-icon.png">

    <!-- Android Chrome Icons -->
    <link rel="icon" type="image/png" sizes="192x192" href="../../../favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="../../../favicon/android-chrome-512x512.png">


    <!-- Twitter Card (para Twitter) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mi San Vicente">
    <meta name="twitter:description" content="Gestion de persona de la Municipalidad de San Vicente.">
    <meta name="twitter:image" content="https://webmunicipal.online/public/img/logos_sanvicente/logo_misanvicente.png">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TE38TW45ZY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-TE38TW45ZY');
    </script>
    <link rel="stylesheet" href="../../css/spinner.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style-register.css">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader" class="loader-overlay">
        <span class="loader">
        </span>
    </div>


    <!-- Modal para editar familiar -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="primer4 modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Familiar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" action="update_familiar.php">
                        <div class="mb-3">
                            <label for="nombreFamiliar" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreFamiliar" name="nombre_familiar" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidoFamiliar" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellidoFamiliar" name="apellido_familiar" required>
                        </div>
                        <div class="mb-3">
                            <label for="dniFamiliar" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dniFamiliar" name="dni_familiar" required>
                        </div>
                        <div class="mb-3">
                            <label for="fechaFamiliar" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fechaFamiliar" name="fechaDeNacimiento_familiar" required>
                        </div>
                        <div class="mb-3">
                            <label for="generoFamiliar" class="form-label">Género</label>
                            <input type="text" class="form-control" id="generoFamiliar" name="genero_familiar" required>
                        </div>
                        <div class="mb-3">
                            <label for="parentescoFamiliar" class="form-label">Parentesco</label>
                            <input type="text" class="form-control" id="parentescoFamiliar" name="parentesco_familiar" required>
                        </div>
                        <div class="mb-3">
                            <label for="conviveFamiliar" class="form-label">Convive</label>
                            <input type="text" class="form-control" id="conviveFamiliar" name="convive_familiar" required>
                        </div>
                        <button type="submit" class="button-cerrar-iniciar">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <header class="cabeza">
        <div class="nav-bar">
            <a href="index.php" class="logo"><img src="../../img/logos_sanvicente/logo_misanvicente.png" alt="Logo"></a>
            <div class="menu-container">
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
                    <li><a href="#" id="button-cerrar"><i class="uil uil-signout"></i>CERRAR SESION</a>

                </ul>
                <a href="../index.html" class="logo-principal"><img src="../../img/logos_sanvicente//logo_menu_misanvicente.png" alt="Logo"></a>
            </nav>
            <i class="uil uil-multiply nav-close-btn"></i>
        </div>
    </div>

    <div class="modal fade modal-dialog-scrollable" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="primer4 modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3 " style="color: #ffffff;" id="exampleModalToggleLabel">FAMILIAR</h1>
                </div>
                <div class="modal-body">
                    <div class="primer3">
                        <form action="../../../src/controllers/registro_de_familiar.php" method="post">
                            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

                            <div class="datos">
                                <label for="apellido">APELLIDO:</label>
                                <input type="text" id="apellido" name="apellido_familiar" placeholder="APELLIDO" required>
                            </div>

                            <div class="datos">
                                <label for="nombre">NOMBRE:</label>
                                <input type="text" id="nombre" name="nombre_familiar" placeholder="NOMBRE" required>
                            </div>

                            <div class="datos">
                                <label for="dni">DNI:</label>
                                <input type="number" id="dni" name="dni_familiar" min="0" max="99999999" placeholder="DNI" required>
                            </div>

                            <div class="datos">
                                <label for="fechaDeNacimiento">FECHA DE NACIMIENTO:</label>
                                <input type="date" id="fechaDeNacimiento" name="fechaDeNacimiento_familiar" required>
                            </div>

                            <div class="datos">
                                <label for="genero">GENERO:</label>
                                <select id="genero" name="genero_familiar" aria-placeholder="GENERO" required>
                                    <option value="MASCULINO">MASCULINO</option>
                                    <option value="FEMENINO">FEMENINO</option>
                                    <option value="NO BINARIO">NO BINARIO</option>
                                    <option value="INDEFINIDO">INDEFINIDO</option>
                                </select>
                            </div>

                            <div class="datos">
                                <label for="convivencia">Convive en mi domicilio</label>
                                <select id="convivencia" name="convivencia_familiar">
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>

                            <div class="datos">
                                <label for="parentesco">PARENTESCO:</label>
                                <select id="parentesco" name="parentesco_familiar" required>
                                    <option value="CONYUGE O PAREJA">CONYUGE O PAREJA</option>
                                    <option value="HIJO(A)/HIJASTRO(A)">HIJO(A) / HIJASTRO(A)</option>
                                    <option value="MADRE/PADRE/SUEGRO(A)">MADRE/PADRE/SUEGRO(A)</option>
                                    <option value="NUERA/YERNO">NUERA/YERNO</option>
                                    <option value="OTROS FAMILIARES">OTROS FAMILIARES</option>
                                    <option value="OTROS NO FAMILIARES">OTROS NO FAMILIARES</option>
                                </select>
                            </div>


                            <div class="datos">
                                <label for="otro_parentesco">Otro parentesco:</label>
                                <input type="text" id="otro_parentesco" placeholder="OTRO PARENTESCO" name="otro_parentesco_familiar">
                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CERRAR</button>
                    <button type="submit" id="guardarFamiliar" class="btn btn-success">GUARDAR</button>
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
            <table>DNI:</table>
            <h4><?php echo $dni; ?></h4>
            <hr>
            <table>CUIL:</table>
            <h4><?php echo $cuilTotal; ?></h4>
            <hr>
            <table>NOMBRE:</table>
            <h4><?php echo strtoupper($nombre); ?></h4>
            <hr>
            <table>APELLIDO:</table>
            <h4><?php echo strtoupper($apellido); ?></h4>
            <hr>
            <table>FECHA NAC:</table>
            <h4><?php echo $fechaDeNacimiento; ?></h4>
            <hr>
            <table>GENERO:</table>
            <h4><?php echo $genero; ?></h4>
            <br>
            <br>
            <h2>Datos de contacto</h2>
            <table>CELULAR:</table>
            <h4><?php echo $celular; ?></h4>
            <hr>
            <table>EMAIL:</table>
            <h4 class="<?php echo $claseVerificacion; ?>">
                <?php echo $email . '<br>' . $mensajeVerificacion; ?>

            </h4>


        </div>

        <div class="primer4">
            <h2>Residencia</h2>
            <hr>
            <table>PAIS:</table>
            <h4><?php echo $pais; ?></h4>
            <hr>
            <table>PROVINCIA:</table>
            <h4><?php echo $provincia; ?></h4>
            <hr>
            <table>MUNICIPIO:</table>
            <h4><?php echo $municipalidad ?></h4>
            <hr>
            <table>LOCALIDAD:</table>
            <h4><?php echo $localidad; ?></h4>
            <hr>
            <table>CALLE:</table>
            <h4><?php echo $calle; ?></h4>
            <hr>
            <table>ENTRE CALLE:</table>
            <h4><?php echo $entreCalle ?></h4>
            <hr>
            <table>ALTURA:</table>
            <h4><?php echo $altura ?></h4>
        </div>

        <div class="primer4">
            <h2>Archivos del Perfil</h2>
            <hr>
            <table>
                <h4>FRENTE DEL DNI</h4><br>
                Envíenos una fotografía en formato horizontal del frente de su DNI:
            </table>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Subir</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
            <table>
                <h4>DORSO DEL DNI</h4><br>
                Envíenos una fotografía en formato horizontal del dorso de su DNI:
            </table>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Subir</label>
                <input type="file" class="form-control" id="inputGroupFile01">
            </div>
        </div>

        <div class="primer4">
            <h2>Mis familiares vinculados</h2>
            <hr>
            <br>
            <div class="button_familiar">
                <button type="button" id="myModal" class="button-edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    AGREGAR FAMILIAR
                </button>
            </div>

            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Genero</th>
                            <th>Parentesco</th>
                            <th>Convive</th>
                            <th>Editar datos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['familiares']) && count($_SESSION['familiares']) > 0) {
                            foreach ($_SESSION['familiares'] as $index => $familiar) {

                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($familiar['nombre_familiar'] ?? '') . "</td>";
                                echo "<td>" . htmlspecialchars($familiar['apellido_familiar'] ?? '') . "</td>";
                                echo "<td>" . htmlspecialchars($familiar['dni_familiar'] ?? '') . "</td>";

                                // Convertir la fecha de YY/mm/dd a un formato válido
                                if (!empty($fechaDeNacimiento_familiar)) {
                                    // Convertir la fecha del formato Y-m-d a un objeto DateTime
                                    $dateFamiliar = DateTime::createFromFormat('d-m-Y', $fechaDeNacimiento_familiar);

                                    // Validar y formatear las fechas

                                    if ($dateFamiliar !== false) {
                                        $fechaDeNacimiento_familiar = $dateFamiliar->format('d/m/Y');
                                    } else {
                                        $fechaDeNacimiento_familiar = 'Fecha no válida';
                                    }
                                } else {
                                    if (empty($fechaDeNacimiento_familiar)) {
                                        $fechaDeNacimiento_familiar = 'Fecha de nacimiento del familiar no definida';
                                    }
                                }
                                $fechaFormateada = !empty($fechaDeNacimiento_familiar) ? date('d/m/Y', strtotime(str_replace('/', '-', '20' . $fechaDeNacimiento_familiar))) : 'No especificada';

                                echo "<td>" . htmlspecialchars($fechaFormateada) . "</td>";
                                echo "<td>" . htmlspecialchars($familiar['genero_familiar'] ?? '') . "</td>";
                                echo "<td>" . htmlspecialchars($familiar['parentesco_familiar'] ?? '') . "</td>";
                                echo "<td>" . htmlspecialchars($familiar['convive_familiar'] ?? '') . "</td>";
                                echo "<td><button class='button-edit' data-bs-toggle='modal' data-bs-target='#editModal' 
                                data-index='$index'
                                data-nombre='" . htmlspecialchars($familiar['nombre_familiar']) . "'
                                data-apellido='" . htmlspecialchars($familiar['apellido_familiar']) . "'
                                data-dni='" . htmlspecialchars($familiar['dni_familiar']) . "'
                                data-fecha='" . htmlspecialchars($fechaFormateada) . "'
                                data-genero='" . htmlspecialchars($familiar['genero_familiar']) . "'
                                data-parentesco='" . htmlspecialchars($familiar['parentesco_familiar']) . "'
                                data-convive='" . htmlspecialchars($familiar['convive_familiar']) . "'>
                                <i class='uil uil-pen editar_familiar'></i>
                              </button></td>";
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
            // Escuchar el evento de apertura del modal y cargar los datos
            var editModal = document.getElementById('editModal');
            editModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Botón que abrió el modal
                var index = button.getAttribute('data-index');

                // Cargar los datos en los campos del formulario
                document.getElementById('nombreFamiliar').value = button.getAttribute('data-nombre');
                document.getElementById('apellidoFamiliar').value = button.getAttribute('data-apellido');
                document.getElementById('dniFamiliar').value = button.getAttribute('data-dni');
                document.getElementById('fechaFamiliar').value = button.getAttribute('data-fecha');
                document.getElementById('generoFamiliar').value = button.getAttribute('data-genero');
                document.getElementById('parentescoFamiliar').value = button.getAttribute('data-parentesco');
                document.getElementById('conviveFamiliar').value = button.getAttribute('data-convive');
            });
        </script>

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