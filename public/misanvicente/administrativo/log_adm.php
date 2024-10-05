<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Ingreso - Mi San Vicente</title>
</head>
<body>
<form method="post" action="">
    <div class="contenerdor_ingreso">
    <div class="primer2">
        <img alt="logoMiSanVicente" class="logoMiSanVicente" src="../img/logoMiSanVicente_adm.png">
        <?php
        include("conexion.php");
        include("controller_adm.php");
        ?>
        <div class="datos2">
            <label for="cuil">DNI:</label>
            <input type="number" class="input-password" name="dni_adm">
        </div>

        <div class="datos2">
            <label for="contrasena">CONTRASEÑA</label>
            <input type="password" class="input-password" name="contrasena_adm">
        </div>
        <br>
        <div class="datos2">
            <input class="button-ingreso-color" type="submit" value="Ingresar" name="btnIngresar">
            
    </div>

</div>
</form>
</body>
</html>