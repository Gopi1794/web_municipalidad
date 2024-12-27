const ctx = document.getElementById('myChart').getContext('2d');
const ctx2 = document.getElementById('myChart2').getContext('2d');

// Hacer la petición al backend para obtener los datos
async function fetchData() {
    try {
        const response = await fetch('../../../src/controllers/conversionJSON.php');
        const datos = await response.json(); // Convertir la respuesta a JSON

        // Ver los datos devueltos por el JSON en la consola
        console.log('Datos recibidos:', datos);

        // Crear objetos para almacenar datos de cada gráfico
        const provinciaCount = {};
        const mayoresDe18PorProvincia = {};

        // Obtener la fecha actual
        const hoy = new Date();

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
            }
        });

        // Crear arrays para el primer gráfico
        const provincias = Object.keys(provinciaCount);
        const cantidadTotal = Object.values(provinciaCount);

        // Crear arrays para el segundo gráfico
        const provinciasMayores18 = Object.keys(mayoresDe18PorProvincia);
        const cantidadMayores18 = Object.values(mayoresDe18PorProvincia);

        // Ver los resultados en la consola
        console.log('Cantidad total por provincia:', provinciaCount);
        console.log('Cantidad mayores de 18 por provincia:', mayoresDe18PorProvincia);

        // Crear el primer gráfico (Total por provincia)
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: provincias,
                datasets: [{
                    data: cantidadTotal,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Cantidad total por provincia'
                    }
                }
            }
        });

        // Crear el segundo gráfico (Mayores de 18 por provincia)
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: provinciasMayores18,
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
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Mayores de 18 años por provincia'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    } catch (error) {
        console.log('Error al obtener los datos:', error);
    }
}

fetchData();
