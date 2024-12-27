<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style-register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Ingreso administrativo - Mi San Vicente</title>
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