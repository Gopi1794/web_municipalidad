//INPUT//

const input1 = document.getElementById('dni1');
const input2 = document.getElementById('dni2');

input1.addEventListener('input', function() {
    // Actualizar el valor del segundo input
    input2.value = input1.value;
});




document.addEventListener('DOMContentLoaded', function() {  
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

document.getElementById('otroPaisCheckbox').addEventListener('change', function() {  
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

document.getElementById('searchButton').addEventListener('click', function() {
    geocodeAddress();
});

let map;
let geocoder;
let marker;

function initMap() {
    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -34.6037, lng: -58.3816 }, // Coordenadas de Buenos Aires
        zoom: 12, // Ajusta el nivel de zoom
        mapTypeId: 'satellite' // Establece la vista de satélite
    });
    marker = new google.maps.Marker({
        map: map
    });
}


function geocodeAddress() {
    const calle = document.getElementById('calle').value.trim();
    const entreCalle = document.getElementById('entreCalle').value.trim();
    const altura = document.getElementById('altura').value.trim();
    const localidadSelect = document.getElementById('loc_id');
    const localidad = localidadSelect.options[localidadSelect.selectedIndex].text;

    if (calle && entreCalle && altura && localidad) {
        const address = `${calle} ${altura}, ${localidad}`;
        geocoder.geocode({ address: address }, function(results, status) {
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                map.setZoom(15);
            } else {
                alert('No se pudo encontrar la dirección: ' + status);
            }
        });
    } else {
        alert('Por favor, complete todos los campos.');
    }
}

// Inicializa el mapa al cargar la página
window.onload = initMap;

function mostrarContrasena(){
    var tipo = document.getElementById("password");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}



