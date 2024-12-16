function toggleModals() {
  const modal = document.getElementById("modal");
  if (modal.style.display === "flex") {
    modal.style.display = "none"; // Ocultar el modal
  } else {
    modal.style.display = "flex"; // Mostrar el modal
  }
}

// Redirigir y cerrar el modal
function redirectAndClose(url) {
  // Cerrar el modal
  toggleModals();

  // Redirigir después de cerrar el modal
  window.location.href = url;
}

var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})