<?php
session_start();
require_once("conexion.php");


if(isset($_POST['inicio'])){
    // Recibe los datos del formulario
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];
    

    $sql = "SELECT * FROM usuarios WHERE Usuario = '$usuario'";
    $query = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($query)>0){
        $registro = mysqli_fetch_array($query);
        if (password_verify($pass, $registro['Pass'])) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['ID_user'] = $registro['ID_user'];
            // Agregar una variable de JavaScript para indicar que se debe mostrar el popup
            echo '<script>';
            echo 'window.addEventListener("DOMContentLoaded", function() {';
            echo '    alert("Inicio de sesión exitoso. Bienvenido.");';
            echo '    window.location.href = "index.php";';
            echo '});';
            echo '</script>';
        } else {
            echo '<div class="error">Contraseña incorrecta</div>';
            session_destroy();
        }
    }
}
?>