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
      </div>
    </div>
    <div class="slider__element slider__element--consejo2">
        <img src="imagenes/sliderImg2.jpg" alt="bienvenida2"></img>
        <div class="texto-superpuesto">
            <p>Hola</p> 
        </div>
    </div>
    <div class="slider__element slider__element--consejo3">
        <img src="imagenes/sliderImg3.jpg" alt="bienvenida3"></img>
        <div class="texto-superpuesto">
            <p>Hola</p> 
        </div>
    </div>
    <div class="slider__element slider__element--consejo4">
        <img src="imagenes/sliderImg4.jpg" alt="bienvenida4"></img>
        <div class="texto-superpuesto">
            <p>Hola</p> 
        </div>
    </div>
    <div class="slider__element slider__element--consejo5">
        <img src="imagenes/sliderImg5.jpg" alt="bienvenida5"></img>
        <div class="texto-superpuesto">
            <p>Hola</p> 
        </div>
    </div>
    <div class="slider__element slider__element--consejo6">
        <img src="imagenes/sliderImg6.jpg" alt="bienvenida6"></img>
        <div class="texto-superpuesto">
            <p>Hola</p> 
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