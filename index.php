<?php
include('conexion.php');
require_once('include/modal.php');
require_once('include/verificacionesPost.php');
require_once('include/slider.php');
session_start();

if (isset($_SESSION['ID_user'])) {
  $consulta = "SELECT Img_u FROM usuarios WHERE ID_user = '" . $_SESSION['ID_user'] . "'";
  $resultado = mysqli_query($conexion, $consulta);
  if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    $img = $fila['Img_u'];
    $imagen_perfil = '
      <li class="icononav-item dropdown">
        <a class="icononav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="imagenes/imagenes_perfil/' . $img . '" id="imagen_perfil_header">
        </a>
        <ul class="dropdown-menu dropdown-menu-end bg-transparent">
          <li>
            <a class="dropdown-item btn btn-primary" href="logout.php" type="button">
            SALIR
            </a>
          </li>
          <li>
          <a class="dropdown-item btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalConfiguracion">
            CONFIG
          </a>
        </li>
      </ul>
      </li>';
  }
} else {
  session_destroy();
  $imagen_perfil = '
    <li class="nav-item">
      <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalInicio">
        <span class="material-symbols-outlined">account_circle</span>
      </a>
    </li>';
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>FitPlanGains</title>
  <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
  <link rel="stylesheet" type="text/css" href="estilos/modalEstilos.css">
  <link rel="stylesheet" type="text/css" href="estilos/slider.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!-- GOOGLE FONTs -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- ANIMATE CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>


<?php
//Verificaciones POST  (verificacionesPost.php)
sendCorreoVerificar();
recuperar($conexion);
sendCorreoRecuperar();
tokenRecuperar($conexion);
recuperarFin($conexion);
configuracionUsuario($conexion, $_SESSION['ID_user']);

?>


<body class="toda_la_pagina">
  <header class="navbar_header_sticky">
    <nav class="navbar navbar-expand-lg shadow">
      <div class="container-fluid">
        <a class="navbar-brand fs-2 fw-medium d-lg-block" href="#index.php">
          <img class="d-inline-block logo-color d-none" src="imagenes/logo_vacio.png" alt="Logo en color" width="60"
            height="60">
          <img class="d-inline-block logo-blanco d-none" src="imagenes/logo_vacio_blanco.png" alt="Logo blanco"
            width="60" height="60">
          <img class="d-inline-block logo-color_chico d-none" src="imagenes/Logo.png" alt="Logo-chico" width="60"
            height="60">
          <img class="d-inline-block logo-blanco_chico d-none" src="imagenes/Logo_blanco.png" alt="Logo-blanco-chico"
            width="60" height="60">
          <span class="d-none d-lg-inline">FitPlanGains</span>
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto fs-5">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">App</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Planes</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Nosotros
              </a>
              <ul class="dropdown-menu bg-transparent">
                <li><a class="dropdown-item btn btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#modalAyuda">
                    Ayuda
                  </a></li>
                <li><a class="dropdown-item btn btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#modalContacto">
                    Contacto
                  </a></li>
              </ul>
            </li>
            <?php
            echo $imagen_perfil;
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <?php
  //Modal de inicio de sesion
  $IDModal1 = "Inicio";
  $nombreModal1 = "modalLogin";
  $Titulo1 = "Iniciar Sesion";
  $formAction1 = "sesion.php";
  $IDForm1 = "formularioLogin";
  $funcionForm1 = '';
  $botonSiguienteModal1 = "Registro";
  $nombreSiguienteModal1 = "Registrarse";

  $contenidoForm1 = '
  <div class="mb-3">
    <label for="emailLogin" class="form-label text-white">Email:</label>
    <input type="text" id="emailLogin" name="emailLogin" class="form-control">
  </div>
  
  <div class="mb-3">
    <label for="passwordLogin" class="form-label text-white">Contraseña:</label>
    <input type="password" id="passwordLogin" name="passwordLogin" class="form-control">
  </div>
  <a class="btn btn-second fs-6" data-bs-target="#modalRecuperar" data-bs-toggle="modal">Recuperar Contraseña</a> 
  <button class="bt btn btn-second" type="submit" name="inicio">Iniciar</button> 
  ';
  modalLargoFormulario($IDModal1, $nombreModal1, $Titulo1, $formAction1, $IDForm1, $funcionForm1, $botonSiguienteModal1, $nombreSiguienteModal1, $contenidoForm1);
  //Fin
  
  //Modal de Registro
  $IDModal2 = "Registro";
  $nombreModal2 = "modalRegistrarse";
  $Titulo2 = "Registrarse";
  $formAction2 = "registro.php";
  $IDForm2 = "formularioRegistro";
  $funcionForm2 = 'onsubmit="return validarFormulario()"';
  $botonSiguienteModal2 = "Login";
  $nombreSiguienteModal2 = "Inicio";

  $contenidoForm2 = '    
    <div class="mb-3">
      <label for="usuarioRegistro" class="form-label text-white">Usuario:</label>
      <input type="text" id="usuarioRegistro" name="usuarioRegistro" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="passwordRegistro" class="form-label text-white">Contraseña:</label>
      <input type="password" id="passwordRegistro" name="passwordRegistro" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="emailRegistro" class="form-label text-white">Email:</label>
      <input type="text" id="emailRegistro" name="emailRegistro" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="confirm_password" class="form-label text-white">Confirmar Contraseña:</label>
      <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label text-white">Imagen de Perfil:  (Opcional)</label>
      <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*">
    </div>

    <input type="hidden" name="registrarse" value="1">
    <button class="bt btn btn-second" type="submit" name="registrarse">Registrarse</button>
  ';

  modalLargoFormulario($IDModal2, $nombreModal2, $Titulo2, $formAction2, $IDForm2, $funcionForm2, $botonSiguienteModal2, $nombreSiguienteModal2, $contenidoForm2);
  //Fin
  
  //Modal Ayuda
  $IDModalComun1 = "modalAyuda";
  $contenidoModalComun1 = '
    <body class="modalAyuda">
                <header class="modalAyuda">
                    <h1 class="modalAyuda text-white">Página de Ayuda - Creación de Rutinas</h1>
                </header>
                <nav class="modalAyuda">
                    <ul class="modalAyuda">
                        <li><a href="#pregunta1">¿Cómo puedo crear una rutina de ejercicios?</a></li>
                        <li><a href="#pregunta2">¿Cómo puedo diseñar una dieta equilibrada?</a></li>
                        <li><a href="#pregunta3">¿Dónde puedo encontrar recetas saludables?</a></li>
                    </ul>
                </nav>
                <main class="modalAyuda">
                    <section  class="modalAyuda" id="pregunta1">
                        <h2 class="modalAyuda text-white">¿Cómo puedo crear una rutina de ejercicios?</h2>
                        <p class="modalAyuda text-white">Para crear una rutina de ejercicios personalizada, sigue estos pasos:</p>
                        <ol class="modalAyuda text-white">
                            <li class="modalAyuda">Establece tus objetivos de entrenamiento.</li>
                            <li class="modalAyuda">Selecciona los ejercicios adecuados para tus objetivos.</li>
                            <li class="modalAyuda">Planifica la duración y frecuencia de tu rutina.</li>
                            <li class="modalAyuda">Realiza un seguimiento de tu progreso.</li>
                        </ol>
                    </section>
                    <section class="modalAyuda" id="pregunta2">
                        <h2 class="modalAyuda text-white">¿Cómo puedo diseñar una dieta equilibrada?</h2>
                        <p class="modalAyuda text-white">Para diseñar una dieta equilibrada, ten en cuenta lo siguiente:</p>
                        <ul class="modalAyuda text-white">
                            <li class="modalAyuda">Incluye una variedad de alimentos: frutas, verduras, proteínas magras, carbohidratos y grasas saludables.</li>
                            <li class="modalAyuda">Calcula tus necesidades calóricas diarias.</li>
                            <li class="modalAyuda">Planifica tus comidas y meriendas.</li>
                            <li class="modalAyuda">Bebe suficiente agua y evita el exceso de azúcar y alimentos procesados.</li>
                        </ul>
                    </section>
                    <section class="modalAyuda" id="pregunta3">
                        <h2 class="modalAyuda text-white">¿Dónde puedo encontrar recetas saludables?</h2>
                        <p class="modalAyuda text-white">Puedes encontrar recetas saludables en los siguientes lugares:</p>
                        <ul class="modalAyuda text-white">
                            <li class="modalAyuda">Libros de cocina especializados en nutrición.</li>
                            <li class="modalAyuda">Sitios web de salud y nutrición.</li>
                            <li class="modalAyuda">Aplicaciones móviles de recetas saludables.</li>
                            <li class="modalAyuda">Consultando a un dietista o nutricionista.</li>
                        </ul>
                    </section>
                </main>
                <footer class="modalAyuda">
                    <p class="modalAyuda">Si tienes más preguntas, contáctanos en <a href="mailto:soporte@tusitio.com">fitplangains@gmail.com</a></p>
                </footer>
            </body>
    ';

  modalLargoComun($IDModalComun1, $contenidoModalComun1);
  //Fin modal ayuda 
  


  //Modal contacto
  $IDModalComun2 = "modalContacto";
  $contenidoModalComun2 = '
      <body class="modalContacto">
        <div class="modalContacto content">
            <h1 class="modalContacto logo text-white">Contacto <span>FitPlanGains</span></h1>
            <div class="modalContacto contact-wrapper animated bounceInUp">
                <div class="modalContacto contact-form">
                    <h3 class="modalContacto text-white">Contacto</h3>
                    <form class="modalContacto" action="">
                        <p class="modalContacto text-white">
                            <label>Nombre Completo</label>
                            <input type="text" name="fullname">
                        </p>
                        <p class="modalContacto text-white">
                            <label>Email</label>
                            <input type="email" name="email">
                        </p>
                        <p class="modalContacto text-white">
                            <label>Numero de telefono</label>
                            <input type="tel" name="phone">
                        </p>
                    
                        <p class="modalContacto block text-white">
                          <label>Mensaje</label> 
                            <textarea name="message" rows="3"></textarea>
                        </p>
                        <p class="modalContacto block text-white">
                            <button>
                                Enviar
                            </button>
                        </p>
                    </form>
                </div>
                <div class="modalContacto contact-info">  
                    <h4 class="modalContacto text-white">Mas informacion</h4>
                    <ul class="modalContacto text-white">
                        <li><i class="fas fa-map-marker-alt"></i>Ing. Marconi 745</li>
                        <li><i class="fas fa-phone"></i>77777777</li>
                        <li><i class="fas fa-envelope-open-text"></i>maurosnack2004@gmail.com</li>
                    </ul>
                    <p class="modalContacto text-white">Nuestros agentes responderán a la brevedad posible, generalmente en un plazo de 24 a 48 horas. Para asistencia urgente, llámanos al 7777-7777 durante nuestro horario de atención. De Lunes a Viernes de 08 a 20 hs.</p>
                    <p class="modalContacto text-white">FitPlanGains.com</p>
                </div>
            </div>
        </div>
    </body>
    ';

  modalLargoComun($IDModalComun2, $contenidoModalComun2);
  //Fin modal contacto 
  

  //Modal recuperar contraseña 
  //Modal pedir email para recuperar contraseña
  $IDModalChico2 = "modalRecuperar";
  $tituloModalChico1 = "Recuperar Contraseña";
  $contenidoModalChico1 = '
        <div class="formTotal">
          <form action="" method="POST">
            <label for="email">Ingrese su Correo Electronico</label>
            <input type="text" name="email" id="email">
          
            <button type="submit" name="recuperar">Recuperar</button>
          </form>
        </div>
  ';
  modalChicoComun($IDModalChico2, $tituloModalChico1, $contenidoModalChico1);
  //Fin
  
  //Modal recuperar contraseña
  $IDModalChico2 = "modalRecuperarFin";
  $tituloModalChico2 = "Recuperar Contraseña";
  $contenidoModalChico2 = '
        <div class="formTotal">
          <form action="" method="POST">
            <label for="newContrasenia"> Introduzca la nueva contraseña</label>
            <input type="password" name="newContra" id="newContra">

            <label for="newContrasenia"> Confirme la nueva contraseña</label>
            <input type="password" name="newContraConf" id="newContraConf">

            <button type="submit" name="recuperarFin">Recuperar</button>
          </form>
        </div>
        ';
  modalChicoComun($IDModalChico2, $tituloModalChico2, $contenidoModalChico2);
  //Fin
//Fin modal recuperar contraseña 
  
  ?>

  <!-- Modal configuracion de usuario -->
  <div class="modal fade bd-modal-config-lg" tabindex="-1" role="dialog" aria-labelledby="modalConfiguracionLabel"
    aria-hidden="true" id="modalConfiguracion">
    <div class="modal-dialog modal-lg">
      <div class="modal-content modalConfiguracion">
        <h1>Configuracion de Usuario</h1>
        <a>La contraseña y el email no pueden modificarse directamente, esto para evitar problemas de seguridad</a>
        <?php
        $consulta = "SELECT * FROM usuarios WHERE ID_user = '" . $_SESSION['ID_user'] . "'";
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado) {
          $fila = mysqli_fetch_assoc($resultado);
          $idConfig = $fila['ID_user'];
          $usuarioConfig = $fila['Usuario'];
          $imagenConfig = $fila['Img_u'];
        }
        echo '
          <div class="formTotal">
              <form action="" method="POST" enctype="multipart/form-data"> 
                <label for="usuarioConfig" class="form-label text-white">Usuario:</label>
                <input type="text" id="usuarioConfig" name="usuarioConfig" class="form-control" value="' . $usuarioConfig . '"

                <label for="imgConfig" class="form-label text-white">Imagen de perfil:</label>
                <img src="imagenes/imagenes_perfil/' . $imagenConfig . '">
                <input type="file" id="imgConfig" name="imgConfig" class="form-control">

                <button type="submit" name="configuracionUsuario">Guardar</button> 
              </form>
          </div>';
        ?>
      </div>
    </div>
  </div>

