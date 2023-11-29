<?php

function modalLargoFormulario($IDModal, $nombreModal, $Titulo, $formAction, $IDForm, $funcionForm, $botonSiguienteModal, $nombreSiguienteModal, $contenidoForm, $imagen){
    include("conexion.php");

echo '
    <div class="modal fade modal-xl" id="modal'.$IDModal.'" aria-hidden="true" aria-labelledby="modalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <body class="'.$nombreModal.'">
                <div class="'.$nombreModal.' outer-container">
                <div class="form-container">
                    <h2 class="'.$nombreModal.' fw-medium text-white">'.$Titulo.'</h2>
                    <form class="'.$nombreModal.' fw-medium text-white" id="'.$IDForm.'" action="'.$formAction.'" method="POST" enctype="multipart/form-data">
                    '.$contenidoForm.'
                    </form>
                </div>   
                <div class="'.$nombreModal.' image-container">
                    <img src="imagenes/'.$imagen.'.jpg" alt="Imagen">
                </div>
                <button class="bt aregistro boton position-absolute bottom-0 end-0" data-bs-target="#modal'.$botonSiguienteModal.'" data-bs-toggle="modal">'.$nombreSiguienteModal.' ➡</button>
                </div>
            </body>
        </div>
    </div>
    </div>
    ';
}

function modalLargoComun($IDModalNormal, $contenidoModalNormal){
    echo '
    <div class="modal fade" id="'.$IDModalNormal.'" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-dark">
        <div class="modal-body">
            '.$contenidoModalNormal.'
        </div>
       </div>
    </div>
    </div>
    ';
}

function modalChicoComun($IDModalChico, $tituloModalChico, $contenidoModalChico){
    echo '
    <div class="modal fade bd-modal-sm" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" id="'.$IDModalChico.'">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modalRecuperar">
                <h1>'.$tituloModalChico.'</h1>
                '.$contenidoModalChico.'
            </div>
        </div>
    </div>
    ';
}
?>