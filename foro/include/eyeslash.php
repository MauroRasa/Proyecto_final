<?php

function eyeslash($tabla, $codigo){
    include("../conexion.php");
    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $sql3 = "SELECT Titulo FROM eyeslash_tabla WHERE Codigo_eyeslash = '$codigo'";
    $resultado = mysqli_query($conexion, $sql3);

    while ($consultar = mysqli_fetch_assoc($resultado)) {
        $TituloEyeslash = $consultar['Titulo'];
    }

    if($tabla === 'eyeslash_global') {
        echo '<div class="carousel-item itemSliderPublicacion active">';

        //Titulo de los Eyeslash
        echo '
        <div class="texto_eyeslash">
            <a class="texto_eyeslash_etiqueta">' . $TituloEyeslash . '</a>
        </div>';
    } else {
        echo '<div class="carousel-item itemSliderPublicacion" id="eyeslashEntero'. $tabla . '">';

        //configuracion de pestaña
        echo '
        <div class="botonEliminarEyeslashConfigurarPestana" id="' . $tabla .'">
            <button onclick="apretarBotonDeleteEyeslash()"><span class="material-symbols-outlined">delete</span> </button>
        </div>
        ';

        //Titulo de los Eyeslash
        echo '
        <div class="texto_eyeslash">
            <a class="texto_eyeslash_etiqueta">' .$TituloEyeslash. '</a>
        </div>';
    }

        //Consulta a la BD para el primer Eyeslash 

        $sql = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Fecha_publi, p.Cant_respuestas, u.Usuario, u.Img_u, e.Codigo_eyeslash, e.Titulo
        FROM `" . $tabla . "` p
        JOIN usuarios u ON p.ID_user = u.ID_user 
        JOIN eyeslash_tabla e ON e.Codigo_eyeslash = '". $codigo ."'
        WHERE p.Respuesta_ID_publi = 0 
        ORDER BY p.Fecha_publi DESC";

        $consulta = mysqli_query($conexion, $sql);

        echo '<div class="eyeslash">';
                
            // Boton redactar
            eyeslashRedactar($codigo);
            postPublicarEnEyeslash($tabla, $codigo);


        echo '<div class="cont_publis">';
        while ($registro = mysqli_fetch_assoc($consulta)) {
            $IDPublicacion = $registro['ID_publi'];
            $TituloPubli = $registro['Titulo'];
            $UsuarioPubli = $registro['Usuario'];
            $ImagenUsuarioPubli = $registro['Img_u'];
            $CantRespuestasPubli = $registro['Cant_respuestas'];
            $PublicacionPubli = $registro['Publicacion'];
            $FechaPublicacionPubli = $registro['Fecha_publi']; 

            // Convertir la fecha de publicación en un valor de tiempo Unix
            $tiempoPublicacion = strtotime($FechaPublicacionPubli);

            // Calcular la diferencia en segundos entre la marca de tiempo actual y la marca de tiempo de publicación
            $diferenciaSegundos = time() - $tiempoPublicacion;

            // Convertir la diferencia en el formato deseado (segundos, minutos, horas, días)
            if ($diferenciaSegundos < 60) {
                $TiempoDePublicado = $diferenciaSegundos . " segundos";
            } elseif ($diferenciaSegundos < 90) {
                $TiempoDePublicado = round($diferenciaSegundos / 60) . " minuto";
            } elseif ($diferenciaSegundos < 3600) {
                $TiempoDePublicado = round($diferenciaSegundos / 60) . " minutos";
            } elseif ($diferenciaSegundos < 7200) {
                $TiempoDePublicado = round($diferenciaSegundos / 3600) . " hora";
            } elseif ($diferenciaSegundos < 86400) {
                $TiempoDePublicado = round($diferenciaSegundos / 3600) . " horas";
            } else if($diferenciaSegundos < 172800) {
                $TiempoDePublicado = round($diferenciaSegundos / 86400) . " día";
            }else {
                $TiempoDePublicado = round($diferenciaSegundos / 86400) . " días";
            } 


            //Mostrar Eyeslash 
            echo '<div id="publi' . $IDPublicacion . $codigo .'" class="publicacionesEyeslash" onmousedown="dragStart(event, \'publi' . $IDPublicacion . $codigo .'\')" onmouseup="dragEnd(event, \'publi' . $IDPublicacion . $codigo .'\')">';

                //Lineas indicadores de movimiento
                echo '<hr style="border: none; border-top: 2px solid #ccc; width: 85%;    margin: 0 auto;">
                <hr style="border: none; border-top: 2px solid #ccc; width: 80%; margin: 3px auto 0; margin-bottom: 10px;">';
                
                //Datos de publicacion 
                echo '<div class="publi_user_contenedor">
                    <a href="publicacion.php?id_publi=' . $IDPublicacion . '">
                        <div class="publi">
                            <div class="publi_user">
                                <a class="publi_user_usuario">
                                    <img src="../imagenes/imagenes_perfil/' . $ImagenUsuarioPubli . '" alt="">
                                    ' . $UsuarioPubli . '
                                </a>
                                <a class="publi_user_tiempo">
                                    • ' . $TiempoDePublicado . '
                                </a>
                            </div>
                            <div class="publi_texto '.$TituloPubli.'">
                                <p>' . $PublicacionPubli . '</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>'; 

        }
        echo '</div>'; //.cont_publis

        echo '</div>'; //.eyeslash

        echo '</div>'; //.carousel-item itemSliderPublicacion active   finaliza primer Eyeslash

}

