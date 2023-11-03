<?php
require_once("../conexion.php");
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
<header>
    <div class="logoFPG">
        <img onclick="volverARed()" src="../imagenes/Logo.png" alt="">
    </div>
    <div class="barraDeBusqueda">
        <form action="" method="POST">
            <input type="text" class="iconoPlaceHolder" name="barraDeBusqueda" placeholder="Buscar en FPGForo">
        </form>
    </div>
    <div class="imagenDePerfilHeader">
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle custom-btn" data-toggle="dropdown" aria-expanded="false">
                <img src ="../imagenes/imagenes_perfil/<?php echo $img; ?>" id="imagen_perfil_header">
                <span><?php echo $usuario; ?></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="" class="dropdown-item" type="button">Configuración</a>
                <a href="../logout.php" class="dropdown-item" type="button">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</header>


<div class="foro">
    <div class="pestanaIzquierda">
        <p>Menú</p>
        <a href=""><span class="material-symbols-outlined">house</span>Inicio</a>
        <a href=""><span class="material-symbols-outlined">sell</span>Etiquetas</a>
        <a href=""><span class="material-symbols-outlined">group</span>Usuarios</a>
    </div>
    <div class="centroForoPreguntas">
        <div class="inicio">
            <div class="textoArriba">
                <h1>Bienvenido al foro</h1>
                <div class="btnFormularPregunta">
                    <a href=""><span class="material-symbols-outlined">edit_note</span>Formular pregunta</a>
                </div>
            </div>
        </div>
            <?php
            // Realizar la consulta SQL
            $sql = "SELECT ID_pregunta, titulo, cant_respuestas, tag FROM foro";
            $resultado = mysqli_query($conexion, $sql);
        
            // Imprimir los datos y aplicar estilos
            echo '<div class="contenidoForo">';
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $IDPregunta = $fila['ID_pregunta'];
                $titulo = $fila['titulo'];
                $cantRespuestas = $fila['cant_respuestas'];
                $tag = $fila['tag'];
        
                echo '<div class="consultaForo">';
                echo "<p>ID Pregunta: $IDPregunta</p>";
                echo "<p>Titulo: $titulo</p>";
                echo "<p>Cantidad de Respuestas: $cantRespuestas</p>";
                echo "<p>Tag: $tag</p>";
                echo '</div>';
            }
            echo '</div>';
            ?>
    </div>
    <div class="pestanaDerecha">
        <p>Preguntas populares</p>
        <a href="#"><span class="material-symbols-outlined">live_help</span>¿Que plan de la pagina me recomiendan?</a>
        <a href="#"><span class="material-symbols-outlined">live_help</span>¿Estoy haciendo mal press banca?</a>
        <a href="#"><span class="material-symbols-outlined">live_help</span>¿Por que me duele el hombro?</a>
        <a href="#"><span class="material-symbols-outlined">live_help</span>¿Como hago correctamente remo?</a>
        <a href="#"><span class="material-symbols-outlined">live_help</span>¿Es recomendable hacer peso muerto?</a>
    </div>
</div>



    <script>
    function volverARed() {
        document.body.classList.add('slide-out'); // Agrega una clase para desplazarse hacia afuera

        // Obtén la altura total de la página
        const alturaTotal = Math.max(
            document.body.scrollHeight,
            document.body.offsetHeight,
            document.documentElement.clientHeight,
            document.documentElement.scrollHeight,
            document.documentElement.offsetHeight
        );

        // Calcula la duración de la animación en función de la altura de la página
        const duracionAnimacion = alturaTotal / 1000; 
        setTimeout(function () {
            window.location.href = 'publicaciones.php'; // Redirigir a la página 2
        }, duracionAnimacion * 300); // Multiplica la duración de la animación por 1000 para convertirla en milisegundos
    }
</script>
<style>
    .slide-out {
        animation: slideOut 1s forwards;
    }

    @keyframes slideOut {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(300px);
        }
    }
</style>
</body>
</html>