<?php

include '../../../src/controllers/conexion.php';
include '../../../src/controllers/registro_usuarios_be.php';


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style-register.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registro - Mi San Vicente</title>

    <style>
        .hidden {
            display: none;
        }
    </style>



</head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA4XJamwnbKkWDMapKAdDeTFmWk9WtI4w&libraries=places"></script>


<body>
    <header class="cabeza">
        <div class="nav-bar">
            <a href="../../misanvicente/index.html" class="logo"><img src="../../img/logos_sanvicente/logo_misanvicente.png" alt="Logo"></a>
            <div class="menu-container">
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
                <a href="../index.html" class="logo-principal"><img src="../../img/logos_sanvicente/logo_menu_misanvicente.png" alt="Logo"></a>
            </nav>
            <i class="uil uil-multiply nav-close-btn"></i>
        </div>
    </div>
    <!--Contenedor general-->
    <div class="primer">
        <h2>CREAR CUENTA</h2>
        <hr>
        <div class="primer">
            <h3>Datos Personales</h3>
            <hr>
            <form action="../../../src/controllers/registro_usuarios_be.php" method="post">
                <div class="datos">
                    <label for="dni1">DNI:</label>
                    <input type="number" id="dni1" name="dni" min="0" max="99999999" title="DNI de la persona que se registra 'SIN PUNTOS'" required>
                </div>
                <div class="datos">
                    <label for="cuil2">CUIL:</label>
                    <input type="number" class="input-small" maxlength="2" id="input1" name="cuil1" title="Por ejemplo: 20 para mujeres y 27 para hombres" required>
                    <input type="number" class="input-normal" id="dni2" name="cuil2" title="Se rellena con tu DNI" required>
                    <input type="number" class="input-small" maxlength="2" id="input3" name="cuil3" title="Aca va el codigo verificador" required>
                </div>

                <div class="datos">
                    <label for="contrasena">CLAVE:</label>
                    <input type="password" id="contrasena" name="contrasena" class="form-control" title="Crea una clave de acceso" placeholder="INGRESE SU CLAVE" required>
                </div>
                <p>Longitud de 8 caracteres : 2 letras en mayúsculas / 1 Carácter especial (!@#$&*) / 2 números (0-9) / 3 letras en minúsculas.</p>

                <!-- Barra de progreso para la fortaleza de la contraseña -->
                <div class="progress mt-3">
                    <div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                </div>

                <div class="datos">
                    <label for="apellido">APELLIDO:</label>
                    <input type="text" id="apellido" name="apellido" title="Apellido de la persona que se registra" required>
                </div>

                <div class="datos">
                    <label for="nombre">NOMBRE:</label>
                    <input type="text" id="nombre" name="nombre" title="Nombre de la persona que se registra" required>
                </div>

                <div class="datos">
                    <label for="fechaDeNacimiento">FECHA DE NACIMIENTO:</label>
                    <input type="date" id="fechaDeNacimiento" title="Fecha de nacimiento de la persona que se registra" name="fechaDeNacimiento" required>
                </div>

                <div class="datos">
                    <label for="genero">GENERO:</label>
                    <select id="genero" name="genero" title="Seleccione un opcion con la que se indentifique" required>
                        <option value="MASCULINO" selected>MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                        <option value="NO BINARIO">NO BINARIO</option>
                        <option value="INDEFINIDO">INDEFINIDO</option>
                    </select>
                </div>

                <div class="datos">
                    <label for="email">E-MAIL:</label>
                    <input type="email" id="email" name="email" title="Ingrese su mail" required>
                </div>


                <div class="datos">
                    <label for="repitEmail">REPETIR E-MAIL:</label>
                    <input type="email" id="repitEmail" name="repEmail" title="Vuelva a ingresar su mail" required>
                </div>

                <div class="datos">
                    <label for="celular">CELULAR:</label>
                    <input type="number" name="celular" title="Vuelva a ingresar su celular" required>
                </div>
        </div>

        <div class="primer">
            <h3>Residencia</h3>
            <hr>

            <div class="datos">
                <div class="pais">
                    <label for="pais">PAIS:</label>
                    <input type="text" id="pais" name="pais" value="ARGENTINA" title="Coloque su pais de residencia">
                </div>
                <p>OTRO PAIS <input type="checkbox" id="otroPaisCheckbox" title="Marque la casilla si no vive en ARGENTINA"></p>
                <div class="datos" id="otropais">
                    <input type="text" id="otropais" name="otropais" placeholder="PAIS DE RESIDENCIA" title="Coloque su pais de residencia">
                </div>
            </div>

            <div class="datos" id="provinciaDiv">
                <label for="prov_id">PROVINCIA:</label>
                <select name="provincia" id="prov_id" required title="Elija la provincia en la que vive">
                    <option selected="selected" value="1">Buenos Aires</option>
                    <option value="2">CABA</option>
                    <option value="3">Catamarca</option>
                    <option value="4">Chaco</option>
                    <option value="5">Chubut</option>
                    <option value="6">Córdoba</option>
                    <option value="7">Corrientes</option>
                    <option value="8">Entre Ríos</option>
                    <option value="9">Formosa</option>
                    <option value="10">Jujuy</option>
                    <option value="11">La Pampa</option>
                    <option value="12">La Rioja</option>
                    <option value="13">Mendoza</option>
                    <option value="14">Misiones</option>
                    <option value="15">Neuquén</option>
                    <option value="16">Río Negro</option>
                    <option value="17">Salta</option>
                    <option value="18">San Juan</option>
                    <option value="19">San Luis</option>
                    <option value="20">Santa Cruz</option>
                    <option value="21">Santa Fe</option>
                    <option value="22">Santiago Del Estero</option>
                    <option value="23">Tierra Del Fuego</option>
                    <option value="24">Tucumán</option>
                </select>
            </div>

            <div class="datos" id="municipalidadDiv">
                <label for="mun_id">MUNICIPALIDAD:</label>
                <select name="municipalidad" id="mun_id" onchange="showHideInputs()" title="Elija la municipalidad en la que vive">
                    <option value="104">ADOLFO ALSINA</option>
                    <option value="59">ALBERTI</option>
                    <option value="40">ALMIRANTE BROWN</option>
                    <option value="25">ARRECIFES</option>
                    <option value="41">AVELLANEDA</option>
                    <option value="78">AYACUCHO</option>
                    <option value="126">AZUL</option>
                    <option value="105">BAHIA BLANCA</option>
                    <option value="79">BALCARCE</option>
                    <option value="26">BARADERO</option>
                    <option value="42">BERAZATEGUI</option>
                    <option value="43">BERISSO</option>
                    <option value="127">BOLIVAR</option>
                    <option value="60">BRAGADO</option>
                    <option value="44">BRANDSEN</option>
                    <option value="45">CAÑUELAS</option>
                    <option value="1">CAMPANA</option>
                    <option value="27">CAPITAN SARMIENTO</option>
                    <option value="61">CARLOS CASARES</option>
                    <option value="62">CARLOS TEJEDOR</option>
                    <option value="28">CARMEN DE ARECO</option>
                    <option value="80">CASTELLI</option>
                    <option value="63">CHACABUCO</option>
                    <option value="81">CHASCOMUS</option>
                    <option value="64">CHIVILCOY</option>
                    <option value="29">COLON</option>
                    <option value="106">CORONEL DE MARINA L. ROSALES</option>
                    <option value="107">CORONEL DORREGO</option>
                    <option value="108">CORONEL PRINGLES</option>
                    <option value="109">CORONEL SUAREZ</option>
                    <option value="110">DAIREAUX</option>
                    <option value="82">DOLORES</option>
                    <option value="46">ENSENADA</option>
                    <option value="2">ESCOBAR</option>
                    <option value="47">ESTEBAN ECHEVERRIA</option>
                    <option value="30">EXALTACION DE LA CRUZ</option>
                    <option value="48">EZEIZA</option>
                    <option value="49">FLORENCIO VARELA</option>
                    <option value="65">FLORENTINO AMEGHINO</option>
                    <option value="83">GENERAL ALVARADO</option>
                    <option value="128">GENERAL ALVEAR</option>
                    <option value="66">GENERAL ARENALES</option>
                    <option value="84">GENERAL BELGRANO</option>
                    <option value="85">GENERAL GUIDO</option>
                    <option value="111">GENERAL LA MADRID</option>
                    <option value="3">GENERAL LAS HERAS</option>
                    <option value="86">GENERAL LAVALLE</option>
                    <option value="87">GENERAL MADARIAGA</option>
                    <option value="88">GENERAL PAZ</option>
                    <option value="67">GENERAL PINTO</option>
                    <option value="89">GENERAL PUEYRREDON</option>
                    <option value="4">GENERAL RODRIGUEZ</option>
                    <option value="5">GENERAL SAN MARTIN</option>
                    <option value="68">GENERAL VIAMONTE</option>
                    <option value="69">GENERAL VILLEGAS</option>
                    <option value="112">GONZALES CHAVES</option>
                    <option value="113">GUAMINI</option>
                    <option value="70">HIPOLITO YRIGOYEN</option>
                    <option value="6">HURLINGHAM</option>
                    <option value="7">ITUZAINGO</option>
                    <option value="8">JOSE C. PAZ</option>
                    <option value="114">JUAREZ</option>
                    <option value="71">JUNIN</option>
                    <option value="50">LA MATANZA</option>
                    <option value="134">LA PLATA</option>
                    <option value="51">LANUS</option>
                    <option value="115">LAPRIDA</option>
                    <option value="90">LAS FLORES</option>
                    <option value="72">LEANDRO N. ALEM</option>
                    <option value="73">LINCOLN</option>
                    <option value="91">LOBERIA</option>
                    <option value="52">LOBOS</option>
                    <option value="53">LOMAS DE ZAMORA</option>
                    <option value="9">LUJAN</option>
                    <option value="54">MAGDALENA</option>
                    <option value="92">MAIPU</option>
                    <option value="10">MALVINAS ARGENTINAS</option>
                    <option value="93">MAR CHIQUITA</option>
                    <option value="11">MARCOS PAZ</option>
                    <option value="12">MERCEDES</option>
                    <option value="13">MERLO</option>
                    <option value="94">MONTE</option>
                    <option value="14">MORENO</option>
                    <option value="15">MORON</option>
                    <option value="16">NAVARRO</option>
                    <option value="95">NECOCHEA</option>
                    <option value="74">NUEVE DE JULIO</option>
                    <option value="129">OLAVARRIA</option>
                    <option value="96">PARTIDO DE LA COSTA</option>
                    <option value="116">PARTIDO DE MONTE HERMOSO</option>
                    <option value="97">PARTIDO DE VILLA GESELL</option>
                    <option value="117">PATAGONES</option>
                    <option value="75">PEHUAJO</option>
                    <option value="118">PELLEGRINI</option>
                    <option value="31">PERGAMINO</option>
                    <option value="98">PILA</option>
                    <option value="17">PILAR</option>
                    <option value="99">PINAMAR</option>
                    <option value="55">PRESIDENTE PERON</option>
                    <option value="119">PUAN</option>
                    <option value="56">PUNTA INDIO</option>
                    <option value="57">QUILMES</option>
                    <option value="32">RAMALLO</option>
                    <option value="100">RAUCH</option>
                    <option value="76">RIVADAVIA</option>
                    <option value="33">ROJAS</option>
                    <option value="130">ROQUE PEREZ</option>
                    <option value="120">SAAVEDRA</option>
                    <option value="131">SALADILLO</option>
                    <option value="121">SALLIQUELO</option>
                    <option value="34">SALTO</option>
                    <option value="35">SAN ANDRES DE GILES</option>
                    <option value="36">SAN ANTONIO DE ARECO</option>
                    <option value="101">SAN CAYETANO</option>
                    <option value="18">SAN FERNANDO</option>
                    <option value="19">SAN ISIDRO</option>
                    <option value="20">SAN MIGUEL</option>
                    <option value="37">SAN NICOLAS</option>
                    <option value="38">SAN PEDRO</option>
                    <option id="selected" value="58">SAN VICENTE</option>
                    <option value="21">SUIPACHA</option>
                    <option value="102">TANDIL</option>
                    <option value="132">TAPALQUE</option>
                    <option value="22">TIGRE</option>
                    <option value="103">TORDILLO</option>
                    <option value="122">TORNQUIST</option>
                    <option value="77">TRENQUE LAUQUEN</option>
                    <option value="123">TRES ARROYOS</option>
                    <option value="23">TRES DE FEBRERO</option>
                    <option value="124">TRES LOMAS</option>
                    <option value="133">VEINTICINCO DE MAYO</option>
                    <option value="24">VICENTE LOPEZ</option>
                    <option value="125">VILLARINO</option>
                    <option value="39">ZARATE</option>
                </select>
            </div>

            <div class="datos" id="localidadDiv">
                <label for="loc_id">LOCALIDAD:</label>
                <select name="localidad" id="loc_id" title="Elija la muncipalidad en la que vive">
                    <option value="1">ALEJANDRO KORN</option>
                    <option value="3">DOMSELAAR</option>
                    <option value="2">SAN VICENTE</option>
                </select>
            </div>

            <div class="datos">
                <div class="direccion">
                    <label for="calle">CALLE:</label>
                    <input type="text" id="calle" name="calle" title="Ingrese la calle en la que vive" required>
                    <br>
                    <label for="entreCalle">ENTRE CALLE:</label>
                    <input type="text" id="entreCalle" name="entreCalle" title="Ingrese una de las calles en la que vive" required>
                    <br>
                    <label for="altura">ALTURA:</label>
                    <input type="text" id="altura" name="altura" title="Ingrese la altura de la calle en la que vive" required>
                    <br>
                    <button id="searchButton" type="button">Buscar</button>
                </div>
            </div>
            <div id="map"></div>

            <div class="datos">
                <div class="piso">
                    <label for="piso">PISO:</label>
                    <input type="text" id="piso" name="piso" title="Ingrese el piso en el que vive en el caso que sea necesario">
                    <br>
                    <br>
                    <label for="depto">DEPTO:</label>
                    <input type="text" id="depto" name="depto" title="Ingrese el departamento en el que vive en el caso que sea necesario">
                </div>


            </div>

            <div class="datos">
                <div class="observacion" id="observacion">
                    <label for="per_observacion">OBSERVACION PARA ENCONTRAR MEJOR SU UBICACION:</label>
                    <br>
                    <textarea name="per_observacion" id="observacion" rows="2" cols="30" title="Haga una descripcion de su persona si es necesario"></textarea>
                </div>
            </div>

            <div class="datos">
                <div class="registrar">
                    <input style="justify-content: right; margin: 20px; padding:20px; border-radius: 15px; width: auto ;color:aliceblue; background-color:#10aecd ; box-shadow: 0px 0px 1px 1px #2386b1" type="submit" value="Registrar" name="submit">
                </div>
            </div>

            </form>

        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const progressInput = document.getElementById('contrasena');
                const progressBar = document.getElementById('progressBar');

                const moderate = /(?=.*[A-Z])(?=.*[a-z]).{5,}|(?=.*[\d])(?=.*[a-z]).{5,}|(?=.*[\d])(?=.*[A-Z])(?=.*[a-z]).{5,}/;
                const strong = /(?=.*[A-Z])(?=.*[a-z])(?=.*[\d]).{7,}|(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;"'<>,./?])(?=.*[a-z])(?=.*[\d]).{7,}/;
                const extraStrong = /(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;"'<>,./?]).{9,}/;

                progressInput.addEventListener('input', function() {
                    const threshold = 10; // Número de caracteres que llenan la barra al 100%
                    const inputLength = progressInput.value.length;

                    // Calcula el progreso basado en la longitud del texto
                    let progress = 0;
                    if (inputLength >= threshold) {
                        progress = 100;
                    } else {
                        progress = (inputLength / threshold) * 100;
                    }

                    // Actualiza el ancho y el atributo aria-valuenow de la barra de progreso
                    progressBar.style.width = progress + '%';
                    progressBar.setAttribute('aria-valuenow', progress);

                    // Elimina las clases actuales
                    progressBar.classList.remove("bg-success", "bg-warning", "bg-danger");

                    // Determina la fortaleza de la contraseña y cambia la clase en consecuencia
                    const value = progressInput.value;
                    if (extraStrong.test(value)) {
                        progressBar.classList.add("bg-success"); // Verde para contraseñas muy fuertes
                        progressBar.textContent = "Segura"; // Texto: Segura
                    } else if (strong.test(value)) {
                        progressBar.classList.add("bg-warning"); // Amarillo para contraseñas fuertes
                        progressBar.textContent = "Moderada"; // Texto: Moderada
                    } else if (moderate.test(value)) {
                        progressBar.classList.add("bg-danger"); // Rojo para contraseñas moderadas
                        progressBar.textContent = "Débil"; // Texto: Débil
                    } else {
                        progressBar.classList.add("bg-danger"); // Rojo para contraseñas débiles o vacías
                        progressBar.textContent = "Débil"; // Texto: Débil
                    }
                });
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="../../js/user_register_front.js"></script>

</body>

</html>