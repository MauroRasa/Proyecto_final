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
        <p>FitPlanGains Rutinas </p>
        <p class="subTitulo"> Con nuestras rutinas puedes alcanzar tu mayor potencial para verte bien no solo con vos mismo, sino para vos mismo. </p> 
      </div>
    </div>
    <div class="slider__element slider__element--consejo2">
        <img src="imagenes/sliderImg7.jpg" alt="bienvenida2"></img>
        <div class="texto-superpuesto">
          <p>FitPlanGains Red Social y Foro</p>
          <p class="subTitulo">Comparte tus experiencias con otra gente y obtén ayuda de la comunidad. Crea tus propios Eyeslash para conversar con tus amigos.</p> 
        </div> 
        <div class="circulon">
          <div class="circle">
              10/10
              <div class="text">10 de cada 10 personas creen que nuestros planes les ayudaron personalmente</div>
            </div>
            <div class="circle">
              10/10
              <div class="text">10 de cada 10 personas creen que nuestros planes cambiaron su fisico</div>
            </div>
            <div class="circle">
              10/10
              <div class="text">10 de cada 10 personas creen que usar nuestros planes mejoraron su autoestima</div>
            </div>
        </div>
        <div class="botonRedireccion">
          <button >
            Empezar
          </button>
        </div>
    </div>
    <div class="slider__element slider__element--consejo3">
        <img src="imagenes/sliderImg3.jpg" alt="bienvenida3"></img>
        <div class="texto-superpuesto">
        <p>FitPlanGains Alimentación </p>
        <p class="subTitulo"> Con nuestras rutinas puedes alcanzar tu mayor potencial para verte bien no solo con vos mismo, sino para vos mismo. </p> 
      </div>
    </div>
    <div class="slider__element slider__element--consejo4">
        <img src="imagenes/sliderImg1.jpg" alt="bienvenida4"></img>
        <div class="texto-superpuesto">
        <p>FitPlanGains Rutinas </p>
        <p class="subTitulo"> Con nuestras rutinas puedes alcanzar tu mayor potencial para verte bien no solo con vos mismo, sino para vos mismo. </p> 
      </div>
    </div>
    <div class="slider__element slider__element--consejo2">
        <img src="imagenes/sliderImg7.jpg" alt="bienvenida2"></img>
        <div class="texto-superpuesto">
        <p>FitPlanGains Red Social y Foro</p>
        <p class="subTitulo">Comparte tus experiencias con otra gente y obtén ayuda de la comunidad. Crea tus propios Eyeslash para conversar con tus amigos.</p> 
      </div>
    </div>
    <div class="slider__element slider__element--consejo3">
        <img src="imagenes/sliderImg3.jpg" alt="bienvenida3"></img>
        <div class="texto-superpuesto">
        <p>FitPlanGains Alimentacion </p>
        <p class="subTitulo"> Con nuestras rutinas puedes alcanzar tu mayor potencial para verte bien no solo con vos mismo, sino para vos mismo. </p> 
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