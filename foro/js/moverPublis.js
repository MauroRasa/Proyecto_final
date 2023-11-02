var active = false;
var currentX;
var currentY;
var initialX;
var initialY;
var xOffset = 0;
var yOffset = 0;
var currentElement = null;
var isOverTab1 = true;

// Verificar que se arrastre sobre una publicacion
function dragStart(e, id) {
  if (!active) {
    initialX = e.clientX - xOffset;
    initialY = e.clientY - yOffset;
    var cuadrado = document.getElementById(id);
    currentElement = cuadrado;
    if (e.target === cuadrado || e.target.parentNode === cuadrado) {
      active = true;
    }
  }
}

function dragEnd(id) {
  if (active) {
    var publicacionArrastrada  = document.getElementById(id);
    // Alerta al soltar el cuadrado en pestaña
    if (currentElement !== null) {
        var rect = currentElement.getBoundingClientRect();
        var pestaña = document.getElementById('Tab1');
        var pestañaRect = pestaña.getBoundingClientRect();
        var cuadradoDentroDePestana = !(
          rect.right < pestañaRect.left ||
          rect.left > pestañaRect.right ||
          rect.bottom < pestañaRect.top ||
          rect.top > pestañaRect.bottom
        );
        if(cuadradoDentroDePestana && isOverTab1){
            pestaña.style.backgroundColor = '#373e44';
            var icono = document.getElementById('icono');
            icono.style.animation = 'none';
            void icono.offsetWidth; // Reiniciar la animación
            icono.style.display = 'block';
            icono.style.animation = 'confirmado 0.7s';

            setTimeout(function() {
                icono.style.display = 'none';

                var contenidoPublicacion = publicacionArrastrada.querySelector('.publi_texto').innerText;
                var nombreUsuario = publicacionArrastrada.querySelector('.publi_user p').innerText;

                // Crear un nuevo elemento para la publicación en la pestaña
                var nuevaPublicacion = document.createElement('div');
                nuevaPublicacion.classList.add('publicacionEnPestana');
                nuevaPublicacion.innerHTML = `
                <p>${nombreUsuario}</p>
                <p>${contenidoPublicacion}</p>
                `;

                // Agregar la nueva publicación al contenido existente de la pestaña
                pestaña.appendChild(nuevaPublicacion);

                var textoInicial = document.getElementById('textoInicial');
                if (textoInicial) {
                textoInicial.remove();
                }
              }, 690);
        }
      }
    // fin
    publicacionArrastrada.style.transform = "translate(0px, 0px)";
    active = false;
    xOffset = 0;
    yOffset = 0;
    currentElement = null;
  }
}

document.addEventListener("mousemove", drag, false);

function drag(e) {
  if (active) {
    e.preventDefault();
    currentX = e.clientX - initialX;
    currentY = e.clientY - initialY;
    xOffset = currentX;
    yOffset = currentY;
    setTranslate(currentX, currentY, currentElement);

    var rect = currentElement.getBoundingClientRect();
var pestaña = document.getElementById('Tab1');
var pestañaRect = pestaña.getBoundingClientRect();
var cuadradoDentroDePestana = !(
  rect.right < pestañaRect.left ||
  rect.left > pestañaRect.right ||
  rect.bottom < pestañaRect.top ||
  rect.top > pestañaRect.bottom
);

if (cuadradoDentroDePestana && isOverTab1) {
  pestaña.style.backgroundColor = 'green'; // Cambia el color a verde si el cuadrado está encima
} else {
  pestaña.style.backgroundColor = '#373e44'; // Vuelve al color original si el cuadrado no está encima
}
  }
}

function setTranslate(xPos, yPos, el) {
  el.style.transform = "translate(" + xPos + "px, " + yPos + "px)";
}




// Tabs

function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName('tabcontent');
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = 'none';
    }
    tablinks = document.getElementsByClassName('tablinks');
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(' active', '');
    }
    document.getElementById(tabName).style.display = 'block';
    evt.currentTarget.className += ' active';

    // Actualiza isOverTab1 dependiendo del tabName actual
    isOverTab1 = tabName === 'Tab1';
}