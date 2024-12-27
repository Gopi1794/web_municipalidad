const ctx = document.getElementById('myChart').getContext('2d');

// Hacer la petición al backend para obtener los datos
async function fetchData() {
    try {
        const response = await fetch('../../../src/controllers/conversionJSON.php');
        const datos = await response.json();  // Convertir la respuesta a JSON

        // Ver los datos devueltos por el JSON en la consola
        console.log('Datos recibidos:', datos);

        // Crear un objeto para contar las personas por provincia
        const provinciaCount = {};

        // Contar las personas por provincia
        datos.forEach(dato => {
            if (dato && dato.provincia) {
                // Si la provincia ya existe, incrementar el contador
                if (provinciaCount[dato.provincia]) {
                    provinciaCount[dato.provincia]++;
                } else {
                    // Si no existe, crear la propiedad con valor 1
                    provinciaCount[dato.provincia] = 1;
                }
            }
        });

        // Crear los arrays para las provincias y sus cantidades
        const provincias = Object.keys(provinciaCount); // Obtener las provincias
        const cantidad = Object.values(provinciaCount);  // Obtener las cantidades

        // Ver el resultado de los conteos
        console.log('Cantidad por provincia:', provinciaCount);
        
        // Crear el gráfico con los datos
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: provincias,  // Las provincias como etiquetas en el eje X
                datasets: [{
                    data: cantidad,  // Los valores de las provincias (cantidad de usuarios)
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
                    borderWidth: 1
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
                    }
                }
            }
        });
    } catch (error) {
        console.log('Error al obtener los datos: ', error);
    }
}

fetchData();
