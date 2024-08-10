
function showHideInputs() {  
    const selectElement = document.getElementById("mun_id");  
    const selectedValue = selectElement.value;  
    const loc_id = document.getElementById("localidadDiv");  
    const Map = document.getElementById('map');

    // Ocultar el input  
    loc_id.classList.add("hidden");
    Map.classList.add('hidden');  

    // Mostrar el input si la opción seleccionada es "58"  
    if (selectedValue === "58") {  
        loc_id.classList.remove("hidden");
        Map.classList.remove("hidden");
    }  
}  

        document.addEventListener('DOMContentLoaded', function() {  
            // Oculta los elementos al cargar la página  
            const isChecked = document.getElementById('otroPaisCheckbox').checked;  
            document.getElementById('provinciaDiv').classList.toggle('hidden', isChecked);  
            document.getElementById('municipalidadDiv').classList.toggle('hidden', isChecked);  
            document.getElementById('localidadDiv').classList.toggle('hidden', isChecked);  
            document.getElementById('pais').classList.toggle('hidden', isChecked);  
            document.getElementById('otropais').classList.add('hidden');  
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

        let map;
        let geocoder;
        let marker;

        function initMap() {
            geocoder = new google.maps.Geocoder();
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8
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

        document.getElementById('searchButton').addEventListener('click', function() {
            geocodeAddress();
        });

        // Inicializa el mapa al cargar la página
        window.onload = initMap;