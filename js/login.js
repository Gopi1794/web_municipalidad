document.getElementById('btn__resgistrarse').addEventListener('click', register);
document.getElementById('btn__iniciar-sesion').addEventListener('click', iniciarSesion);
window.addEventListener("resize" , anchoPagina);

/*FORM*/
const contenedor_register = document.querySelector('.container__login-resgister');
const formulario_login = document.querySelector('.form__login');
const formulario_register = document.querySelector('.form__registrer');
const caja_trasera_login = document.querySelector('.box_back_login');
const caja_trasera_register = document.querySelector('.box_back_Registrer');


function anchoPagina(){
    if (window.innerWidth > 850){
        caja_trasera_login.style.display="block";
        caja_trasera_register.style.display= "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display= "none";
        formulario_login.style.display="block"
        formulario_register.style.display ="none";
        contenedor_register.style.left = "0px";
    }
}

anchoPagina();

function iniciarSesion() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "none";
        contenedor_register.style.left = "10px";
        formulario_login.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
        
    } else {
        formulario_register.style.display = "none";
        contenedor_register.style.left = "0px";
        formulario_login.style.display = "block";
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

function register() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "block";
        contenedor_register.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    } else {
        formulario_register.style.display = "block";
        contenedor_register.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }
}
