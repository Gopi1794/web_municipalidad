document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('button-iniciar').addEventListener('click', function() {
        window.location.href = '../misanvicente/ciudadano/login_ciudadanos.php';  // Cambia la URL por la ruta correcta
    });

    document.getElementById('button-crear').addEventListener('click', function() {
        window.location.href = '../misanvicente/ciudadano/new_account.php';  // Cambia la URL por la ruta correcta
    });
});

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('button-cerrar').addEventListener('click', function() {
        // Crear un formulario dinámicamente
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '../../../src/controllers/controller.php'; // La ruta de tu archivo PHP

        // Crear un campo oculto con el valor de btnCerrar
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'btnCerrar';
        input.value = '1'; // El valor que se enviará al PHP

        // Añadir el campo al formulario
        form.appendChild(input);
        
        // Agregar el formulario al cuerpo del documento
        document.body.appendChild(form);
        
        // Enviar el formulario
        form.submit();
    });
});

