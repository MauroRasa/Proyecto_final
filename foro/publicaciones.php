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
    <link rel="stylesheet" href="css/configurarpestana.css">
    <link rel="stylesheet" href="css/eyeslash.css">
    <title>Red Social</title>
</head>
<body>
<header>
    <div class="menuHamburguesaSinPantallaIzq">
        
    </div>
    <div class="logoFPG">
        <img onclick="irAlForo()" src="../imagenes/Logo.png" alt="">
    </div>
    <div class="btn-group botonPantallaIzq" style="display:none;">
            <button type="button" class="btn dropdown-toggle custom-btn" data-toggle="dropdown" aria-expanded="false">
                Pantalla izquierda
            </button>
            <div class="dropdown-menu botonPantallaIzq dropdown-menu-end">

            </div>
        </div>
    <div class="barraDeBusqueda">
        <form action="" method="POST">
            <input type="text" class="iconoPlaceHolder" name="barraDeBusqueda" placeholder="Buscar en FPGRedSocial">
        </form>
    </div>
    <div class="imagenDePerfilHeader">
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle custom-btn" data-toggle="dropdown" aria-expanded="false">
                <img src ="../imagenes/imagenes_perfil/<?php echo $img; ?>" id="imagen_perfil_header">
                <span><?php echo $usuario; ?></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="" class="dropdown-item" type="button">Configuración</a>
                <a href="../logout.php" class="dropdown-item" type="button">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</header>


<?php configuracion(); 

echo '<script> console.log(' . json_encode($_SESSION['tablas_usuario']) . '); </script>';


if(isset($_POST['idsPresionados'])) {
    $idsPresionados = json_decode($_POST['idsPresionados'], true);

    foreach ($idsPresionados as $dato) {
        eliminarDatoArrayYBD($conexion, $_SESSION['ID_user'], $dato);
    }
    exit();
}



?>

<!-- Comienza el contenedor de las 2 pantallas (izq, dere) y el eyeslash (publicaciones) -->
<div class="contenedor_pant" id="contenedor_pant">

    <!-- Pantalla izquierda -->
    <div class="pantalla_izq" id="pantalla_izq">
        <?php botonDelete() ?>
        <div class="pantalla_izq_interm" id="pantalla_izq_interm">
            <div class="accesosPantallaIzq" id="accesosPantallaIzq">
                <a href="publicacioness.php" class="textoAccesos">
                    <span class="material-symbols-outlined">home</span>Home
                </a>
                <a href="" class="textoAccesos">
                    <span class="material-symbols-outlined">search</span>Buscar
                </a>
                <a href="" class="textoAccesos" data-toggle="modal" data-target="#modalCrearEyeslash">
                    <span class="material-symbols-outlined">new_window</span>Crear Eyelash
                </a>
                <a class="textoAccesos" data-toggle="modal" data-target="#modalAgregarEyeslash">
                    <span class="material-symbols-outlined">add_circle</span>Agregar Eyelash
                </a>
                <a class="textoAccesos" onclick="increaseOpacity()">
                    <span class="material-symbols-outlined">edit</span>Configuracion de pestaña
                </a>
            </div>
            <div class="todoControlDeEyeslashs">
                    <div class="controlDeEyeslashs" id="controlDeEyeslashs">
                        <h4>Eyeslash Config</h4>

                        <?php 
                            $tablasCreadasUsuario = $_SESSION['tablas_usuario'];
                            foreach ($tablasCreadasUsuario as $nombreTabla) {
                                if($nombreTabla !== 'eyeslash_global' || $nombreTabla !== 'eyeslash_alimentacion' || $nombreTabla !== 'eyeslash_gimnasio'){

                                    $codigoTabla = str_replace('eyeslash__', '', $nombreTabla);
                                    mostrarDatosEyeslash($codigoTabla); 
                                }
                            }
                            
                        ?>
                    </div>
                </div>
        </div>
    </div>
    <div class="todoElSliderRed">
    <div id="sliderEyeslashs" class="carousel slide" data-bs-interval="false">
    <div class="carousel-inner">

        <!-- Mostrar todos los Eyeslash del usuario -->
        <?php 
        $tablasGuardadas = $_SESSION['tablas_usuario'];
            foreach ($tablasGuardadas as $nombreTabla) {
                if($nombreTabla === 'eyeslash_global' || $nombreTabla === 'eyeslash_alimentacion' || $nombreTabla === 'eyeslash_gimnasio'){
                    $codigo = str_replace('eyeslash_', '', $nombreTabla);
                }else{
                    $codigo = str_replace('eyeslash__', '', $nombreTabla);
                }
                eyeslash($nombreTabla, $codigo);
            }
        ?>

    </div><!-- Finaliza el contenedor de Eyeslashs de slider  -->
    </div><!-- Finaliza el contenedor de Eyeslashs de slider  -->

    <!-- Controles del slider -->
        <button class="carousel-control-prev" id="carousel-control-prev" type="button" data-bs-target="#sliderEyeslashs" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#sliderEyeslashs" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="false"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div><!-- .todoElSliderRed   Fin  -->
    
    <!-- FINALIZA TODO EL SLIDER DE LA RED -->



    <!-- Pantalla derecha -->
    <div class="pantalla_der" id="pantalla_der" ondrop="drop(event)" ondragover="allowDrop(event)">
        <div class="tab" id="tab">
            <div class="tab-container">
                <button class="tablinks active" onclick="openTab(event, 'Tab1')">Guardados</button>
                <button class="tablinks" onclick="openTab(event, 'Tab2')">Tab 2</button>
                <button class="tablinks" onclick="openTab(event, 'Tab3')">Tab 3</button>
           </div>
        </div>

        <div id="Tab1" class="tabcontent" style="display: block;">
            <p id="textoInicial">Arrastra una publicación aquí</p>
        </div>

        <div id="Tab2" class="tabcontent">
            
        </div>

        <div id="Tab3" class="tabcontent">
            
        </div>

        <div id="icono" class="icono">
            <i class="fas fa-check"></i>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalCrearEyeslash" tabindex="-1" role="dialog" aria-labelledby="modalCrearEyeslashLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCrearEyeslashLabel">Crear Eyeslash</h5>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <label for="nombreEyeslash">Digite el nombe del Eyeslash</label>
            <input type="text" name="nombreEyeslash" id="nombreEyeslash">

            <label for="opcion">Estado del Eyeslash:</label>
            <select name="opcion" id="opcion">
                <option value="Publico">Publico</option>
                <option value="Privado">Privado</option>
            </select>

            <button type="submit" name="crearEyeslash"></button>
        </form>

        <?php 
            if(isset($_POST['crearEyeslash'])){
                $nombreTabla = $_POST['nombreEyeslash'];
                $Estado = $_POST['opcion'];
                $CodigoEyeslash = '#' . substr(uniqid(), 0, 8);
                
                // Agregar el nuevo nombre de tabla al array de tablas del usuario
                if(!in_array('eyeslash__' . $nombreTabla, $_SESSION['tablas_usuario'])) {
                    $_SESSION['tablas_usuario'][] = 'eyeslash__' . $CodigoEyeslash;
                    guardarTablasUsuario($conexion, $_SESSION['ID_user'], $_SESSION['tablas_usuario']); // Actualizar la base de datos
                }
                crearTabla($nombreTabla, $_SESSION['ID_user'], $Estado, $CodigoEyeslash); 
            
                echo '<script>alert("eyeslash creado correctamente"); </script>';
                echo '<script>window.location = "./publicaciones.php";</script>';
                exit();
            }
        ?>
      </div>
    </div>
  </div>
