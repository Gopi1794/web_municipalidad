//INPUT//

const input1 = document.getElementById('dni1');
const input2 = document.getElementById('dni2');

input1.addEventListener('input', function () {
    // Actualizar el valor del segundo input
    input2.value = input1.value;
});




document.addEventListener('DOMContentLoaded', function () {
    // Oculta los elementos al cargar la página  
    const isChecked = document.getElementById('otroPaisCheckbox').checked;
    document.getElementById('provinciaDiv').classList.toggle('hidden', isChecked);
    document.getElementById('municipalidadDiv').classList.toggle('hidden', isChecked);
    document.getElementById('localidadDiv').classList.toggle('hidden', isChecked);
    document.getElementById('pais').classList.toggle('hidden', isChecked);
    document.getElementById('otropais').classList.add('hidden');

    // Verifica si la provincia es Buenos Aires al cargar la página
    handleProvinceChange();
});

document.getElementById('otroPaisCheckbox').addEventListener('change', function () {
    const isChecked = this.checked;
    document.getElementById('provinciaDiv').classList.toggle('hidden', isChecked);
    document.getElementById('municipalidadDiv').classList.toggle('hidden', isChecked);
    document.getElementById('localidadDiv').classList.toggle('hidden', isChecked);
    document.getElementById('pais').classList.toggle('hidden', isChecked);

    const otroPais = document.getElementById("otropais");
    otroPais.classList.add("hidden");
    otroPais.classList.toggle('hidden', !isChecked);
});

// Función para manejar el cambio de provincia
document.getElementById('prov_id').addEventListener('change', handleProvinceChange);

function handleProvinceChange() {
    const selectedProvince = document.getElementById('prov_id').value;
    const isBuenosAires = selectedProvince === "1"; // 1 es el valor para Buenos Aires
    document.getElementById('municipalidadDiv').classList.toggle('hidden', !isBuenosAires);
    document.getElementById('localidadDiv').classList.add('hidden'); // Oculta inicialmente la localidad

    if (isBuenosAires) {
        handleMunicipalityChange(); // Verifica la municipalidad al seleccionar Buenos Aires
    } else {
        // Si no es Buenos Aires, resetea los select de municipalidad y localidad
        document.getElementById('mun_id').selectedIndex = 0;
        document.getElementById('loc_id').selectedIndex = 0;
    }
}

// Función para manejar el cambio de municipalidad
document.getElementById('mun_id').addEventListener('change', handleMunicipalityChange);

function handleMunicipalityChange() {
    const selectedMunicipality = document.getElementById('mun_id').value;
    const isSanVicente = selectedMunicipality === "58"; // 58 es el valor para San Vicente
    document.getElementById('localidadDiv').classList.toggle('hidden', !isSanVicente);

    if (!isSanVicente) {
        document.getElementById('loc_id').selectedIndex = 0; // Resetea el selector de localidad si no es San Vicente
    }
}

document.getElementById('searchButton').addEventListener('click', function () {
    geocodeAddress();
});

let map;
let marker;

// Inicializa el mapa
function initMap() {
    map = L.map('map').setView([-34.6037, -58.3816], 12); // Coordenadas de Buenos Aires y zoom

    // Agregar la capa de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Agregar marcador inicial (opcional)
    marker = L.marker([-34.6037, -58.3816]).addTo(map)
        .bindPopup("Ubicación Inicial")
        .openPopup();
}

// Función para geolocalizar la dirección
function geocodeAddress() {
    const calle = document.getElementById('calle').value.trim();
    const entreCalle = document.getElementById('entreCalle').value.trim();
    const altura = document.getElementById('altura').value.trim();
    const localidadSelect = document.getElementById('loc_id');
    const localidad = localidadSelect.options[localidadSelect.selectedIndex].text;

    if (calle && altura && localidad) {
        const address = `${calle} ${altura}, ${localidad}, Argentina`;

        // Usamos el servicio de geocodificación de OpenStreetMap (Nominatim)
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const lat = parseFloat(data[0].lat);
                    const lon = parseFloat(data[0].lon);

                    // Mover el mapa a la nueva ubicación
                    map.setView([lat, lon], 15);

                    // Mover el marcador
                    marker.setLatLng([lat, lon])
                        .bindPopup(`Ubicación: ${address}`)
                        .openPopup();
                } else {
                    alert('No se pudo encontrar la dirección.');
                }
            })
            .catch(error => {
                console.error("Error al geocodificar: ", error);
                alert('Error al obtener la ubicación.');
            });
    } else {
        alert('Por favor, complete todos los campos.');
    }
}

// Llamar a initMap al cargar la página
window.onload = initMap;
