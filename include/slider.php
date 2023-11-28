<?php
function sliderInicio(){
echo '
<div id="slider-container" class="slider_container">
  <button id="button-left" class="button-slider button--left">
    <span class="material-symbols-outlined">
      chevron_left
    </span>
  </button>
  <div id="slider" class="slider">
    <div class="slider__element slider__element--consejo1">
      <img src="imagenes/sliderImg1.jpg" alt="bienvenida1"></img>
      <div class="texto-superpuesto">
        <p class="titulo">FitPlanGains Rutinas </p>
        <p class="subTitulo">Mira nuestros videos para poder saber como hacer tus rutinas de forma práctica y sencilla.</p> 
      </div>
      <div class="circulon">
        <div class="circle">
            10/10
            <div class="text">10 de cada 10 personas creen que el ejercicio les ayudaro personalmente</div>
          </div>
          <div class="circle">
            10/10
            <div class="text">10 de cada 10 personas creen que el ejercicio cambió su fisico</div>
          </div>
          <div class="circle">
            10/10
            <div class="text">10 de cada 10 personas creen que hacer ejercicios mejoró su autoestima</div>
          </div>
      </div>
      <div class="botonRedireccion">
        <a href="rutinas.php" class="botonEmpezar">
          Empezar
        </a>
      </div>
    </div>
    <div class="slider__element slider__element--consejo2">
      <img src="imagenes/sliderImg7Cort.jpg" alt="bienvenida2"></img>
      <div class="texto-superpuesto">
        <p class="titulo">FitPlanGains Red Social y Foro</p>
        <p class="subTitulo">Comparte tus experiencias con otra gente y obtén ayuda de la comunidad. Crea tus propios Eyeslash para conversar con tus amigos.</p> 
      </div>
      <div class="iconosConsejo2">
        <div class="iconotexto">
            <span class="material-symbols-outlined">forum</span>
            <p>Resuelve tus consultas en nuestro foro, donde nuestra comunidad te ayudará en lo que necesites.</p>
        </div>
        <div class="iconotexto">
            <span class="material-symbols-outlined">groups</span>
            <p>Pasa el tiempo viendo lo que otra gente tiene para decir en nuestra red social.</p>
        </div>
        <div class="iconotexto">
            <span class="material-symbols-outlined">notes</span>
            <p>Crea tus eyeslash para tener mas privacidad a la hora de hablar con tus amigos.</p>
        </div>
      </div>
      <div class="botonRedireccion">
          <a href="foro/publicaciones.php" class="botonEmpezar">
              Empezar
          </a>
      </div> 
    </div>
    <div class="slider__element slider__element--consejo3">
        <img src="imagenes/sliderImg3Cort.jpg" alt="bienvenida3"></img>
        <div class="texto-superpuesto">
        <p class="titulo">FitPlanGains Alimentación </p>
        <p class="subTitulo"> Con nuestras rutinas puedes alcanzar tu mayor potencial para verte bien no solo con vos mismo, sino para vos mismo. Prueba nuestra sofisticada tecnología para obtener consejos y opciones de comidas en el momento, especialmente seleccionadas para vos.</p> 
      </div>
      <div class="botonRedireccion">
        <a href="alimentacion.php" class="botonEmpezar">
          Empezar
        </a>
      </div>
    </div>
    <div class="slider__element slider__element--consejo1">
      <img src="imagenes/sliderImg1.jpg" alt="bienvenida1"></img>
      <div class="texto-superpuesto">
        <p class="titulo">FitPlanGains Rutinas </p>
        <p class="subTitulo"> Con nuestras rutinas puedes alcanzar tu mayor potencial para verte bien no solo con vos mismo, sino para vos mismo. </p> 
      </div>
      <div class="circulon">
        <div class="circle">
            10/10
            <div class="text">10 de cada 10 personas creen que el ejercicio les ayudaro personalmente</div>
          </div>
          <div class="circle">
            10/10
            <div class="text">10 de cada 10 personas creen que el ejercicio cambió su fisico</div>
          </div>
          <div class="circle">
            10/10
            <div class="text">10 de cada 10 personas creen que hacer ejercicios mejoró su autoestima</div>
          </div>
      </div>
      <div class="botonRedireccion">
        <a href="rutinas.php" class="botonEmpezar">
          Empezar
        </a>
      </div>
    </div>
    <div class="slider__element slider__element--consejo2">
      <img src="imagenes/sliderImg7Cort.jpg" alt="bienvenida2"></img>
      <div class="texto-superpuesto">
        <p class="titulo">FitPlanGains Red Social y Foro</p>
        <p class="subTitulo">Comparte tus experiencias con otra gente y obtén ayuda de la comunidad. Crea tus propios Eyeslash para conversar con tus amigos.</p> 
      </div>
      <div class="iconosConsejo2">
        <div class="iconotexto">
            <span class="material-symbols-outlined">forum</span>
            <p>Resuelve tus consultas en nuestro foro, donde nuestra comunidad te ayudará en lo que necesites.</p>
        </div>
        <div class="iconotexto">
            <span class="material-symbols-outlined">groups</span>
            <p>Pasa el tiempo viendo lo que otra gente tiene para decir en nuestra red social.</p>
        </div>
        <div class="iconotexto">
            <span class="material-symbols-outlined">notes</span>
            <p>Crea tus eyeslash para tener mas privacidad a la hora de hablar con tus amigos.</p>
        </div>
      </div>
      <div class="botonRedireccion">
          <a href="foro/publicaciones.php" class="botonEmpezar">
              Empezar
          </a>
      </div> 
    </div>
    <div class="slider__element slider__element--consejo3">
        <img src="imagenes/sliderImg3Cort.jpg" alt="bienvenida3"></img>
        <div class="texto-superpuesto">
          <p class="titulo">FitPlanGains Alimentacion </p>
          <p class="subTitulo"> Con nuestras rutinas puedes alcanzar tu mayor potencial para verte bien no solo con vos mismo, sino para vos mismo. Prueba nuestra sofisticada tecnología para obtener consejos y opciones de comidas en el momento, especialmente seleccionadas para vos.</p> 
        </div>
        <div class="botonRedireccion">
          <a href="alimentacion.php" class="botonEmpezar">
              Empezar
          </a>
        </div>
    </div>
  </div>
  <button id="button-right" class="button-slider button--right">
    <span class="material-symbols-outlined">
      navigate_next
    </span>
  </button>
</div>
';
}
?>