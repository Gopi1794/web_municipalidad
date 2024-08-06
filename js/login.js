
//INPUT//

const input1 = document.getElementById('dni1');
const input2 = document.getElementById('dni2');

input1.addEventListener('input', function() {
    // Actualizar el valor del segundo input
    input2.value = input1.value;
});