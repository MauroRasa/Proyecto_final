var botonesEliminarPestana = document.getElementsByClassName("botonEliminarEyeslashConfigurarPestana");

function increaseOpacity() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("closeButton").style.display = "block";
    botonDeletePestaña.style.display = 'block';
    // Codigo para que aparezcan los delete de todos los items del slider
    for (var i = 0; i < botonesEliminarPestana.length; i++) {
        botonesEliminarPestana[i].style.display = 'block';
    }
}

function closeOverlay() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("closeButton").style.display = "none";
    botonDeletePestaña.style.display = 'none';
    // Codigo para que aparezcan los delete de todos los items del slider
    for (var i = 0; i < botonesEliminarPestana.length; i++) {
        botonesEliminarPestana[i].style.display = 'none';
    }
}

function deletePantalla_izq(botonDeletePestaña) {
    if (document.getElementById("overlay").style.display === 'block') {
        pantalla_izq.style.display = 'none';
        document.getElementById("contenedor_pant").style.marginLeft = '0%';
        document.getElementById("carousel-control-prev").style.marginLeft = '0%';
    }
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
            // Hacer algo con la respuesta si es necesario
            console.log(this.responseText);
        }
    };
    xhttp.open("POST", "publicaciones.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var idsPresionadosString = JSON.stringify(idsPresionados);
    xhttp.send("idsPresionados=" + idsPresionadosString);
}
