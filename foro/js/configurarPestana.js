var botonesEliminarPestana = document.getElementsByClassName("botonEliminarEyeslashConfigurarPestana");

function increaseOpacity() {
    document.getElementById("overlay").style.display = "block";
    botonDeletePestaña.style.display = 'block';
    
    document.getElementById("pantalla_der").setAttribute("onmousedown", "cambiarTamaño(event, 'pantalla_der', 'left')");
    document.getElementById("pantalla_der").style.cursor = "ew-resize";
    document.getElementById("pantalla_izq").setAttribute("onmousedown", "cambiarTamaño(event, 'pantalla_izq', 'right')");
    document.getElementById("pantalla_izq").style.cursor = "ew-resize";

    // Codigo para que aparezcan los delete de todos los items del slider
    for (var i = 0; i < botonesEliminarPestana.length; i++) {
      botonesEliminarPestana[i].style.display = 'block';
    }


    var divElement = document.getElementById('pantalla_izq');
    var aTags = divElement.getElementsByTagName('a');

    // Recorre todas las etiquetas <a> y desactiva el comportamiento predeterminado
    for (var i = 0; i < aTags.length; i++) {
      // Desactiva el comportamiento predeterminado
      aTags[i].addEventListener('click', function (event) {
          event.preventDefault();
      });

      // Deshabilita el estilo de cursor pointer al pasar el mouse por encima
      aTags[i].style.pointerEvents = 'none';
    }
  }
  

function closeOverlay() {
    document.getElementById("overlay").style.display = "none";
    botonDeletePestaña.style.display = 'none';

    document.getElementById("pantalla_der").removeAttribute("onmousedown");
    document.getElementById("pantalla_der").style.cursor = "";
    document.getElementById("pantalla_izq").removeAttribute("onmousedown");
    document.getElementById("pantalla_izq").style.cursor = "";
    // Codigo para que aparezcan los delete de todos los items del slider
    for (var i = 0; i < botonesEliminarPestana.length; i++) {
        botonesEliminarPestana[i].style.display = 'none';
    }


    var divElement = document.getElementById('pantalla_izq');
    var aTags = divElement.getElementsByTagName('a');

    // Recorre todas las etiquetas <a> y vuelve a activar el comportamiento predeterminado y el cursor pointer
    for (var i = 0; i < aTags.length; i++) {
      // Elimina el listener del evento click para restaurar el comportamiento predeterminado
      aTags[i].removeEventListener('click', preventDefault);

      // Restaura el estilo de cursor
      aTags[i].style.pointerEvents = 'auto';
    }

    // Función para restaurar el comportamiento predeterminado del evento click
    function preventDefault(event) {
      event.preventDefault();
    }
}

function deletePantalla_izq(botonDeletePestaña) {
  if (document.getElementById("overlay").style.display === 'block') {
      // Obtén el contenido de la pantalla izquierda
      var contenidoPantallaIzquierda = document.getElementById('pantalla_izq_interm').innerHTML;

      // Mueve el contenido a la lista desplegable
      var dropdownMenuTodo = document.querySelector('.btn-group.botonPantallaIzq');
      var dropdownMenu = document.querySelector('.dropdown-menu.botonPantallaIzq');
      var barraDeBusqueda = document.querySelector('.barraDeBusqueda');
      dropdownMenu.insertAdjacentHTML('beforeend', contenidoPantallaIzquierda);

      dropdownMenuTodo.style.display= 'block';
      barraDeBusqueda.style.width = '400px';

      // Oculta la pantalla izquierda y ajusta los estilos
      pantalla_izq.style.display = 'none';
      document.getElementById("contenedor_pant").style.marginLeft = '0%';
      document.getElementById("carousel-control-prev").style.marginLeft = '0%';


      var divElement = document.getElementById('accesosPantallaIzq');
      var aTags = divElement.getElementsByTagName('a');
  
      // Recorre todas las etiquetas <a> y vuelve a activar el comportamiento predeterminado y el cursor pointer
      for (var i = 0; i < aTags.length; i++) {
        // Elimina el listener del evento click para restaurar el comportamiento predeterminado
        aTags[i].removeEventListener('click', preventDefault);
  
        // Restaura el estilo de cursor
        aTags[i].style.pointerEvents = 'auto';
      }
  
      // Función para restaurar el comportamiento predeterminado del evento click
      function preventDefault(event) {
        event.preventDefault();
      }
  }
}

function pantallaIzqEnImagenPerfil(){

}

var idsPresionados = [];
function apretarBotonDeleteEyeslash(){
    var botonesEliminarPestana = document.getElementsByClassName("botonEliminarEyeslashConfigurarPestana");

    for (var i = 0; i < botonesEliminarPestana.length; i++) {
        botonesEliminarPestana[i].addEventListener('click', function(event) {
            var idPresionado = event.currentTarget.id;
            if (!idsPresionados.includes(idPresionado)) {
                idsPresionados.push(idPresionado);
                var eyeslashID = "eyeslashEntero" + idPresionado;
                var eyeslashElement = document.getElementById(eyeslashID);
                if (eyeslashElement) {
                    eyeslashElement.style.display = 'none';
                }
            }
            
        });
    }

    // Agregar la detección de clics para el botón closeButton
    var closeButton = document.getElementById("closeButton");
    if (closeButton) {
        closeButton.addEventListener('click', function() {
            enviarArrayIdsPresionados(idsPresionados);
        });
    }
}


function enviarArrayIdsPresionados(idsPresionados) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
        }else{
            console.log('error al enviar ids presionados');
        }
    };
    xhttp.open("POST", "publicaciones.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var idsPresionadosString = JSON.stringify(idsPresionados);
    xhttp.send("idsPresionados=" + idsPresionadosString);
}


function cambiarTamaño(e, pestañaExtensible, direccion) {
  e.preventDefault(); // Evita el desplazamiento
  var el = document.getElementById(pestañaExtensible);
  var x1 = e.clientX;
  var w = el.offsetWidth;
  var origLeft = el.offsetLeft + '20px';
  var origRight = el.offsetRight || 0; // Asegúrate de manejar el caso en el que el offsetRight no esté definido

  document.onmousemove = function (e) {
    e.preventDefault(); // Evita el desplazamiento
    var x2 = e.clientX;
    var newW;
    if (direccion === "right") {
      newW = w + (x2 - x1); // Cambiado para aumentar en caso de movimiento a la derecha
    } else if (direccion === "left") {
      newW = w + (x1 - x2); // Mantiene el comportamiento original para el caso de right
    }
    if (newW > 100) {
      el.style.width = newW + 'px';
      if (direccion === "left") {
        el.style.left = origLeft - (newW - w) + 'px';
      } else if (direccion === "right") {
        el.style.right = origRight - (newW - w) + 'px';
      }
    }
  };
  document.onmouseup = function () {
    document.onmousemove = null;
    document.onmouseup = null;
  };
}

  
  