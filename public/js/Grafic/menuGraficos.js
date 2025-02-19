// Botones para cada gráfico
const cantidadPorProvinciaButton = document.getElementById("cantidadPorProvinciaButton");
const mayoresProvinciaButton = document.getElementById("mayoresProvinciaButton");
const cantidadMujeresButton = document.getElementById("cantidadMujeresButton");
const registroCuidadanosButton = document.getElementById("registroCuidadanosButton"); // Corrección del ID

// Contenedores de los gráficos
const cantProvincia = document.getElementById("cantProvincia");
const mayoresProvincia = document.getElementById("mayoresProvincia");
const cantidadMujeres = document.getElementById("cantidadMujeres");
const registroCuidadanos = document.getElementById("registroCuidadanos"); // Agregado para el gráfico de ciudadanos

// Agrupar los gráficos en un array
const chartContainers = [cantProvincia, mayoresProvincia, cantidadMujeres, registroCuidadanos];

// Función genérica para expandir un gráfico y colapsar los demás
function toggleChart(button, chartToExpand) {
  let expanded = false; // Estado local para cada botón

  button.addEventListener("click", () => {
    if (!expanded) {
      // Expandir el gráfico seleccionado
      chartContainers.forEach(chart => {
        if (chart === chartToExpand) {
          chart.classList.remove("col-sm-6");
          chart.classList.add("col-sm-12");
          chart.style.transition = "all 0.7s ease";
          chart.style.opacity = "1"; // Mostrar el gráfico con transición
          chart.style.display = "block";
        } else {
          // Ocultar los demás gráficos
          chart.style.opacity = "0"; // Suavizar ocultar
          setTimeout(() => {
            chart.style.display = "none";
          }, 500); // Tiempo acorde a la transición
        }
      });
    } else {
      // Restaurar el diseño original
      chartContainers.forEach(chart => {
        chart.classList.remove("col-sm-12");
        chart.classList.add("col-sm-6");
        chart.style.display = "block";
        setTimeout(() => {
          chart.style.opacity = "1";
        }, 100);
      });
    }
    expanded = !expanded; // Cambiar el estado
  });
}

// Asignar la función a cada botón
toggleChart(cantidadPorProvinciaButton, cantProvincia);
toggleChart(mayoresProvinciaButton, mayoresProvincia);
toggleChart(cantidadMujeresButton, cantidadMujeres);
toggleChart(registroCuidadanosButton, registroCuidadanos); // Corregido