</div>



<!-- Modal agregar-->
<div class="modal fade" id="modalAgregarEyeslash" tabindex="-1" role="dialog" aria-labelledby="modalAgregarEyeslashLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAgregarEyeslashLabel">Agregar Eyeslash</h5>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <label for="codigoAgregarTabla">Ingrese el codigo del Eyeslash</label>
            <input type="text" name="codigoAgregarTabla" id="codigoAgregarTabla">

            <button type="submit" name="agregarEyeslash"></button>
        </form>

        <?php 
            if(isset($_POST['agregarEyeslash'])){
                $codigoAgregarTabla = $_POST['codigoAgregarTabla'];
                
                // Agregar el nuevo nombre de tabla al array de tablas del usuario
                if(!in_array('eyeslash__' . $codigoAgregarTabla, $_SESSION['tablas_usuario'])) {
                    $_SESSION['tablas_usuario'][] = 'eyeslash__' . $codigoAgregarTabla;
                    guardarTablasUsuario($conexion, $_SESSION['ID_user'], $_SESSION['tablas_usuario']); // Actualizar la base de datos
                }
            
                echo '<script>alert("eyeslash agregado correctamente"); </script>';
                echo '<script>window.location = "./publicaciones.php";</script>';
                exit();
            }
        ?>
      </div>
    </div>
  </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/moverPublis.js"></script>
<script src="js/configurarPestana.js"></script>


<!-- TRANSICION ENTRE RED SOCIAL Y FORO -->
<script>
    function irAlForo() {
        document.body.classList.add('slide-out'); 

        // Obtén la altura total de la página
        const alturaTotal = Math.max(
            document.body.scrollHeight,
            document.body.offsetHeight,
            document.documentElement.clientHeight,
            document.documentElement.scrollHeight,
            document.documentElement.offsetHeight
        );

        // Calcula la duración de la animación en función de la altura de la página
        const duracionAnimacion = alturaTotal / 1000; //Velocidad de visor

        setTimeout(function () {
            window.location.href = 'publicacionesForo.php'; // Redirigir a la página 2
        }, duracionAnimacion * 300); // Multiplica la duración de la animación por 1000 para convertirla en milisegundos
    }


    const codigo = document.getElementById('codigoEyeslashIndividualConfig');
    codigo.addEventListener('click', function() {
    const texto = codigo.innerText;
    navigator.clipboard.writeText(texto)
        .then(() => {
        console.log('Texto copiado al portapapeles: ' + texto);
        })
        .catch(err => {
        console.error('Error al copiar al portapapeles: ', err);
        });
    });


    var controlDeEyeslashs = document.getElementById("controlDeEyeslashs");
    var eyeslashIndividualConfig = document.querySelector(".eyeslashIndividualConfig");
    if (eyeslashIndividualConfig) {
    controlDeEyeslashs.style.display = "block";
    }



    function scrollToTab(tabId) {
    var tabElement = document.getElementById(tabId);
    if (tabElement) {
        tabElement.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
    }
}

</script>

<!-- Animacion simple para la transicion entre red y foro  -->
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