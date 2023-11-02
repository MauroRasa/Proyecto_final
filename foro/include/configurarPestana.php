<?php

function configuracion(){
echo '<div id="overlay"></div>
<button id="closeButton" onclick="closeOverlay()">Salir</button>';
}


function botonDelete(){
    echo '
        <button class="botonDeletePestaña" id="botonDeletePestaña"  onclick="deletePantalla_izq(this)">
            <span class="material-symbols-outlined">delete</span>
        </button>
';
}
?>