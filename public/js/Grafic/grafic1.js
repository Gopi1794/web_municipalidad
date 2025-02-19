const ctx = document.getElementById('myChart').getContext('2d');
const ctx2 = document.getElementById('myChart2').getContext('2d');
const ctx3 = document.getElementById('myChart3').getContext('2d');

// Hacer la petición al backend para obtener los datos
async function fetchData() {
    try {
        const response = await fetch('../../../src/controllers/conversionJSON.php');
        const datos = await response.json();

        // Ver los datos devueltos por el JSON en la consola
        console.log('Datos recibidos:', datos);

        // Crear objetos para almacenar datos de cada gráfico
        const provinciaCount = {};
        const mayoresDe18PorProvincia = {};
        let mujeresEnBd = 0;
        let mujeresMayoresDe18 = 0;

        // Obtener la fecha actual
        const hoy = new Date();

        // Procesar datos para el tercer gráfico: Cantidad de mujeres en la BD
        datos.forEach(dato => {
            if (dato.genero === "FEMENINO") {
                mujeresEnBd++;
            }
        });

        // Procesar datos para el primer gráfico: Cantidad total por provincia
        datos.forEach(dato => {
            if (dato && dato.provincia) {
                provinciaCount[dato.provincia] = (provinciaCount[dato.provincia] || 0) + 1;
            }
        });

        // Procesar datos para el segundo gráfico: Mayores de 18 por provincia
        datos.forEach(dato => {
            if (dato && dato.fechaDeNacimiento && dato.provincia) {
                const nacimiento = new Date(dato.fechaDeNacimiento);
                let edad = hoy.getFullYear() - nacimiento.getFullYear();
                const mesDiferencia = hoy.getMonth() - nacimiento.getMonth();

                if (mesDiferencia < 0 || (mesDiferencia === 0 && hoy.getDate() < nacimiento.getDate())) {
                    edad--;
                }

                if (edad >= 18) {
                    mayoresDe18PorProvincia[dato.provincia] = (mayoresDe18PorProvincia[dato.provincia] || 0) + 1;
                }

                // Filtrar mujeres mayores de 18 años
                if (dato.genero === "FEMENINO" && edad >= 18) {
                    mujeresMayoresDe18++;
                }
            }
        });

        // Crear arrays para el primer gráfico
        const provincias = Object.keys(provinciaCount);
        const cantidadTotalProvincias = Object.values(provinciaCount);

        // Crear arrays para el segundo gráfico
        const cantidadMayores18 = Object.values(mayoresDe18PorProvincia);

        // Crear datos para el tercer gráfico
        const cantidadTotalMujeres = mujeresEnBd;

        // Crear el primer gráfico (Total por provincia)
        new Chart(ctx, {
            type: 'bar',  // Cambiado de 'polarArea' a 'bar'
            data: {
                labels: provincias,  // Las etiquetas de las provincias
                datasets: [{
                    label: 'Cantidad Total por Provincia',  // Etiqueta para la leyenda
                    data: cantidadTotalProvincias,  // Los datos que se van a representar en las barras
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],  // Colores de las barras
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],  // Color de los bordes de las barras
                    borderWidth: 2  // Ancho del borde de las barras
                }]
            },
            options: {
                responsive: true,  // Hace el gráfico responsivo
                plugins: {
                    legend: { position: 'top' },  // Coloca la leyenda en la parte superior
                    title: {
                        display: true,
                        text: 'Cantidad Total por Provincia'  // Título del gráfico
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true  // Empieza el eje X desde cero
                    },
                    y: {
                        beginAtZero: true  // Empieza el eje Y desde cero
                    }
                }
            }
        });
        
        // Crear el segundo gráfico (Mayores de 18 por provincia)
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: provincias,
                datasets: [{
                    label: 'Mayores de 18 años',
                    data: cantidadMayores18,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: { display: true, text: 'Mayores de 18 años por provincia' }
                },
                scales: { y: { beginAtZero: true } }
            }
        });

        // Crear el tercer gráfico (Cantidad total de mujeres en la BD)
        new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: ['Total Mujeres', 'Mujeres Mayores de 18'],
                datasets: [{
                    data: [cantidadTotalMujeres, mujeresMayoresDe18],
                    backgroundColor: ['rgba(196, 54, 235, 0.5)', 'rgb(196, 54, 235)'],
                    borderColor: ['rgb(190, 99, 255)', 'rgb(196, 54, 235)'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
            }
        });

    } catch (error) {
        console.log('Error al obtener los datos:', error);
    }
}

fetchData();
