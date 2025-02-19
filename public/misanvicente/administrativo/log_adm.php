<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso administrativo - Mi San Vicente</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>

<body>
    <form method="post" action="../../../src/controllers/controller_log_adm.php">
        <div class="contenerdor_ingreso">
            <div class="primer2">
                <img alt="logoMiSanVicente" class="logoMiSanVicente" src="../../img/logos_sanvicente/logo_misanvicente_adm.png">
                <?php
                include '../../../src/controllers/conexion.php';
                include '../../../src/controllers/controller.php';
                ?>
                <div class="datos2">
                    <label for="cuil">DNI:</label>
                    <input type="number" class="input-password" id="dni_adm" name="dni_adm">
                </div>

                <div class="datos2">
                    <label for="contrasena">CONTRASEÑA</label>
                    <input type="password" autocomplete="new-password" id="contrasena_adm" class="input-password" name="contrasena_adm">
                </div>
                <br>
                <div class="datos2">
                    <input class="button-ingreso-color" type="submit" value="Ingresar" name="btnIngresar">
                </div>
            </div>
    </form>
</body>

</html>