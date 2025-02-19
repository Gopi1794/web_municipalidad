// Función para cargar los datos
async function cargarDatos() {
    try {
        // Solicitar los datos al servidor
        const response = await fetch('../../../src/controllers/conversionJSON.php');
        if (!response.ok) throw new Error('Error al obtener los datos del servidor');

        // Convertir la respuesta a JSON
        const datos = await response.json();
        console.log(datos); // Verifica los datos en la consola

        // Mostrar los datos en la tabla
        mostrarDatos(datos);

        // Llamar a la función de búsqueda
        document.getElementById('search').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const resultadosFiltrados = datos.filter(dato =>
                dato.dni.toString().includes(searchTerm) ||
                dato.nombre.toLowerCase().includes(searchTerm) ||
                dato.apellido.toLowerCase().includes(searchTerm)
            );
            mostrarDatos(resultadosFiltrados);
        });
    } catch (error) {
        console.error('Error al cargar los datos:', error);
    }
}

// Función para mostrar los datos en la tabla
function mostrarDatos(datos) {
    const tabla = document.getElementById('resultados');
    tabla.innerHTML = '';  // Limpiar la tabla

    datos.forEach(dato => {
        const fila = `
            <tr>
                <td>${dato.id_usuario}</td>
                <td>${dato.dni}</td>
                <td>${dato.nombre}</td>
                <td>${dato.apellido}</td>
                <td>${dato.email}</td>
                <td>${dato.cuil1}-${dato.cuil2}-${dato.cuil3}</td>
                <td>${dato.contrasena}</td>
                <td>${dato.fechaDeNacimiento}</td>
                <td>${dato.Genero}</td>
                <td>${dato.celular}</td>
                <td>${dato.pais}</td>
                <td>${dato.provincia}</td>
                <td>${dato.municipaliad}</td>
                <td>${dato.localidad}</td>
                <td>${dato.calle}</td>
                <td>${dato.entreCalle}</td>
                <td>${dato.altura}</td>
                <td>${dato.piso}</td>
                <td>${dato.depar}</td>
                <td>${dato.per_observacion}</td>
            </tr>`;
        tabla.innerHTML += fila;
    });
}

// Cargar los datos automáticamente cuando la página se cargue
document.addEventListener('DOMContentLoaded', cargarDatos);