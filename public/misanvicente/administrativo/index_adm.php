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
  <link rel="stylesheet" href="../../css/style-register.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
  <header class="cabeza">
    <div class="nav-bar">

      <div class="button">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
          <i class="uil uil-align-right-justify"></i>
        </button>
      </div>

      <div class="menu-container">
        <div class="btn-menu">
          <a href="index.php" class="logo"><img src="../../img/logos_sanvicente/logo_misanvicente_adm.png" alt="Logo"></a>
        </div>
      </div>
    </div>
  </header>


  <div id="mainContent" class="flex-grow-1">
    <!-- Contenido principal -->
    <div class="flex-grow-1 pl-2 pr-2">
      <div class="container-menu container-fluid">
        <div class="col-md-12">
          <div class="row">
            <!-- Gráfico arriba izquierda -->
            <div id="cantProvincia" class="col-12 col-sm-6">
              <div class="primer5 border p-2 mb-2">
                <h4>Cantidad por Provincia</h4>
                <hr>
                <canvas id="myChart" class="grafico1"></canvas>
              </div>
            </div>

            <!-- Gráfico arriba derecha -->
            <div id="mayoresProvincia" class="col-12 col-sm-6">
              <div class="primer5 border p-2 mb-2">
                <h4>Cantidad de mayores de 18 por provincia</h4>
                <hr>
                <canvas id="myChart2" class="grafico1"></canvas>
              </div>
            </div>

            <!-- Gráfico abajo izquierda -->
            <div id="cantidadMujeres" class="col-12 col-sm-6">
              <div class="primer5 border p-2 mb-2">
                <h4>Cantidad de Mujeres</h4>
                <hr>
                <canvas id="myChart3" class="grafico1"></canvas>
              </div>
            </div>

            <!-- Gráfico abajo derecha -->
            <div id="registroCuidadanos" class="col-12 col-sm-6">
              <div class="primer5 border p-2 mb-2">
                <h4>Registro de personas</h4>
                <hr>
                <div class="table-responsive">
                  <input type="text" id="search" class="form-control mb-3" placeholder="Buscar por DNI, Nombre o Apellido...">
                  <table class="table table-striped table-bordered border-primary  table-hover table-primary">
                    <thead>
                      <th>ID</th>
                      <th>DNI</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>CUIL</th>
                      <th>Contraseña</th>
                      <th>Fecha de Nacimiento</th>
                      <th>Genero</th>
                      <th>Celular</th>
                      <th>Pais</th>
                      <th>Provincia</th>
                      <th>Muncipalidad</th>
                      <th>Localidad</th>
                      <th>Calle</th>
                      <th>Entre calle</th>
                      <th>Altura</th>
                      <th>Piso</th>
                      <th>Departamento</th>
                      <th>Observacion</th>
                      </tr>
                    </thead>
                    <tbody id="resultados">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
      <div class="offcanvas-header d-flex justify-content-between align-items-center">
        <!-- Contenedor del texto -->
        <div id="sidebarLabel">
          <?php
          if (isset($_SESSION['nombre_adm']) && isset($_SESSION['apellido_adm'])) {
            echo 'Bienvenido, ' . htmlspecialchars($_SESSION['nombre_adm']) . ' ' . htmlspecialchars($_SESSION['apellido_adm']) . '!';
          } else {
            echo 'No se ha iniciado sesión.';
          }
          ?>
        </div>
        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close">
          <i class="uil uil-multiply nav-close-btn"></i>
        </button>

      </div>

      <div class="offcanvas-body d-flex flex-column justify-content-between align-items-center">
        <div class="nav flex-column">
          <li class="nav-item">
            <button id="cantidadPorProvinciaButton" class="button-cerrar-iniciar col-md-12">Cantidad por Provincia</button>
          </li>
          <li class="nav-item">
            <button id="mayoresProvinciaButton" class="button-cerrar-iniciar col-md-12">Mayores de 18 por provincia</button>
          </li>
          <li class="nav-item">
            <button id="cantidadMujeresButton" class="button-cerrar-iniciar col-md-12">Cantidad de mujeres mayores</button>
          </li>
          <li class="nav-item">
            <button id="registroCuidadanosButton" class="button-cerrar-iniciar col-md-12">Ciudadanos Registrados</button>
          </li>
          <li>
            <button class="button-cerrar-iniciar col-md-12" id="button-cerrar" type="button" name="btnCerrar">CERRAR SESIÓN</button>
          </li>
        </div>
        <a href="../../../index.html">
          <img src="../../img/logos_sanvicente/logo_footer.png" alt="Logo" class="w-25 mt-3">
        </a>
      </div>



      <script defer>
        document.addEventListener("DOMContentLoaded", function() {
          const sidebar = document.getElementById("sidebar");
          const mainContent = document.getElementById("mainContent");
          const toggleButton = document.querySelector(".btn[data-bs-toggle='offcanvas']");
          const closeButton = sidebar.querySelector(".nav-close-btn");
          const canvaBody = document.querySelector(".offcanvas-body");

          // Abrir el sidebar
          toggleButton.addEventListener("click", function() {
            sidebar.classList.add("show");
            mainContent.classList.add("with-sidebar");
          });

          // Cerrar el sidebar
          [closeButton, mainContent, canvaBody].forEach((element) => {
            element.addEventListener("click", function() {
              sidebar.classList.remove("show");

              // Forzar la eliminación de la clase y restablecer el margen
              setTimeout(function() {
                mainContent.classList.remove("with-sidebar");
              }, 100); // Espera a que se termine la transición antes de remover la clase
            });
          });
        });
      </script>

      <script>
        window.addEventListener("scroll", function() {
          const header = document.querySelector("header");
          header.classList.toggle("sticky", window.scrollY > 0);
        });
      </script>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
          const jsonUrl = "ruta/archivo.json"; // Cambia por la ruta de tu JSON
          const searchInput = document.getElementById("search");
          const resultados = document.getElementById("resultados");

          let ciudadanos = []; // Variable para almacenar los datos

          // Cargar JSON
          fetch(jsonUrl)
            .then(response => response.json())
            .then(data => {
              ciudadanos = data; // Guardar los datos en la variable
              mostrarDatos(ciudadanos); // Mostrar todos los datos inicialmente
            })
            .catch(error => console.error("Error al cargar el JSON:", error));

          // Función para mostrar los datos en la tabla
          function mostrarDatos(datos) {
            resultados.innerHTML = ""; // Limpiar la tabla
            datos.forEach(persona => {
              const fila = `
            <tr>
              <td>${persona.id}</td>
              <td>${persona.dni}</td>
              <td>${persona.nombre}</td>
              <td>${persona.apellido}</td>
              <td>${persona.email}</td>
              <td>${persona.cuil}</td>
            </tr>
          `;
              resultados.innerHTML += fila;
            });
          }

          // Filtrar los resultados según la búsqueda
          searchInput.addEventListener("input", function() {
            const searchTerm = searchInput.value.toLowerCase();
            const resultadosFiltrados = ciudadanos.filter(persona =>
              persona.dni.toString().includes(searchTerm) || // Buscar por DNI
              persona.nombre.toLowerCase().includes(searchTerm) || // Buscar por Nombre
              persona.apellido.toLowerCase().includes(searchTerm) // Buscar por Apellido
            );
            mostrarDatos(resultadosFiltrados);
          });
        });
      </script>

      <script src="../../js/loader.js"></script>
      <script src="../../js/administracion/datosUser.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
      <script defer src="../../js/Grafic/grafic1.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="../../../vendor/SweetAlert.js"></script>
      <script src="../../js/accionIniciarCrear.js"></script>
      <script src="../../js/Grafic/menuGraficos.js"></script>


</body>

</html>