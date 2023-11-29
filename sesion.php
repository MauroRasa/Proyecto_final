<?php
session_start();
require_once("conexion.php");


if(isset($_POST['inicio'])){
    // Recibe los datos del formulario
    $email = $_POST['emailLogin'];
    $pass = $_POST['passwordLogin'];
    

    $sql = "SELECT * FROM usuarios WHERE Email = '$email'";
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
            echo '<script>alert("Contraseña incorrecta")</script>';
            echo '<script>window.location.href = "index.php";</script>';
            
            session_destroy();
        }
    }else{
        echo '<script>
        alert("El correo es incorrecto"); window.location.href = "index.php?modalToShow=modalInicio"
        </script>
        ';
    }
}
?>