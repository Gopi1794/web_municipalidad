function toggleModals() {
  const modal = document.getElementById("modal");
  if (modal.style.display === "flex") {
    modal.style.display = "none"; // Ocultar el modal
  } else {
    modal.style.display = "flex"; // Mostrar el modal
  }
}



var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

var myModal = document.getElementById('exampleModal');

// Agregar animación de entrada (fade-in)
myModal.addEventListener('show.bs.modal', function (event) {
  var modalElement = event.target;

  // Agregar clase para la animación de entrada
  modalElement.classList.add('fade-in');

  // Limpiar la clase después de que la animación termine
  setTimeout(function () {
    modalElement.classList.remove('fade-in');
  }, 500); // Duración de la animación (en ms)
});

// Agregar animación de salida (fade-out)
myModal.addEventListener('hide.bs.modal', function (event) {
  var modalElement = event.target;

  // Agregar clase para la animación de salida
  modalElement.classList.add('fade-out');

  // Esperar el tiempo de la animación antes de cerrar el modal
  setTimeout(function () {
    modalElement.classList.remove('fade-out'); // Limpiar la clase
  }, 500); // Duración de la animación (en ms)
});
