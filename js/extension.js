

const cabeza = document.querySelector("header");
const footer = document.querySelector("footer");



cabeza.innerHTML = `
<div class="nav-bar">
            <a href="index.html" class="logo"><img src="img/arribalogo.png"></a>
            <div class="navegation">
                <div class="nav-items">
                    <i class="uil uil-times nav-close-btn"></i>
                    <nav class="navigation">
                      <ul>
                      <li><a href="index.html"><i class="uil uil-home"></i>Inicio</a></li>
                      <li><a href="#"><i class="uil uil-archway"></i>Municipio</a>
                        <ul>
                          <li><a href="indentende.html">Intendente Municipal</a></li>
                          <li><a href="#">Otras autoridades</a></li>
                          <li><a href="#">Historia</a></li>
                          <li><a href="#">Mapa</a></li>
                          <li><a href="#">Boletin Oficial</a></li>
                        </ul>
                      </li>
                      <li><a href="#"><i class="uil uil-comment-edit"></i>Area de gestion</a>
                        <ul>
                          <li><a href="#">Cultura y Deporte</a></li>
                          <li><a href="#">Desarrollo Humano</a></li>
                          <li><a href="#"></i>Educacion</a></li>
                          <li><a href="#"></i>Protecccion Cuidadana</a></li>
                          <li><a href="#">Servicios</a></li>
                          <li><a href="#"></i>Hacienda</a></li>
                          <li><a href="#"></i>Obras publicas</a></li>
                          <li><a href="#"></i>Salud</a></li>
                          <li><a href="#"></i>Medio Ambiente</a></li>
                          <li><a href="#">Empleo - Industrias y Comercio local</a></li>
                        </ul>
                      </li>
                      <li><a href="#"><i class="uil uil-sign-alt"></i>Guia de tramites</a>
                        <ul>
                          <li><a href="#">Registro Municipal Unico y Permanente de Demanda Habitacional</a></li>
                          <li><a href="#">Direccion de Comercio</a></li>
                          <li><a href="#">Direccion de renta</a></li>
                          <li><a href="#">Reclamos de Servicios Publicos</a></li>
                          <li><a href="#">Licencias de Conducir</a></li>
                          <li><a href="#">Pago de Tasas</a></li>
                          <li><a href="#">Preguntas Frecuentes</a></li>
                        </ul>
                      </li>
                      <li><a href="#"><i class="uil uil-map-marker-shield"></i>El Partido</a>
                        <ul>                      
                          <li><a href="#">Partido de San Vicente</a></li>
                          <li><a href="#">San Vicente</a></li>
                          <li><a href="#">Domselaar</a></li>
                          <li><a href="#">Alejandro Korn</a></li>
                        </ul>
                      </li>
                      <li><a href="#"><i class="uil uil-image-search"></i>Turismo</a></li>
                    </ul>
                    </nav>
                </div>
            </div>
            <i class="uil uil-apps nav-menu-btn"></i>
        </div>
 
`;


footer.innerHTML = `
<div class="grupo-1">
    <div class="box">
      <figure>
        <a href="#">
      <img src="img/pielogo.png">
    </a>
    </figure>
    <div class="mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13069.175973718178!2d-58.4232352!3d-35.0243744!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bd2c537e9e0257%3A0xb9144459b04a9eb7!2sMunicipalidad%20de%20San%20Vicente!5e0!3m2!1ses-419!2sar!4v1686262886732!5m2!1ses-419!2sar" width="400px" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
      <h4>
        Av. Sarmiento 39<br>
San Vicente, Buenos Aires<br>
C.P.: 1865 / 02225 48-1101<br>
      </h4>
  </div>



  <div class="box">
  <div class="municipio">
    <h1>Municipio</h1>
    <h3>Autoridades</h3>
      <a href="">- Intendente Municipal</a>
      <a href="">- Otras oportunidades</a>
      <a href="">Historia</a>
      <a href="">Mapa</a>
    <h1>Área de gestion</h1>
      <a href="">Cultura</a>
      <a href="">Desarroloo Humano</a>
      <a href="">Educacion</a>
      <a href="">Protecccion Cuidadana</a>
      <a href="">Servicios</a>
      <a href="">Hacienda</a>
      <a href="">Obras Publicas</a>
  </div>
</div>




<div class="box">
<div class="municipio">
  <h1>Municipio</h1>
  <h3>Autoridades</h3>
    <a href="">- Intendente Municipal</a>
    <a href="">- Otras oportunidades</a>
    <a href="">Historia</a>
    <a href="">Mapa</a>
  <h1>Área de gestion</h1>
    <a href="">Cultura</a>
    <a href="">Desarroloo Humano</a>
    <a href="">Educacion</a>
    <a href="">Protecccion Cuidadana</a>
    <a href="">Servicios</a>
    <a href="">Hacienda</a>
    <a href="">Obras Publicas</a>
</div>
</div>
<div class="redes-sociales">
  <a href="#" class="uil uil-facebook-f"></a>
  <a href="#" class="uil uil-instagram"></a>
  <a href="#" class="uil uil-twitter"></a>
  <a href="#" class="uil uil-youtube"></a>
</div>

</div>

`;










