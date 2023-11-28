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
    <link rel="stylesheet" href="css/estilosBuscarForo.css">
    <title>Foro</title>
</head>

<?php todoHeader($img, $usuario); ?>

<body>
    <div class="foro">
    <a href="publicacionesForo.php" class="backButton"><span class="material-symbols-outlined">arrow_back</span></a>
    <?php pantallaIzquierda(); ?>
    <?php
    if(isset($_POST['buscar'])){
    $busqueda = $_POST['barraDeBusqueda'];

    // Consulta SQL para buscar en la tabla 'foro'
    $sql = "SELECT * FROM foro WHERE Titulo LIKE '$busqueda' OR Pregunta LIKE '$busqueda' OR Tag LIKE '$busqueda'";
    $result = mysqli_query($conexion, $sql);;

    // Mostrar resultados
    if ($result->num_rows > 0) {
        echo '<div class="contenidoForo">
                <div class="preguntaCompleta">
                    <h2>Resultados de la búsqueda:</h2>';
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="preguntita"><a href="responderForo.php?id=' . $row['ID_pregunta'] . '" class="preguntasForo">
                    <h3>' . $row['Titulo'] . '</h3>';
            echo "<p>" . $row['Pregunta'] . "</p>";
            echo "<p>Tag: " . $row['Tag'] . "</p></div>";
            echo "<hr>";
        }

        echo '</div>
            </div>';
    } else {
        echo "<p>No se encontraron resultados para la búsqueda: '$busqueda'</p>";
    }
    }
    ?>
    <?php pantallaDerecha(); ?>
    </div>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
