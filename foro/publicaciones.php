<?php
require_once("../conexion.php");

error_reporting(E_ALL);
    ini_set('display_errors', 1);
        session_start();
        // Comprobar usuario
        if (isset($_SESSION['usuario'])) {
            $consultaHeader = "SELECT Img_u FROM usuarios WHERE Usuario = '" . $_SESSION['usuario'] . "'";
            $resultadoHeader = mysqli_query($conexion, $consultaHeader);
            if ($resultadoHeader) {
                $fila = mysqli_fetch_assoc($resultadoHeader);
                $img = $fila['Img_u'];
            }
        } else {
            header('Location:../index.php?modalToShow=modalInicio');
            }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/estilosred.css">
    <title>Red Social</title>
</head>
<body>
<header>
    <div class="logoFPG">
        <img onclick="irAlForo()" src="../imagenes/Logo.png" alt="">
    </div>
    <div class="barraDeBusqueda">
        <form action="" method="POST">
            <input type="text" class="iconoPlaceHolder" name="barraDeBusqueda" placeholder="Buscar en FPGRedSocial">
        </form>
    </div>
    <div class="imagenDePerfilHeader">
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle custom-btn" data-toggle="dropdown" aria-expanded="false">
                <img src ="../imagenes/imagenes_perfil/<?php echo $img; ?>" id="imagen_perfil_header">
                <span><?php echo htmlentities($_SESSION['usuario']); ?></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="" class="dropdown-item" type="button">Configuración</a>
                <a href="../logout.php" class="dropdown-item" type="button">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</header>

<?php
    // Llamar a la BD para crear una publicacion PUBLICACIONES
    if (isset($_POST['publicar'])) {
        $publicacion = $_POST['publi'];
        $id_user = $_SESSION['ID_user'];
        $respuesta_ID_publi = 0;
        $fecha = date('Y-m-d');
                    //Codigo PROVISIONAL para arreglar desface horario de localhost
                    $hora_actualBD = date('H:i');
                    $timestamp_actualBD = strtotime($hora_actualBD);
                    $timestamp_anteriorBD = $timestamp_actualBD - 3600 * 4;

                    $hora = date('H:i', $timestamp_anteriorBD);

        $sql = "INSERT INTO publicaciones (Publicacion, ID_user, Respuesta_ID_publi, Fecha_publi, Hora_publi) VALUES ('$publicacion','$id_user', '$respuesta_ID_publi', '$fecha', '$hora')";
        $guardar_publi = mysqli_query($conexion, $sql) ? print("<script> alert ('Publicación enviada'); window.location = 'publicaciones.php'</script>") : print("<script> alert ('Error al envíar publicación'</script>");
    }

    // Llamar a la BD para crear una publicacion PUBLICACIONES_2
    if (isset($_POST['publicar_2'])) {
        $publicacion = $_POST['publi'];
        $id_user = $_SESSION['ID_user'];
        $respuesta_ID_publi = 0;
        $fecha = date('Y-m-d');
                    //Codigo PROVISIONAL para arreglar desface horario de localhost
                    $hora_actualBD = date('H:i');
                    $timestamp_actualBD = strtotime($hora_actualBD);
                    $timestamp_anteriorBD = $timestamp_actualBD - 3600 * 4;

                    $hora = date('H:i', $timestamp_anteriorBD);

        $sql = "INSERT INTO publicaciones_2 (Publicacion, ID_user, Respuesta_ID_publi, Fecha_publi, Hora_publi) VALUES ('$publicacion','$id_user', '$respuesta_ID_publi', '$fecha', '$hora')";
        $guardar_publi = mysqli_query($conexion, $sql) ? print("<script> alert ('Publicación enviada'); window.location = 'publicaciones.php'</script>") : print("<script> alert ('Error al envíar publicación'</script>");
    }

    // Llamar a la BD para crear una publicacion PUBLICACIONES_3
    if (isset($_POST['publicar_3'])) {
        $publicacion = $_POST['publi'];
        $id_user = $_SESSION['ID_user'];
        $respuesta_ID_publi = 0;
        $fecha = date('Y-m-d');
                    //Codigo PROVISIONAL para arreglar desface horario de localhost
                    $hora_actualBD = date('H:i');
                    $timestamp_actualBD = strtotime($hora_actualBD);
                    $timestamp_anteriorBD = $timestamp_actualBD - 3600 * 4;

                    $hora = date('H:i', $timestamp_anteriorBD);

        $sql = "INSERT INTO publicaciones_3 (Publicacion, ID_user, Respuesta_ID_publi, Fecha_publi, Hora_publi) VALUES ('$publicacion','$id_user', '$respuesta_ID_publi', '$fecha', '$hora')";
        $guardar_publi = mysqli_query($conexion, $sql) ? print("<script> alert ('Publicación enviada'); window.location = 'publicaciones.php'</script>") : print("<script> alert ('Error al envíar publicación'</script>");
    }
