<?php
require_once("../conexion.php");
require_once("include/configurarPestana.php");
require_once("include/eyeslash.php");
require_once("include/publicar.php");


error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Comprobar usuario
if (isset($_SESSION['ID_user'])) {
    // Obtener la imagen del usuario
    $consultaHeader = "SELECT Usuario, Img_u, tablas_usuario FROM usuarios WHERE ID_user = '" . $_SESSION['ID_user'] . "'";
    $resultadoHeader = mysqli_query($conexion, $consultaHeader);
    if ($resultadoHeader) {
        $fila = mysqli_fetch_assoc($resultadoHeader);
        $img = $fila['Img_u'];
        $usuario = $fila['Usuario'];
        if (!isset($_SESSION['tablas_usuario'])) {
            if (!empty($fila['tablas_usuario'])) {
                $_SESSION['tablas_usuario'] = unserialize($fila['tablas_usuario']);
            } else {
                $tablas_usuario = array();
                $tablas_usuario[] = 'eyeslash_global';
                $tablas_usuario[] = 'eyeslash_alimentacion';
                $tablas_usuario[] = 'eyeslash_gimnasio';
                $_SESSION['tablas_usuario'] = $tablas_usuario;
                guardarTablasUsuario($conexion, $_SESSION['ID_user'], $tablas_usuario);
            }
        }

        
    }
} else {
    // Redirigir al usuario si no ha iniciado sesión
    header('Location:../index.php?modalToShow=modalInicio');
    exit(); // Asegurar que el script se detenga después de la redirección
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
    <link rel="stylesheet" href="css/estilosred.css">
    <link rel="stylesheet" href="css/estilosBuscarRed.css">
    <title>Red Social</title>
</head>
<header>
    <a href="publicaciones.php" class="backButton"><span class="material-symbols-outlined">arrow_back</span></a>
    <div class="barraDeBusqueda">
        <form action="buscarRed.php" method="POST">
            <input type="text" class="iconoPlaceHolder" name="barraDeBusqueda" placeholder="Digite un Usuario para buscar sus publicaciones">
            <input type="submit" name="buscar" style="display:none;">
        </form>
    </div>
    <div class="falso">

    </div>
</header>


<body>
<div class="contenedor_pant" id="contenedor_pant">
<div class="todoElSliderRed">

    <!-- Mostrar todos los Eyeslash del usuario -->
    <?php
    if(isset($_POST['buscar'])){
    $busqueda = $_POST['barraDeBusqueda'];
    $tablasUsuario = $_SESSION['tablas_usuario'];

    $sql1 = "SELECT ID_user FROM usuarios WHERE Usuario = '$busqueda'";
    $correcion = mysqli_query($conexion, $sql1);

    while ($fila = mysqli_fetch_assoc($correcion)) {
        $busquedaCorregida = $fila['ID_user'];
    }

    // Iterar sobre las tablas y realizar las consultas
    foreach ($tablasUsuario as $tabla) {
        $consulta = "SELECT * FROM `" . $tabla . "` WHERE ID_user = $busquedaCorregida";
        $resultado = mysqli_query($conexion, $consulta);;

        // Mostrar resultados
        if ($resultado->num_rows > 0) {
            echo '<div class="contenidoRed">
                    <div class="publicacionCompleta">
                        <h2>'.$tabla.':</h2>';
            
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo '<div class="publicacion">
                        <h3>' . $busqueda . '</h3>';
                echo "<p>" . $row['Publicacion'] . "</p>";
                echo "<p>Fecha: " . $row['Fecha_publi'] . "</p></div>";
                echo "<hr>";
            }

            echo '</div>
                </div>';
        } else {
            echo "<p style='display:none;'>No se encontraron resultados para la búsqueda: '$busquedaCorregida'</p>";
        }
    }
    }
    ?>

<!-- FINALIZA TODO EL SLIDER DE LA RED -->


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
