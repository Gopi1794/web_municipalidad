document.getElementById('guardarFamiliar').addEventListener('click', function(event){
   
    const  inputApellido = document.getElementById('apellido').value.trim();
    const  inputNombre = document.getElementById('nombre').value.trim();
    const  inputDni = document.getElementById('dni').value.trim();
    const  inputFecha = document.getElementById('fechaDeNacimiento').value.trim();


   if(inputApellido || inputNombre || inputDni || inputFecha === 'false'){
    Swal.fire({
        title: "Registrado con exito!",
        draggable: true,
        confirmButtonColor: "#005b88",
        customClass: {
            popup: 'custom-swal-popup'
          }
      });
   } 
   else{
    Swal.fire({
        title: "Completa todos los campos!",
        draggable: true,
        confirmButtonColor: "#005b88",
        customClass: {
            popup: 'custom-swal-popup'
          }
      });
   }
});