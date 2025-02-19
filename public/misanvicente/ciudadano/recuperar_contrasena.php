<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi San Vicente</title>
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