<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosforo.css">
    <title>Foro</title>
</head>

<body>
    <?php
        session_start();
        require_once("../conexion.php");

        // Comprobar usuario
        if (isset($_SESSION['usuario'])) {
            $consulta = "SELECT Img_u FROM usuarios WHERE Usuario = '" . $_SESSION['usuario'] . "'";
            $resultado = mysqli_query($conexion, $consulta);
            if ($resultado) {
                $fila = mysqli_fetch_assoc($resultado);
                $img = $fila['Img_u'];
            }
            // Sticky header de la pagina
            echo '<div class="header">';
                echo '<img src ="imagenes/'. $img . '" id="imagen_perfil_header">';
                echo '<span>-' . htmlentities($_SESSION['usuario']) . '</span>';
                echo '<span>-' . htmlentities($_SESSION['ID_user']) . '</span>';
                echo '<a href="../logout.php">SALIR</a>';
            echo '</div>';
        } else {
            header('location:../index.php');
            }

        // Llamar a la BD para crear una publicacion
        if (isset($_POST['publicar'])) {
            $publicacion = $_POST['publi'];
            $id_user = $_SESSION['ID_user'];
            $respuesta_ID_publi = 0;
            $fecha = date('Y-m-d');

                        //Codigo para arreglar desface horario de localhost
                        $hora_actualBD = date('H:i');
                        $timestamp_actualBD = strtotime($hora_actualBD);
                        $timestamp_anteriorBD = $timestamp_actualBD - 3600 * 5;

                        $hora = date('H:i', $timestamp_anteriorBD);
                        //Codigo para arreglar desface horario de localhost



            $sql = "INSERT INTO publicaciones (Publicacion, ID_user, Respuesta_ID_publi, Fecha_publi, Hora_publi) VALUES ('$publicacion','$id_user', '$respuesta_ID_publi', '$fecha', '$hora')";
            $guardar_publi = mysqli_query($conexion, $sql) ? print("<script> alert ('Publicación enviada'); window.location = 'publicaciones.php'</script>") : print("<script> alert ('Error al envíar publicación'</script>");
        }

        if (isset($_POST['publicar_2'])) {
            $publicacion = $_POST['publi'];
            $id_user = $_SESSION['ID_user'];
            $respuesta_ID_publi = 0;
            $fecha = date('Y-m-d');

                        //Codigo para arreglar desface horario de localhost
                        $hora_actualBD = date('H:i');
                        $timestamp_actualBD = strtotime($hora_actualBD);
                        $timestamp_anteriorBD = $timestamp_actualBD - 3600 * 5;

                        $hora = date('H:i', $timestamp_anteriorBD);
                        //Codigo para arreglar desface horario de localhost



            $sql = "INSERT INTO publicaciones_2 (Publicacion, ID_user, Respuesta_ID_publi, Fecha_publi, Hora_publi) VALUES ('$publicacion','$id_user', '$respuesta_ID_publi', '$fecha', '$hora')";
            $guardar_publi = mysqli_query($conexion, $sql) ? print("<script> alert ('Publicación enviada'); window.location = 'publicaciones.php'</script>") : print("<script> alert ('Error al envíar publicación'</script>");
        }
    ?>



    <?php


    // Comienza el contenedor de las 2 pantallas (izq, dere) y el foro (publicaciones)
    echo '<div class="contenedor_pant">';
        // Pantalla izquierda
        echo '<div class="pantalla_izq">';
            ?>
                
            <?php
        echo '</div>';








                ?>
                <div class="botones_fuera">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active">

                            <!-- PRIMER FORO -->

                                <div class="texto_foros text-center fs-1">
                                    <a>Alimentacion</a>
                                </div>
                            <?php 
                            // Foro (pUBLICACIONES)
                            $sql = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Hora_publi, p.Cant_respuestas, u.Usuario
                            FROM publicaciones p
                            JOIN usuarios u ON p.ID_user = U.ID_user AND Respuesta_ID_publi = 0 ORDER BY Hora_publi desc";
                            $consulta = mysqli_query($conexion, $sql);
                            echo '<div class="foro">';
                                echo '<div class="cont_publis">';
                                    while ($registro = mysqli_fetch_assoc($consulta)) {
                                        echo '<a href="publicacion.php?id_publi=' . $registro['ID_publi'] . '">
                                                <div class="publi">
                                                    <div class="publi_user">
                                                        <p>' . $registro['Usuario'] . ' -
                                                            <span class="cant">' . $registro['Cant_respuestas'] . '</span>
                                                        </p>
                                                    </div>
                                                    <div class="publi_texto">
                                                        <p>' . $registro['Publicacion'] . '</p>
                                                    </div>
                                                    <div class="tiempoTransc">
                                                        ' . $registro['Hora_publi'] . '
                                                    </div>
                                                </div>
                                            </a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                            ?>
                            </div>
                            <div class="carousel-item">

                                <!-- SEGUNDO FORO -->
                                    <div class="texto_foros text-center fs-1">
                                    <a>Gimnasio</a>
                                    </div>
                                        <?php 
                                        // Foro (pUBLICACIONES)
                                        $sql = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Hora_publi, p.Cant_respuestas, u.Usuario
                                        FROM publicaciones_2 p
                                        JOIN usuarios u ON p.ID_user = U.ID_user AND Respuesta_ID_publi = 0 ORDER BY Hora_publi desc";
                                        $consulta = mysqli_query($conexion, $sql);
                                        echo '<div class="foro">';
                                            echo '<div class="cont_publis">';
                                                while ($registro = mysqli_fetch_assoc($consulta)) {
                                                    echo '<a href="publicacion.php?id_publi=' . $registro['ID_publi'] . '">
                                                            <div class="publi">
                                                                <div class="publi_user">
                                                                    <p>' . $registro['Usuario'] . ' -
                                                                        <span class="cant">' . $registro['Cant_respuestas'] . '</span>
                                                                    </p>
                                                                </div>
                                                                <div class="publi_texto">
                                                                    <p>' . $registro['Publicacion'] . '</p>
                                                                </div>
                                                                <div class="tiempoTransc">
                                                                    ' . $registro['Hora_publi'] . '
                                                                </div>
                                                            </div>
                                                        </a>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                        ?>
                            </div>
                            <div class="carousel-item">

                                <!-- TERCER FORO -->

                            <div class="texto_foros text-center fs-1">
                                    <a>Rutinas</a>
                                    </div>
                                        <?php 
                                        // Foro (pUBLICACIONES)
                                        $sql = "SELECT p.ID_publi, p.Publicacion, p.ID_user, p.Respuesta_ID_publi, p.Hora_publi, p.Cant_respuestas, u.Usuario
                                        FROM publicaciones p
                                        JOIN usuarios u ON p.ID_user = U.ID_user AND Respuesta_ID_publi = 0 ORDER BY Hora_publi desc";
                                        $consulta = mysqli_query($conexion, $sql);
                                        echo '<div class="foro">';
                                            echo '<div class="cont_publis">';
                                                while ($registro = mysqli_fetch_assoc($consulta)) {
                                                    echo '<a href="publicacion.php?id_publi=' . $registro['ID_publi'] . '">
                                                            <div class="publi">
                                                                <div class="publi_user">
                                                                    <p>' . $registro['Usuario'] . ' -
                                                                        <span class="cant">' . $registro['Cant_respuestas'] . '</span>
                                                                    </p>
                                                                </div>
                                                                <div class="publi_texto">
                                                                    <p>' . $registro['Publicacion'] . '</p>
                                                                </div>
                                                                <div class="tiempoTransc">
                                                                    ' . $registro['Hora_publi'] . '
                                                                </div>
                                                            </div>
                                                        </a>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                        ?>
                            </div>
                        </div>

                            <!-- FIN FORO -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="false"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                </div>     

                <?php






        

        // Pantalla derecha
        echo '<div class="pantalla_der">';
            echo '<a> Esta es la pantalla derecha</a>';
        echo '</div>';
    echo '</div>';

    // Boton Redactar
    echo '<div class="btn_publicar">';
        echo '<a href="publicacion.html"> Redactar </a>';
    echo '</div>';
    echo '<div class="btn_publicar">';
        echo '<a href="publicacion_2.html"> Redactar </a>';
    echo '</div>';

    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>