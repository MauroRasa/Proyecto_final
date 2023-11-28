<?php
// pregunta.php
require_once("../conexion.php");
require_once("include/foroAdiciones.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

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

if (isset($_GET['id'])) {
    $preguntaId = $_GET['id'];

    // Realizar la consulta SQL para obtener la pregunta
    $sql = "SELECT * FROM foro WHERE ID_pregunta = '$preguntaId'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $titulo = $fila['Titulo'];
        $contenido = $fila['Pregunta'];
        
    } else {
        // Manejo de error si la consulta falla
        echo "Error al obtener la pregunta";
    }
} else {
    // Manejo de error si no se proporciona un ID de pregunta
    echo "ID de pregunta no proporcionado";
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
    <link rel="stylesheet" href="css/estilosResponder.css">
    <title><?php echo $titulo;?></title>
</head>
</head>
<body>

<?php todoHeader($img, $usuario); ?>

    <div class="foro">
        <a href="publicacionesForo.php" class="backButton"><span class="material-symbols-outlined">arrow_back</span></a>
        <?php pantallaIzquierda(); ?>
        <div class="contenidoForo">
            <div class="preguntaCompleta">
                <h2><?php echo $titulo; ?></h2>
                <p><?php echo $contenido; ?></p>
                <!-- Otros campos de la pregunta que puedas tener -->
            </div>

            <!-- Sección para respuestas -->
            <div class="respuestas">
                <h3>Respuestas</h3>
                <?php
                    $sql = "SELECT f.ID_pregunta, f.Titulo, f.Pregunta, f.Cant_respuestas, f.ID_respuesta, f.Tag, f.ID_usuario, f.Fecha_pregunta, u.ID_user, u.Usuario FROM foro f JOIN usuarios u ON u.ID_user = f.ID_usuario WHERE ID_respuesta = '$preguntaId'";
                    $result = mysqli_query($conexion, $sql);

                    if ($result->num_rows > 0) {
                        echo '<div class="contenidoRespuestas">
                                <div class="respuestaCompleta">';
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<a href="responderForo.php?id=' . $row['ID_pregunta'] . '" class="preguntasForo">';
                            echo '
                            <h4>'.$row['Usuario'].'</h4>
                            <p>' . $row['Pregunta'] . '</p></a>';
                            echo "<hr>";
                        }
                
                        echo '</div>
                            </div>';
                    } else {
                        echo "<p>Aún no respondió nadie, sé el primero en responder!</p>";
                    }
                ?>

                <!-- Formulario para enviar una respuesta -->
                <form action="enviarRespuestas.php" method="post">
                    <input type="hidden" name="pregunta_id" value="<?php echo $preguntaId; ?>">
                    <textarea name="respuesta_contenido" placeholder="Escribe tu respuesta"></textarea>
                    <button type="submit" name="responderPregunta">Enviar respuesta</button>
                </form>
            </div>
        </div>
        <?php pantallaDerecha(); ?>
    </div>



<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
