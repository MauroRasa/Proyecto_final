<?php
require_once("../conexion.php");
require_once("include/foroAdiciones.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

    session_start();
    // Comprobar usuario
    if (isset($_SESSION['ID_user'])) {
        $consultaHeader = "SELECT Usuario, Img_u FROM usuarios WHERE ID_user = '" . $_SESSION['ID_user'] . "'";
        $resultadoHeader = mysqli_query($conexion, $consultaHeader);
        if ($resultadoHeader) {
            $fila = mysqli_fetch_assoc($resultadoHeader);
            $img = $fila['Img_u'];
            $usuario = $fila['Usuario'];
        }
    } else {
        header('Location:../index.php?modalToShow=modalInicio');
        exit();
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
    <link rel="stylesheet" href="css/estilosforo.css">
    <title>Foro</title>
</head>
</head>
<body>
<?php todoHeader($img, $usuario); ?>


<div class="foro">
    <?php pantallaIzquierda(); ?>
    <div class="centroForoPreguntas">
        <div class="inicio">
            <div class="textoArriba">
                <h1>Bienvenido al foro</h1>
                <div class="btnFormularPregunta">
                    <a href="formularPreguntaForo.php"><span class="material-symbols-outlined">edit_note</span>Formular pregunta</a>
                </div>
            </div>
        </div>
            <?php
            // Realizar la consulta SQL
            $sql = "SELECT ID_pregunta, titulo, cant_respuestas, tag FROM foro WHERE ID_respuesta = '0'";
            $resultado = mysqli_query($conexion, $sql);
        
            // Imprimir los datos
            echo '<div class="contenidoForo">';
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $IDPregunta = $fila['ID_pregunta'];
                $titulo = $fila['titulo'];
                $cantRespuestas = $fila['cant_respuestas'];
                $tag = $fila['tag'];
        
                echo '<div class="consultaForo">';
                echo '<a href="responderForo.php?id='.$IDPregunta.'" class="preguntasForo">';
                echo "<div class='todasPreguntasForo'><p>#$IDPregunta</p>";
                echo "<p>Titulo: $titulo</p>";
                echo "<p>Cantidad de Respuestas: $cantRespuestas</p>";
                echo "<p>Tag: $tag</p>";
                echo '</a>';
                echo '</div></div>';
            }
            echo '</div>';
            ?>
    </div>
    <?php pantallaDerecha(); ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>