// Función para agregar una nueva tabla al array
function crearTabla($nombreTabla, $ID_user, $Estado, $CodigoEyeslash){
    // Realizar una consulta para crear una nueva tabla en la base de datos
    include("../conexion.php");
    $sql = "CREATE TABLE `eyeslash__" . $CodigoEyeslash . "` (
        ID_publi INT NOT NULL AUTO_INCREMENT,
        Publicacion VARCHAR(255),
        ID_user INT,
        Respuesta_ID_publi INT,
        Cant_respuestas INT,
        Fecha_publi DATETIME,
        PRIMARY KEY (ID_publi)
    )";


    if (mysqli_query($conexion, $sql)) {
        $sql2 = "INSERT INTO eyeslash_tabla (Codigo_eyeslash, Titulo, ID_usuario_creador, Estado_eyeslash, ID_configuracion) VALUES ('$CodigoEyeslash', '$nombreTabla', '$ID_user', '$Estado', '')";
        $eyeslash_tabla = mysqli_query($conexion, $sql2);
    
        echo '<script> alert("Eyeslash creado"); </script>' . $nombreTabla . " ha sido creada con éxito.";
        echo '<script> window.location = "publicaciones.php" </script>';
    } else {
        echo '<script> console.log(error al crear Eyeslash); </script>' . mysqli_error($conexion);
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
}

// Función para guardar los datos del array en la base de datos
function guardarTablasUsuario($conexion, $ID_user, $tablas_usuario) {
    // Convertir el array en una cadena para su almacenamiento en la base de datos
    $tablas_usuario_serializado = serialize($tablas_usuario);

    // Consulta para actualizar los datos en la base de datos
    $consulta = "UPDATE usuarios SET tablas_usuario = '$tablas_usuario_serializado' WHERE ID_user = '$ID_user'";
    mysqli_query($conexion, $consulta);
}

// Función para eliminar un dato del array y actualizar la base de datos
function eliminarDatoArrayYBD($conexion, $ID_user, $dato) {
    // Recorre cada elemento en el array y compara con $dato
    foreach ($_SESSION['tablas_usuario'] as $key => $value) {
        if ($value === $dato) {
            unset($_SESSION['tablas_usuario'][$key]);
        }
        else{
            echo '<script> console.log(Error al eliminar) </script>';
        }
    }

    // Guardar el array actualizado en la base de datos
    guardarTablasUsuario($conexion, $ID_user, $_SESSION['tablas_usuario']);

}




function mostrarDatosEyeslash($codigo){
    include("../conexion.php");

    $sql = "SELECT et.*, u.Usuario 
        FROM eyeslash_tabla et
        JOIN usuarios u ON et.ID_usuario_creador = u.ID_user
        WHERE et.Codigo_eyeslash = '$codigo'";

    $consulta = mysqli_query($conexion, $sql);

        while($registro = mysqli_fetch_assoc($consulta)){
            if($_SESSION['ID_user'] === $registro['ID_usuario_creador'] ){
        
            echo 
            '
                <div class="eyeslashIndividualConfig">
                    <h1> '.$registro['Titulo'].' </h1>
        
                    <div class="codigoEyeslashIndividualConfig">
                        <a>Codigo: </a>
                        <a id="codigoEyeslashIndividualConfig">'.$registro['Codigo_eyeslash'].' </a>
                    </div>
                    <p> Estado: '.$registro['Estado_eyeslash'].' </p>
                    <p> Creador: '.$registro['Usuario'].' </p>
                </div>
            ';
        
        }
    }

}



function eyeslashRedactar($codigo){

    echo '
    <div class="contenedorBotonRedactar">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="publicacionEyeslash" id="publicacionEyeslash" placeholder="¿Que estás pensando?" autocomplete="off" required>
        
            <input type="submit" name="publicarEnEyeslash'.$codigo.'" id="publicarEnEyeslash" style="display:none;">
        </form>
    </div>
    ';
}

function postPublicarEnEyeslash($tabla, $codigo){
    include('../conexion.php');

    date_default_timezone_set('America/Argentina/Buenos_Aires');

    if(isset($_POST['publicarEnEyeslash' . $codigo])) {
        $publicacion = $_POST['publicacionEyeslash'];
        $id_user = $_SESSION['ID_user'];
        $respuesta_ID_publi = 0;
        $fecha = date("Y/m/d H:i:s");
    
        $sql = "INSERT INTO `" . $tabla . "` (Publicacion, ID_user, Respuesta_ID_publi, Fecha_publi) VALUES ('$publicacion','$id_user', '$respuesta_ID_publi', '$fecha')";
        $guardar_publi = mysqli_query($conexion, $sql) ? print ("<script> alert ('Publicación enviada'); window.location = 'publicaciones.php'</script>") : print ("<script> alert ('Error al envíar publicación'</script>");
    }
}
        ?>