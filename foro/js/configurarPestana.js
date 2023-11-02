function increaseOpacity() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("closeButton").style.display = "block";
    botonDeletePestaña.style.display = 'block';
}

function closeOverlay() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("closeButton").style.display = "none";
    botonDeletePestaña.style.display = 'none';
}

function deletePantalla_izq(botonDeletePestaña) {
    if (document.getElementById("overlay").style.display === 'block') {
        pantalla_izq.style.display = 'none';
        document.getElementById("contenedor_pant").style.marginLeft = '0%';
        document.getElementById("carousel-control-prev").style.marginLeft = '0%';
    }
}