<!-- Bienvenida a la pagina e informacion del uso de la página -->
<div class="bienvenidaCont">
  <?php
sliderInicio();
?>
</div>
<!-- Fin -->

<div class="linea_separadora">
</div>


<!-- Contenedor tarjetas -->
<div class="container_tarjetas" id="planes">
  <div class="image-container">
    <!-- Imagen plan alimentacion -->
    <span class="tarjetas_titulo mb-auto fs-3 text-white fw-medium">Plan Alimentación</span>
    <div class="tarjetas_contenido">
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalInicio">
        <img class="image" src="imagenes/plancha.jpg" alt="Image 1">
        <div class="square" onclick="redirectToPedirDatos()">
          <a href="#" data-bs-toggle="modal" data-bs-target="#modalInicio">Comienza tu camino por una alimentación
            saludable y una vida mejor.</a>
        </div>
      </a>
    </div>
  </div>
  <div class="image-container">
    <!-- Imagen foro -->
    <span class="tarjetas_titulo text-white fs-3 fw-medium">Foro</span>
    <div class="tarjetas_contenido">
      <a href="foro/publicaciones.php">
        <img class="image" src="imagenes/foro.jpg" alt="Image 2">
        <div class="square" onclick="redirectToPedirDatos()">
          <a href="foro/publicaciones.php">Ingresa a nuestro foro para compartir experiencias con otros apasionados
            por el
            gym.</a>
        </div>
      </a>
    </div>
  </div>
  <div class="image-container">
    <!-- Imagen rutinas -->
    <span class="tarjetas_titulo text-white fs-3 fw-medium">Rutinas</span>
    <div class="tarjetas_contenido">
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalInicio">
        <img class="image" src="imagenes/nubes.jpg" alt="Image 1">
        <div class="square" onclick="redirectToPedirDatos()">
          <a href="#" data-bs-toggle="modal" data-bs-target="#modalInicio">Comienza tu camino por una alimentación
            saludable y una vida mejor.</a>
        </div>
      </a>
    </div>
  </div>
</div>
<!-- Fin contenedor de tarjetas -->


  <footer>

  </footer>


  <!-- Scripts (bootstrap, transition header, etc) -->
  <script src="js/sliders.js"></script>
  <script src="js/stickyHeader.js"></script>
  <script src="js/registro.js"></script>
  <script src="js/modalRedireccion.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  <script type="text/javascript"></script>

</body>
</html>