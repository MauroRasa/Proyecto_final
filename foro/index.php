<?php
session_start();
require_once("include/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos_login.css">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
    <form action="" method="post">
        <h2>Login Foro</h2>
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass">
        <input type="submit" name="ingresar" value="INGRESAR">
    </form>
    <?php
    if(isset($_POST['ingresar'])){
        $user = $_POST['usuario'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM usuarios WHERE Usuario = '$user' AND Pass = '$pass'";
        $query = mysqli_query($conexion, $sql);
        if(mysqli_num_rows($query)>0){
            $registro = mysqli_fetch_array($query);
            $_SESSION['usuario'] = $user;
            $_SESSION['ID_user'] = $registro['ID_user'];
            header('location:Publicaciones.php');
        }else{
            echo '<div class="error">usuario y/o contraseña incorrecta</div>';
            session_destroy();
        }
    }
    ?>
    </div>
</body>
</html>