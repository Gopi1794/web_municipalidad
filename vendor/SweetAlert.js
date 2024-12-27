document.getElementById('button-buscar').addEventListener('click', function(event) {
    event.preventDefault(); // Evita que se envíe el formulario

    const buscarInput = document.getElementById('buscar').value.trim();

    if (buscarInput === "") {
        Swal.fire({
            icon: 'error',
            title: 'Campo vacío',
            text: 'Por favor, ingrese un término de búsqueda.',
        });
    } else {
        // Aquí puedes agregar el código para manejar la búsqueda cuando el campo no está vacío
        console.log('Buscando:', buscarInput);
    }
});
