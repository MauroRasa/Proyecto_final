<?php
include("../conexion.php");
$email = $_GET['email']; 

$email = mysqli_real_escape_string($conexion, $email); //seguridad

$sql = "SELECT `Email` FROM `usuarios` WHERE Email = '$email'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo 'existe';
} else {
    echo 'no_existe';
}
?>
