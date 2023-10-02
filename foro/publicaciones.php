<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosforo.css">
    <title>Foro</title>
</head>
<body> 
<?php

    session_start();
    require_once("include/conexion.php");

        // Comprobar usuario
        if(isset($_SESSION['usuario'])){
        }else{
            header('location:index.php');
    }

    // Llamar a la BD para crear una publicacion
    if(isset($_POST['publicar'])){
        $publicacion = $_POST['publi'];
        $id_user = $_SESSION['ID_user'];
        $respuesta_ID_publi = 0;
        $fecha = date("Y/m/d h:i:s");

        $sql = "INSERT INTO publicaciones (Publicacion, ID_user, Respuesta_ID_publi, Fecha_publi) VALUES ('$publicacion','$id_user', '$respuesta_ID_publi', '$fecha')";
        $guardar_publi = mysqli_query($conexion, $sql) ? print ("<script> alert ('Publicación enviada'); window.location = 'publicaciones.php'</script>") : print ("<script> alert ('Error al envíar publicación'</script>");
    }
 ?>


    
    <?php
        // Sticky header de la pagina
        echo '<div class="header">';
            echo '<span>Hola: ' . htmlentities($_SESSION['usuario']) . '</span>';
            echo '<a href="logout.php">SALIR</a>';
        echo '</div>';

        // Comienza el contenedor de las 2 pantallas (izq, dere) y el foro (publicaciones)
        echo '<div class="contenedor_pant">';
                // Pantalla izquierda
                echo '<div class="pantalla_izq">';
                    echo '<a> Esta es la pantalla izquierda</a>';
                echo '</div>';

            // Foro (pUBLICACIONES)
            // $sql = "SELECT * FROM publicaciones WHERE Respuesta_ID_publi = 0 ORDER BY Fecha_publi desc";
            $sql = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Fecha_publi, p.Cant_respuestas, u.Usuario
            FROM publicaciones p
            JOIN usuarios u ON p.ID_user = U.ID_user AND Respuesta_ID_publi = 0 ORDER BY Fecha_publi desc";
            $consulta = mysqli_query($conexion, $sql);
            echo '<div class="foro">';
                echo '<div class="cont_publis">';
                    while($registro = mysqli_fetch_assoc($consulta)) {
                    echo '<a href="publicacion.php?id_publi='.$registro['ID_publi'].'"><div class="publi"><div class="publi_user"><p>'.$registro['Usuario'].' - '.$registro['Fecha_publi'].' - <span class="cant">'.$registro['Cant_respuestas'].'</span></p></div><div class="publi_texto"><p>'.$registro['Publicacion'].'</p></div></div></a>';
                    }
                echo '</div>';
            echo '</div>';
            
            // Pantalla derecha
            echo '<div class="pantalla_der">';
                echo '<a> Esta es la pantalla derecha</a>';
            echo '</div>';
        echo '</div>';
            
        // Boton Redactar
        echo '<div class="btn_publicar">';
            echo '<a href="publicacion.html"> Redactar </a>';
        echo '</div>';


    ?>
   

</body>
</html>