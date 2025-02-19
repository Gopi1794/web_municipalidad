document.addEventListener('DOMContentLoaded', function () {
    const progressInput = document.getElementById('contrasena');
    const progressBar = document.getElementById('progressBar');

    const moderate = /(?=.*[A-Z])(?=.*[a-z]).{5,}|(?=.*[\d])(?=.*[a-z]).{5,}|(?=.*[\d])(?=.*[A-Z])(?=.*[a-z]).{5,}/;
    const strong = /(?=.*[A-Z])(?=.*[a-z])(?=.*[\d]).{7,}|(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;"'<>,./?])(?=.*[a-z])(?=.*[\d]).{7,}/;
    const extraStrong = /(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;"'<>,./?]).{9,}/;

    progressInput.addEventListener('input', function () {
        const threshold = 10; // Número de caracteres que llenan la barra al 100%
        const inputLength = progressInput.value.length;

        // Calcula el progreso basado en la longitud del texto
        let progress = 0;
        if (inputLength >= threshold) {
            progress = 100;
        } else {
            progress = (inputLength / threshold) * 100;
        }

        // Actualiza el ancho y el atributo aria-valuenow de la barra de progreso
        progressBar.style.width = progress + '%';
        progressBar.setAttribute('aria-valuenow', progress);

        // Elimina las clases actuales
        progressBar.classList.remove("bg-success", "bg-warning", "bg-danger");

        // Determina la fortaleza de la contraseña y cambia la clase en consecuencia
        const value = progressInput.value;
        if (extraStrong.test(value)) {
            progressBar.classList.add("bg-success"); // Verde para contraseñas muy fuertes
            progressBar.textContent = "Segura"; // Texto: Segura
        } else if (strong.test(value)) {
            progressBar.classList.add("bg-warning"); // Amarillo para contraseñas fuertes
            progressBar.textContent = "Moderada"; // Texto: Moderada
        } else if (moderate.test(value)) {
            progressBar.classList.add("bg-danger"); // Rojo para contraseñas moderadas
            progressBar.textContent = "Débil"; // Texto: Débil
        } else {
            progressBar.classList.add("bg-danger"); // Rojo para contraseñas débiles o vacías
            progressBar.textContent = "Débil"; // Texto: Débil
        }
    });
});