<?php

function eyeslash($tabla){
    include("../conexion.php");

    if($tabla === 'eyeslash_global') {
        echo '<div class="carousel-item itemSliderPublicacion active">';
    } else {
        echo '<div class="carousel-item itemSliderPublicacion">';
    }

        //Titulo de los Eyeslash
        echo '
        <div class="texto_eyeslash">
            <a>' . str_replace('eyeslash_', '', $tabla) . '</a>
        </div>';
        //Consulta a la BD para el primer Eyeslash 

        $sql = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Hora_publi, p.Cant_respuestas, u.Usuario, u.Img_u
        FROM " . $tabla . " p
        JOIN usuarios u ON p.ID_user = u.ID_user AND Respuesta_ID_publi = 0 ORDER BY Hora_publi desc";
        $consulta = mysqli_query($conexion, $sql);

        echo '<div class="eyeslash">';
        echo '<div class="cont_publis">';
        while ($registro = mysqli_fetch_assoc($consulta)) {
            $IDPublicacion = $registro['ID_publi'];
            $UsuarioPubli = $registro['Usuario'];
            $ImagenUsuarioPubli = $registro['Img_u'];
            $CantRespuestasPubli = $registro['Cant_respuestas'];
            $PublicacionPubli = $registro['Publicacion'];
            $HoraPublicacionPubli = $registro['Hora_publi'];


            //Mostrar Eyeslash 
            echo '<div id="publi' . $IDPublicacion . '" class="publicacionesEyeslash" onmousedown="dragStart(event, \'publi' . $IDPublicacion . '\')" onmouseup="dragEnd(event, \'publi' . $IDPublicacion . '\')">';

                //Lineas indicadores de movimiento
                echo '<hr style="border: none; border-top: 2px solid #ccc; width: 85%;    margin: 0 auto;">
                <hr style="border: none; border-top: 2px solid #ccc; width: 80%; margin: 3px auto 0; margin-bottom: 10px;">';
                
                //Datos de publicacion 
                echo '<div class="publi_user_contenedor">
                    <a href="publicacion.php?id_publi=' . $IDPublicacion . '">
                        <div class="publi">
                            <div class="publi_user">
                                <p>
                                    <img src="../imagenes/imagenes_perfil/' . $ImagenUsuarioPubli . '" alt="">
                                    ' . $UsuarioPubli . '
                                    <!-- <span class="cant">' . $CantRespuestasPubli . '</span> -->
                                </p>
                            </div>
                            <div class="publi_texto">
                                <p>' . $PublicacionPubli . '</p>
                            </div>
                            <div class="tiempoTransc">
                                ' . $HoraPublicacionPubli . '
                            </div>
                        </div>
                    </a>
                </div>
            </div>'; 

        }
        echo '</div>'; //.cont_publis
        
            // Boton redactar
            echo '<div class="btn_publicar"> 
                <a href=""> Redactar </a>
            </div>';

        echo '</div>'; //.eyeslash

        echo '</div>'; //.carousel-item itemSliderPublicacion active   finaliza primer Eyeslash

    }
        ?>