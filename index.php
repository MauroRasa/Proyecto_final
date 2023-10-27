<?php
include ('conexion.php');
session_start();

if (isset($_SESSION['usuario'])) {
  $consulta = "SELECT Img_u FROM usuarios WHERE usuario = '" . $_SESSION['usuario'] . "'";
  $resultado = mysqli_query($conexion, $consulta);
  if ($resultado) {
      $fila = mysqli_fetch_assoc($resultado);
      $img = $fila['Img_u'];
      $imagen_perfil = '
      <li class="icononav-item dropdown">
        <a class="icononav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../imagenes/imagenes_perfil/'.$img.'" id="imagen_perfil_header">
        </a>
        <ul class="dropdown-menu dropdown-menu-end bg-transparent">
          <li>
            <a class="dropdown-item btn btn-primary" href="logout.php" type="button">
            SALIR
            </a>
          </li>
          <li>
          <a class="dropdown-item btn btn-primary" type="button">
            CONFIG
          </a>
        </li>
      </ul>
      </li>';
  }
} else {
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!-- GOOGLE FONTs -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- ANIMATE CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>

<body class="toda_la_pagina">

<header class="navbar_header_sticky">
    <nav class="navbar navbar-expand-lg shadow">
      <div class="container-fluid">
        <a class="navbar-brand fs-2 fw-medium d-lg-block" href="#index.php">
          <img class="d-inline-block logo-color d-none" src="imagenes/logo_vacio.png" alt="Logo en color" width="60" height="60">
          <img class="d-inline-block logo-blanco d-none" src="imagenes/logo_vacio_blanco.png" alt="Logo blanco" width="60" height="60">
          <img class="d-inline-block logo-color_chico d-none" src="imagenes/Logo.png" alt="Logo-chico" width="60" height="60">
          <img class="d-inline-block logo-blanco_chico d-none" src="imagenes/Logo_blanco.png" alt="Logo-blanco-chico" width="60" height="60">
          <span class="d-none d-lg-inline">FitPlanGains</span>
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Nosotros
              </a>
              <ul class="dropdown-menu bg-transparent">
                <li><a class="dropdown-item btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalAyuda">
                  Ayuda
                </a></li>
                <li><a class="dropdown-item btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalContacto">
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

  <script id="embedai" src="https://embedai.thesamur.ai/embedai.js" data-id="fitplangains"></script>

<!-- Modal de inicio de sesion y registro -->

<div class="modal fade modal-xl" id="modalInicio" aria-hidden="true" aria-labelledby="modalInicioLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">

            <body class="modalRegistrarse">
            <div class="modalRegistrarse outer-container">
                <div class="modalRegistrarse container">
                    <div class="modalRegistrarse form-container">
                        <h2 class="modalRegistrarse fw-medium text-white">Iniciar Sesion</h2>
                        <form class="modalRegistrarse fw-medium text-white" action="sesion.php" method="POST">
                              <div class="mb-3">
                                <label for="usuario" class="form-label text-white">Usuario:</label>
                                <input type="text" id="usuario" name="usuario" class="form-control">
                              </div>
                      
                              <div class="mb-3">
                                  <label for="password" class="form-label text-white">Contraseña:</label>
                                  <input type="password" id="password" name="password" class="form-control">
                              </div>

                            <a class="btn btn-second fs-6" href="recuperarPass.php">Recuperar Contraseña</a> 
                            <button class="bt btn btn-second" type="submit" name="inicio">Iniciar</but> 
                        </form>
                    </div>   
                    <div class="modalRegistrarse image-container">
                        <img src="imagenes/image.jpg" alt="Imagen">
                        <button class="btn btn-primary position-absolute bottom-0 end-0" data-bs-target="#modalRegistro" data-bs-toggle="modal">Registrarse</button>
                    </div>
                </div>
            </div>
            </body>
        </div>
      </div>
  </div>
</div>
<div class="modal fade modal-xl" id="modalRegistro" aria-hidden="true" aria-labelledby="modalRegistroLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
        <body class="modalRegistrarse">
        <div class="modalRegistrarse outer-container">
              <div class="modalRegistrarse container">
                  <div class="form-container">
                      <h2 class="modalRegistrarse text-center text-white">Registro</h2>
                      <form class="modalRegistrarse fw-medium text-white" action="registro.php" method="POST">
                        <div class="mb-3">
                            <label for="usuario" class="form-label text-white">Usuario:</label>
                            <input type="text" id="usuario" name="usuario" class="form-control" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Contraseña:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email:</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label text-white">Confirmar Contraseña:</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label text-white">Imagen de Perfil:  (Opcional)</label>
                            <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*">
                        </div>
                
                        <button class="bt btn btn-second" type="submit" name="registrarse">Registrarse</button>
                    </form>
                  </div>   
                  <div class="modalRegistrarse image-container position-relative">
                      <img src="imagenes/image.jpg" alt="Imagen">
                      <button class="btn btn-primary position-absolute bottom-0 end-0" data-bs-target="#modalInicio" data-bs-toggle="modal">Iniciar Sesion</button>
                  </div>
              </div>
          </div>
        </body>
    </div>
  </div>
  </div>
</div>


<!-- Fin -->



  <!-- Modal Ayuda-->
  <div class="modal fade" id="modalAyuda" tabindex="-1" aria-labelledby="modalAyudaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalAyudaLabel">El contacto del andy</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalllaaa">
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
        </div>
      </div>
    </div>
  </div>




  <!-- Modal contacto-->
<div class="modal fade" id="modalContacto" tabindex="-1" aria-labelledby="modalContactoLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalContactoLabel">Contacto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
      </div>
    </div>
  </div>
</div>

  <!-- Bienvenida a la pagina e informacion del uso de la página -->


  <div class="bienvenidaCont">
    <p class="texto-bienvenida fs-2 fw-medium text-center">
      Bienvenido a FitPlanGains
    </p>
    <h6 class="texto-bienvenida fs-2 fw-medium text-center">--insertar videos--</h6>
    
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
              <a href="#" data-bs-toggle="modal" data-bs-target="#modalInicio">Comienza tu camino por una alimentación saludable y una vida mejor.</a>
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
            <a href="foro/publicaciones.php">Ingresa a nuestro foro para compartir experiencias con otros apasionados por el
              gym.</a>
          </div>
          </a>
      </div>
    </div>
    <div class="image-container">
      <!-- Imagen plan alimentacion -->
      <span class="tarjetas_titulo text-white fs-3 fw-medium">Rutinas</span>
      <div class="tarjetas_contenido">
          <a href="#" data-bs-toggle="modal" data-bs-target="#modalInicio">
            <img class="image" src="imagenes/nubes.jpg" alt="Image 1">
            <div class="square" onclick="redirectToPedirDatos()">
              <a href="#" data-bs-toggle="modal" data-bs-target="#modalInicio">Comienza tu camino por una alimentación saludable y una vida mejor.</a>
            </div>
          </a>
      </div>
    </div>
  </div>

  <!-- Slider con recomendaciones deportivas y alimenticias -->
  <div id="slider-container" class="slider_container">
    <button id="button-left" class="button-slider button--left">
      <span class="material-symbols-outlined">
        chevron_left
      </span>
    </button>
    <div id="slider" class="slider">
      <div class="slider__element slider__element--consejo1">
        <img src="imagenes/nubes.jpg" alt=""></img>
      </div>
      <div class="slider__element slider__element--consejo2">
        <p>¿No sabes cómo entrenar? Hazte un horario. Piensa en tus objetivos y establece unas rutinas. Para ello, te recomendamos apuntar cuándo quieres ir (antes de ir al trabajo, a la hora de comer, por la tarde, a última hora del día…), cuántas veces por semana realizarás esta rutina (sé sensato y empieza por una rutina de gimnasio para principiantes, siempre podrás aumentar la frecuencia y la dificultad más adelante) y cuánto tiempo durarán las sesiones y cómo estructurarás los ejercicios.</p>
      </div>
      <div class="slider__element slider__element--consejo3">
        <h2></h2>
        <p>Prepáralo todo antes de ir al gym. Aunque parezca una tontería, tener siempre la bolsa preparada te ayudará a vencer la pereza de tener que pasar por casa previamente. ¡No hay tiempo que perder!</p>
      </div>
      <div class="slider__element slider__element--consejo4">
        <h2></h2>
        <p>Confía en ti y en caso de no saber qué es lo que tienes que hacer exactamente, pide ayuda. Existen personal trainners que te ayudarán a realizar los ejercicios más adecuados para ti, teniendo en cuenta tu condición y tus objetivos. No estés más pendiente de los demás que de ti mismo y no te sientas acomplejado: estás en el gimnasio para ponerte en forma y lo lograrás. Si quieres, para empezar, puedes probar de ir a horas más tranquilas, a fin de ir ganando en seguridad y comodidad poco a poco.</p>
      </div>
      <div class="slider__element slider__element--consejo5">
        <h2></h2>
        <p>Calienta siempre antes de iniciar los ejercicios y haz tu rutina preestablecida con ganas.</p>
      </div>
      <div class="slider__element slider__element--consejo6">
        <h2></h2>
        <p>Hidrátate siempre antes y después de tus sesiones de deporte, así evitarás que tu rendimiento físico no disminuya.</p>
      </div>
    </div>
      <button id="button-right" class="button-slider button--right">
        <span class="material-symbols-outlined">
          navigate_next
        </span>
      </button>
  </div>



  <footer>

  </footer>


  <!-- Scripts (bootstrap, transition header, etc) -->
  <script src="proyect.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <script type="text/javascript">


    document.addEventListener("DOMContentLoaded", function() {

      const botonToggler = document.querySelector('.navbar-toggler');
      const logoBlanco = document.querySelector('.logo-blanco');
      const logoBlancoChico = document.querySelector('.logo-blanco_chico');

      if(window.getComputedStyle(botonToggler).display === 'none'){
        logoBlanco.classList.remove("d-none");
      }else{
        logoBlancoChico.classList.remove("d-none");
      }
    });


    window.addEventListener("scroll", function(){
      var header = document.querySelector("header");
      var logoColor = document.querySelector(".logo-color");
      var logoBlanco = document.querySelector(".logo-blanco");

      const botonToggler = document.querySelector('.navbar-toggler');
      const logoColorChico = document.querySelector('.logo-color_chico');
      const logoBlancoChico = document.querySelector('.logo-blanco_chico');

      var backgroundHeader = document.querySelector(".navbar");
      var btnDrop = document.querySelector(".dropdown-menu");
      var sombra = document.querySelector(".navbar");



      header.classList.toggle("abajo",window.scrollY>0);
      if(window.getComputedStyle(botonToggler).display === 'none'){
        logoColorChico.classList.remove('mx-auto');
        logoColorChico.classList.add('d-none');
        logoBlancoChico.classList.add('d-none');
        logoBlanco.classList.add("d-none");
        logoColor.classList.remove("d-none");
      }else{
        logoColorChico.classList.remove('d-none');
        logoColorChico.classList.add('mx-auto');
        logoBlancoChico.classList.remove('mx-auto');
        logoBlancoChico.classList.add('d-none');
        logoBlanco.classList.add("d-none");
        logoColor.classList.add("d-none");
      }

      backgroundHeader.classList.add("bg-secondary");

      btnDrop.classList.remove("bg-transparent");
      btnDrop.classList.add("bg-secondary");

      sombra.classList.remove("shadow");

      if(window.scrollY===0){
        if(window.getComputedStyle(botonToggler).display === 'none'){
          logoColorChico.classList.remove('mx-auto');
          logoColorChico.classList.add('d-none');
          logoBlancoChico.classList.add('d-none');
          logoColor.classList.add("d-none");
          logoBlanco.classList.remove("d-none");
        }else{
          logoBlancoChico.classList.remove('d-none');
          logoBlancoChico.classList.add('mx-auto');
          logoColorChico.classList.remove('mx-auto');
          logoColorChico.classList.add('d-none');
          logoBlanco.classList.add("d-none");
          logoColor.classList.add("d-none");
        }
        
        backgroundHeader.classList.remove("bg-secondary");

        btnDrop.classList.remove("bg-secondary");
        btnDrop.classList.add("bg-transparent");

        sombra.classList.add("shadow");
      }
      });

      // const myModal = document.getElementById('Modal')
      // const myInput = document.getElementById('myInput')

      // myModal.addEventListener('shown.bs.modal', () => {
      //   myInput.focus()
      // })



  </script>
</body>

</html>