<?php
function modalInicio(){
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
}

function modalRegistro(){
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
}

function modalAyuda(){
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
                    <p class="modalAyuda">Si tienes más preguntas, contáctanos en <a href="mailto:info@fitplangains.com">info@fitplangains.com</a></p>
                </footer>
            </body>
    ';

  modalLargoComun($IDModalComun1, $contenidoModalComun1);
}

function modalContacto(){
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
                          <li><i class="fas fa-envelope-open-text"></i>info@fitplangains.com</li>
                      </ul>
                      <p class="modalContacto text-white">Nuestros agentes responderán a la brevedad posible, generalmente en un plazo de 24 a 48 horas. Para asistencia urgente, llámanos al 7777-7777 durante nuestro horario de atención. De Lunes a Viernes de 08 a 20 hs.</p>
                      <p class="modalContacto text-white">FitPlanGains.com</p>
                  </div>
              </div>
          </div>
      </body>
      ';
  
    modalLargoComun($IDModalComun2, $contenidoModalComun2);
}

function modalPedirMailRecuperarContra(){
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
}

function modalRecuperarContra(){
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
}

function modalConfiguracionUsuario(){
include('conexion.php');
echo' <div class="modal fade bd-modal-config-lg" tabindex="-1" role="dialog" aria-labelledby="modalConfiguracionLabel"
    aria-hidden="true" id="modalConfiguracion">
    <div class="modal-dialog modal-lg">
      <div class="modal-content modalConfiguracion">
        <h1>Configuracion de Usuario</h1>
        <a>La contraseña y el email no pueden modificarse directamente, esto para evitar problemas de seguridad</a>';
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
    echo '</div>
    </div>
  </div>';
}
?>