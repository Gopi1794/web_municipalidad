<?php
session_start(); // Iniciar la sesión

// Verificar si las claves 'nombre' y 'apellido' están definidas en la sesión
$nombre = isset($_SESSION['nombre_adm']) ? $_SESSION['nombre_adm'] : 'Incie'; // Si no existe, valor vacío
$apellido = isset($_SESSION['apellido_adm']) ? $_SESSION['apellido_adm'] : 'Sesion , Por favor'; // Si no existe, valor vacío

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header class="cabeza">
        <div class="nav-bar">
            <a href="index.php" class="logo"><img src="../../img/logos_sanvicente/logo_misanvicente_adm.png" alt="Logo"></a>
            <div class="menu-container">
            <button class="button-cerrar-iniciar" id="button-cerrar" type="button" name="btnCerrar">CERRAR SESION</button>
            
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
            <div class="tramite-login">
                <?php
    
                    if (isset($_SESSION['nombre_usuario']) && isset($_SESSION['apellido_usuario'])) {
                    echo '<h2>Bienvenido, ' . htmlspecialchars($_SESSION['nombre_usuario']) . ' ' . htmlspecialchars($_SESSION['apellido_usuario']) . '!</h2>';
                    } else {
                    echo '<p>No se ha iniciado sesión.</p>';
                    }
                    ?>
      <!-- Columna izquied-flex rda grande -->
      <div class="containerd-flex -fluid col-md-12">
        <div class="border d-flex p-2  h-75 v-100">
          <button class="button-cerrar-iniciar col-md-2">Cantidad por Provincia</button>
          <button class="button-cerrar-iniciar col-md-2">Crear Usuario</button>
          <button class="button-cerrar-iniciar col-md-2">Crear Usuario</button>
          <button class="button-cerrar-iniciar col-md-2">Crear Usuario</button>
          <button class="button-cerrar-iniciar col-md-2">Crear Usuario</button>
          <button class="button-cerrar-iniciar col-md-2">Crear Usuario</button>
        </div>
      </div>
                </div>
                    
            
        <div class="primer container-fluid mt-3">
    <h2>Información de los Usuarios</h2>
    <hr>
    

      <!-- Columna derecha con gráficos -->
      <div class="col-md-12">
        <div class="row">
          <!-- Gráfico arriba izquierda -->
          <div id="cantProvincia" class="col-12 col-sm-6">
            <div class="primer5 border p-4 mb-2">
              <h2>Cantidad por Provincia</h2>
              <hr>
              <canvas id="myChart" class="grafico1"></canvas>
            </div>
          </div>

          <!-- Gráfico arriba derecha -->
          <div class="col-12 col-sm-6">
            <div class="primer5 border p-4 mb-2">
              <h2>Cantidad por Región</h2>
              <hr>
              <canvas id="myChart2" class="grafico1"></canvas>
            </div>
          </div>

          <!-- Gráfico abajo izquierda -->
          <div class="col-12 col-sm-6">
            <div class="primer5 border p-4 mb-2">
              <h2>Distribución General</h2>
              <hr>
              <canvas id="chart3" class="grafico1"></canvas>
            </div>
          </div>

          <!-- Gráfico abajo derecha -->
          <div class="col-12 col-sm-6">
            <div class="primer5 border p-4 mb-2">
              <h2>Proporción</h2>
              <hr>
              <canvas id="chart4" class="grafico1"></canvas>
            </div>
          </div>
        </div>
        </div>
      </div>
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
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
            <script defer src="../../js/Grafic/grafic1.js" ></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../../../vendor/SweetAlert.js"></script>
            <script src="../../js/accionIniciarCrear.js"></script>
            
        
</body>
</html>