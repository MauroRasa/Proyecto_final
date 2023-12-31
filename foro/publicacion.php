<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosred.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Eyeslash</title>
</head>

<body>
    <?php
    session_start();
    require_once("../conexion.php");
    if (isset($_SESSION['ID_user'])) {
        $sqlSes = "SELECT * FROM usuarios WHERE ID_user = '" . $_SESSION['ID_user'] . "'";
        $consultaSes = mysqli_query($conexion, $sqlSes);

        if(mysqli_num_rows($consultaSes)>0){
            $registro = mysqli_fetch_array($consultaSes);
            $usuario = $registro['Usuario'];
        }else{
            echo 'error';
        }

        echo '<div class="header">';
        echo '<span>Hola: ' . $usuario . '</span> | ';
        echo '<a href="logout.php">SALIR</a>';
        echo '</div>';
        $id_publi = $_GET['id_publi'];
    } else {
        header('location:index.php');
    }

    if (isset($_POST['responder'])) {
        $publicacion = $_POST['publi'];
        $id_user = $_SESSION['ID_user'];
        $respuesta_ID_publi = $_GET['id_publi'];
        $fecha = date('Y-m-d H:i', strtotime('now'));

        //actulizo cantidad de respuestas
        $id_publi = $_GET['id_publi'];
        $cant_resp = $_SESSION['cant_resp'];
        $cant_resp++;
        $sql5 = "UPDATE eyeslash_global SET Cant_respuestas = '$cant_resp' WHERE ID_publi = '$id_publi'";
        $actulizar = mysqli_query($conexion, $sql5);

        $sql = "INSERT INTO eyeslash_global (Publicacion, ID_user, Respuesta_ID_publi, Fecha_publi) VALUES ('$publicacion','$id_user', '$respuesta_ID_publi', '$fecha')";
        $guardar_publi = mysqli_query($conexion, $sql);
    }
    ?>






    <?php

    // selecciono la publicacio abierta
    $sql1 = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Fecha_publi, p.Cant_respuestas, u.Usuario
    FROM eyeslash_global p
    JOIN usuarios u ON p.ID_user = U.ID_user AND ID_publi = '$id_publi'";
    $consulta1 = mysqli_query($conexion, $sql1);
    $fila = mysqli_fetch_assoc($consulta1);
    $_SESSION['cant_resp'] = $fila['Cant_respuestas'];



    //seleccino de la db todas las resuestas a la publicacion abierta
    $sql2 = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Fecha_publi, u.Usuario
    FROM eyeslash_global p
    JOIN usuarios u ON p.ID_user = U.ID_user AND Respuesta_ID_publi = '$id_publi' ORDER BY Fecha_publi asc";
    $consulta = mysqli_query($conexion, $sql2);

    $FechaPublicacionPubli = $fila['Fecha_publi'];
    // Convertir la cadena de fecha y hora a un objeto de fecha y hora
    $fecha = new DateTime($FechaPublicacionPubli);

    // Formatear la fecha y hora 
    $fechaFormateada = $fecha->format('Y-m-d H:i');

    echo '<div class="eyeslash">';
    // echo '<a href="publicaciones.php"><i class="fa-solid fa-circle-arrow-left"></i></a>';
    echo '<h2><a href="publicaciones.php"><i class="fa-solid fa-circle-arrow-left"></i></a> eyeslash</h2>';
    echo '<div class="cont_publis">';
    //muestro publicacion abierta para iniciar respuestas
    echo '<div class="abierta"><div class="publi_user"><p>' . $fila['Usuario'] . ' - ' . $fechaFormateada . ' - <span class="cant">' . $fila['Cant_respuestas'] . '</span></p></div><div class="publi_texto"><p>' . $fila['Publicacion'] . '</p></div></div>';

    //muestro todas las respuesta a esta publicacion
    while ($registro = mysqli_fetch_assoc($consulta)) {
        echo '<a href="publicacion.php?id_publi=' . $registro['ID_publi'] . '"><div class="publi"><div class="publi_user"><p>' . $registro['Usuario'] . ' - ' . $registro['Fecha_publi'] . '</p></div><div class="publi_texto"><p>' . $registro['Publicacion'] . '</p></div></div></a>';
    }
    echo '</div>';
    echo '
    <form action="" method="post">
    <input type="text" name="publi" id="publi" required>
    <input type="submit" name="responder" value="reponder">
    </form>
    ';

    echo '</div>';
    ?>


</body>

</html>