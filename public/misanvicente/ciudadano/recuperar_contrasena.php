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
    <link rel="stylesheet" href="../../css/style-register.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
    <header class="cabeza">
        <div class="nav-bar">
            <a href="index.php" class="logo"><img src="../../img/logos_sanvicente/logo_misanvicente.png" alt="Logo"></a>
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
                <a href="../../../index.html" class="logo-principal"><img src="../../img/logos_sanvicente/logo_menu_misanvicente.png" alt="Logo"></a>
            </nav>
            <i class="uil uil-multiply nav-close-btn"></i>
        </div>
    </div>
    <div class="primer">
        <div class="tramite-login">
            <div class="tramite">
                <input class="search" id="buscar" name="query" placeholder="Buscar Tramite">
                <input class="button-buscar" id="button-buscar" type="submit" value="Buscar">
            </div>
        </div>
    </div>
    <div class="primer">
        <h2>Recuperacion de contraseña</h2>
        <hr>
        <form action="../../../src/controllers/recuperacion.php" method="POST">

            <div class="datos" style="justify-content: center;">
                <label for="cuil2">CUIL:</label>
                <input type="number" class="input-small" maxlength="2" id="input1" name="cuil1" title="Por ejemplo: 20 para mujeres y 27 para hombres" required>
                <input type="number" class="input-normal" id="dni2" name="cuil2" title="Se rellena con tu DNI" required>
                <input type="number" class="input-small" maxlength="2" id="input3" name="cuil3" title="Aca va el codigo verificador" required>
            </div>
            <div class="datos" style="justify-content: center;">
                <label for="email">E-MAIL:</label>
                <input type="email" id="email" name="email" title="Ingrese su mail" required>

            </div>
            <button class="modal-button" style="width: -webkit-fill-available;" onclick="window.location.href='revalidacion_email.php';">Recuperar Contraseña</button>
        </form>

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
    <script src="../../js/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../../vendor/SweetAlert.js"></script>


</body>

</html>