?>
<!-- Comienza el contenedor de las 2 pantallas (izq, dere) y el eyeslash (publicaciones) -->
<div class="contenedor_pant">

    <!-- Pantalla izquierda -->
    <div class="pantalla_izq">
        <div class="accesosPantallaIzq">
            <a href="" class="textoAccesos">
                <span class="material-symbols-outlined">home</span>Home
            </a>
            <a href="" class="textoAccesos">
                <span class="material-symbols-outlined">search</span>Buscar
            </a>
            <a href="" class="textoAccesos">
                <span class="material-symbols-outlined">new_window</span>Crear Eyelash
            </a>
            <a href="" class="textoAccesos">
                <span class="material-symbols-outlined">add_circle</span>Agregar Eyelash
            </a>
            <a href="" class="textoAccesos">
                <span class="material-symbols-outlined">settings</span>Configuracion de pestaña
            </a>
        </div>
    </div>
    <div class="todoElSliderRed">
    <div id="sliderEyeslashs" class="carousel slide" data-bs-interval="false">
    <div class="carousel-inner">

    <!-- PRIMER Eyeslash -->
        <div class="carousel-item itemSliderPublicacion active">

        <!-- Titulo de los Eyeslash -->
        <div class="texto_eyeslash">
            <a>Alimentacion</a>
        </div>
        <!-- Consulta a la BD para el primer Eyeslash -->
        <?php 
        $sql = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Hora_publi, p.Cant_respuestas, u.Usuario, u.Img_u
        FROM publicaciones p
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
            ?>

            <!-- Mostrar Eyeslash -->
            <div id="publi<?php echo $IDPublicacion ?>" class="publicacionesEyeslash" onmousedown="dragStart(event, 'publi<?php echo $IDPublicacion ?>')" onmouseup="dragEnd(event, 'publi<?php echo $IDPublicacion ?>')">
                <!-- Lineas indicadores de movimiento -->
                <hr style="border: none; border-top: 2px solid #ccc; width: 85%;    margin: 0 auto;">
                <hr style="border: none; border-top: 2px solid #ccc; width: 80%; margin: 3px auto 0; margin-bottom: 10px;">
                
                <!-- Datos de publicacion -->
                <div class="publi_user_contenedor">
                    <a href="publicacion.php?id_publi=<?php echo $IDPublicacion ?>">
                        <div class="publi">
                            <div class="publi_user">
                                <p>
                                    <img src="../imagenes/imagenes_perfil/<?php echo $ImagenUsuarioPubli ?>" alt="">
                                    <?php echo $UsuarioPubli ?>
                                    <!-- <span class="cant"><?php echo $CantRespuestasPubli ?></span> -->
                                </p>
                            </div>
                            <div class="publi_texto">
                                <p><?php echo $PublicacionPubli ?></p>
                            </div>
                            <div class="tiempoTransc">
                                <?php echo $HoraPublicacionPubli ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div> 
        <?php
        }
        echo '</div>'; //.cont_publis
        
            // Boton redactar
            echo '<div class="btn_publicar"> 
                <a href="publicacion.html"> Redactar </a>
            </div>';

        echo '</div>'; //.eyeslash
        ?>
        </div><!-- .carousel-item itemSliderPublicacion active   finaliza primer Eyeslash  -->
    <!-- SEGUNDO Eyeslash -->
        <div class="carousel-item itemSliderPublicacion">

        <!-- Titulo de los Eyeslash -->
        <div class="texto_eyeslash">
            <a>Gimnasio</a>
        </div>

        <!-- Consulta a la BD para el segundo Eyeslash -->
        <?php 
        $sql = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Hora_publi, p.Cant_respuestas, u.Usuario, u.Img_u
        FROM publicaciones_2 p
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
            ?>

            <!-- Mostrar Eyeslash -->
            <div id="publi<?php echo $IDPublicacion ?>" class="publicacionesEyeslash" onmousedown="dragStart(event, 'publi<?php echo $IDPublicacion ?>')" onmouseup="dragEnd(event, 'publi<?php echo $IDPublicacion ?>')">
                <!-- Lineas indicadores de movimiento -->
                <hr style="border: none; border-top: 2px solid #ccc; width: 85%;    margin: 0 auto;">
                <hr style="border: none; border-top: 2px solid #ccc; width: 80%; margin: 3px auto 0; margin-bottom: 10px;">
                    
                <!-- Datos de publicacion -->
                <div class="publi_user_contenedor">
                    <a href="publicacion.php?id_publi=<?php echo $IDPublicacion ?>">
                        <div class="publi">
                            <div class="publi_user">
                                <p>
                                    <img src="../imagenes/imagenes_perfil/<?php echo $ImagenUsuarioPubli ?>" alt="">
                                    <?php echo $UsuarioPubli ?> -
                                    <span class="cant"><?php echo $CantRespuestasPubli ?></span>
                                </p>
                            </div>
                            <div class="publi_texto">
                                <p><?php echo $PublicacionPubli ?></p>
                            </div>
                            <div class="tiempoTransc">
                            <?php echo $HoraPublicacionPubli ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php
        }
        echo '</div>'; //.cont_publis
        
        // Boton redactar
        echo '<div class="btn_publicar"> 
            <a href="publicacion.html"> Redactar </a>
        </div>';
    
        echo '</div>'; //.eyeslash
        ?>
        </div><!-- .carousel-item itemSliderPublicacion   finaliza segundo Eyeslash  -->
    <!-- TERCER Eyeslash -->
        <div class="carousel-item itemSliderPublicacion">

        <!-- Titulo de los Eyeslash -->
        <div class="texto_eyeslash">
            <a>Rutinas</a>
        </div>

        <!-- Consulta a la BD para el tercer Eyeslash -->
        <?php 
        $sql = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Hora_publi, p.Cant_respuestas, u.Usuario, u.Img_u
        FROM publicaciones_3 p
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
            ?>

            <!-- Mostrar Eyeslash -->
            <div id="publi<?php echo $IDPublicacion ?>" class="publicacionesEyeslash" onmousedown="dragStart(event, 'publi<?php echo $IDPublicacion ?>')" onmouseup="dragEnd(event, 'publi<?php echo $IDPublicacion ?>')">
                <!-- Lineas indicadores de movimiento -->
                <hr style="border: none; border-top: 2px solid #ccc; width: 85%;    margin: 0 auto;">
                <hr style="border: none; border-top: 2px solid #ccc; width: 80%; margin: 3px auto 0; margin-bottom: 10px;">
                    
                <!-- Datos de publicacion -->
                <div class="publi_user_contenedor">
                    <a href="publicacion.php?id_publi=<?php echo $IDPublicacion ?>">
                        <div class="publi">
                            <div class="publi_user">
                                <p>
                                    <img src="../imagenes/imagenes_perfil/<?php echo $ImagenUsuarioPubli ?>" alt="">
                                    <?php echo $UsuarioPubli ?> -
                                    <span class="cant"><?php echo $CantRespuestasPubli ?></span>
                                </p>
                            </div>
                            <div class="publi_texto">
                                <p><?php echo $PublicacionPubli ?></p>
                            </div>
                            <div class="tiempoTransc">
                            <?php echo $HoraPublicacionPubli ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php
        }
        echo '</div>';//.cont_publis
        
        // Boton redactar
        echo '<div class="btn_publicar"> 
            <a href="publicacion.html"> Redactar </a>
        </div>';
    
        echo '</div>';//.eyeslash
        ?>
        </div><!-- .carousel-item itemSliderPublicacion   finaliza tercer Eyeslash  -->
    </div><!-- Finaliza el contenedor de Eyeslashs de slider  -->
    </div><!-- Finaliza el contenedor de Eyeslashs de slider  -->

    <!-- Controles del slider -->
        <button class="carousel-control-prev" type="button" data-bs-target="#sliderEyeslashs" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#sliderEyeslashs" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="false"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div><!-- .todoElSliderRed   Fin  -->
    
    <!-- FINALIZA TODO EL SLIDER DE LA RED -->



    <!-- Pantalla derecha -->
    <div class="pantalla_der" ondrop="drop(event)" ondragover="allowDrop(event)">
        <div class="tab">
            <button class="tablinks active" onclick="openTab(event, 'Tab1')">Guardados</button>
            <button class="tablinks" onclick="openTab(event, 'Tab2')">Tab 2</button>
            <button class="tablinks" onclick="openTab(event, 'Tab3')">Tab 3</button>
        </div>

        <div id="Tab1" class="tabcontent" style="display: block;">
            <p id="textoInicial">Arrastra una publicación aquí</p>
        </div>

        <div id="Tab2" class="tabcontent">
            
        </div>

        <div id="Tab3" class="tabcontent">
            
        </div>

        <div id="icono" class="icono">
            <i class="fas fa-check"></i>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/moverPublis.js"></script>


<!-- TRANSICION ENTRE RED SOCIAL Y FORO -->
<script>
    function irAlForo() {
        document.body.classList.add('slide-out'); 

        // Obtén la altura total de la página
        const alturaTotal = Math.max(
            document.body.scrollHeight,
            document.body.offsetHeight,
            document.documentElement.clientHeight,
            document.documentElement.scrollHeight,
            document.documentElement.offsetHeight
        );

        // Calcula la duración de la animación en función de la altura de la página
        const duracionAnimacion = alturaTotal / 1000; //Velocidad de visor

        setTimeout(function () {
            window.location.href = 'publicacionesForo.php'; // Redirigir a la página 2
        }, duracionAnimacion * 300); // Multiplica la duración de la animación por 1000 para convertirla en milisegundos
    }

</script>

<!-- Animacion simple para la transicion entre red y foro  -->
<style>
    .slide-out {
        animation: slideOut 1s forwards;
    }

    @keyframes slideOut {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(300px);
        }
    }
</style>
</body>

</html>