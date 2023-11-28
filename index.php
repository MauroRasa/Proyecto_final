<?php
include('conexion.php');
require_once('include/modal.php');
require_once('include/verificacionesPost.php');
require_once('include/slider.php');
require_once('include/insertarModals.php');
require_once('include/footer.php');
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
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="app.php">App</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="foro/publicacionesForo.php">Foro</a>
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
                  </a>
                </li>
                <li><a class="dropdown-item btn btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#modalContacto">
                    Contacto
                  </a>
                </li>
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

<!-- Bienvenida a la pagina e informacion del uso de la página -->
<div class="bienvenidaCont">
<?php
  sliderInicio();
?>
</div>
<!-- Fin -->

<div class="linea_separadora">
</div>

<div class="parteDos">
  <img src="imagenes/sliderImg5.jpg" alt="Imagen" class="imagen">
  <div class="texto">
      <h2>El trabajo arduo siempre es recompensado, enfocate en tus objetivos y tus metas se verán cada día mas cerca.</h2>
      <p>Nuestra web está destinada a las personas que quieren integrarse en el mundo del fitness y no sabe cómo. Queremos que puedan tener herramientas para poder desarrollarse en el gimnasio y una comunicación cercana con otras personas en su misma situación, para qu epuedan ayudarse entre sí y así lograr que la convivencia con el gimnasio sea algo que disfrutar.</p>
  </div>
</div>

<div class="parteDos">
  <img src="imagenes/qr_app.jpg" alt="Imagen" class="imagen">
  <div class="texto">
      <h2>Prueba nuestra App para poder llevar al gimnasio todos lados los conocimientos que necesitas para desempeñarte de la mejor manera.</h2>
  </div>
</div>

<?php
  footer();
?>

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

  <?php 
  // Todos los modals
  modalInicio();
  modalRegistro();
  modalPedirMailRecuperarContra();
  modalRecuperarContra();
  modalConfiguracionUsuario();

  modalAyuda();
  modalContacto();
  ?>
</body>
</html>