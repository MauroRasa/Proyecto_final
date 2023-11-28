<?php
// enviar_respuesta.php
require_once("../conexion.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['ID_user'])) {
    header('Location: ../index.php?modalToShow=modalInicio');
    exit();
}

if (isset($_POST['responderPregunta'])) {
    $preguntaId = $_POST['pregunta_id'];
    $respuestaContenido = $_POST['respuesta_contenido'];
    $idUsuario = $_SESSION['ID_user'];
    $fecha = date("Y/m/d H:i:s");

    $sql = "INSERT INTO foro (pregunta, ID_respuesta, ID_usuario, Fecha_pregunta)
    VALUES ('$respuestaContenido', '$preguntaId', '$idUsuario', '$fecha')";
    $resultado = mysqli_query($conexion, $sql);

    if($resultado){
        $sql2 = "UPDATE foro SET Cant_respuestas = Cant_respuestas + 1 WHERE ID_pregunta = '$preguntaId'";
        $resultadinho = mysqli_query($conexion, $sql2)  ? print ("<script> alert ('Pregunta Enviada'); window.location = 'responderForo.php?id=$preguntaId'</script>") : print ("<script> alert ('Error al validar'</script>");
    }
    exit();
} else {
    // Manejo de error si no se envía una solicitud POST
    echo "Error: Solicitud no válida";
    exit();
}
?>
