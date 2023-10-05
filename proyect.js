//   Slider
const sliderContainer = document.getElementById('slider-container');
const slider = document.getElementById('slider');
const buttonLeft = document.getElementById('button-left');
const buttonRight = document.getElementById('button-right');

const rootStyles = document.documentElement.style;

const sliderElements = document.querySelectorAll('.slider__element')

let slideCounter = 0;

let isInTransition = false;

const DIRECTION ={
  RIGHT:'RIGHT',
  LEFT:'LEFT'
}

const getTransformValue = () => 
  Number(rootStyles.getPropertyValue('--slide-transform').replace('px', ''));

const reorderSlider = () =>{
  const transformValue = getTransformValue();
  rootStyles.setProperty('--transition', 'none')
  if(slideCounter === sliderElements.length - 1){
    slider.appendChild(slider.firstElementChild);
    rootStyles.setProperty('--slide-transform', `${transformValue + sliderElements[slideCounter].scrollWidth}px`);
    slideCounter --;
  }else if(slideCounter === 0){
    slider.prepend(slider.lastElementChild)
    rootStyles.setProperty('--slide-transform', `${transformValue - sliderElements[slideCounter].scrollWidth}px`);
    slideCounter ++;
  }

  isInTransition = false
}

const moveSlide = direction =>{
  if(isInTransition) return 
  const transformValue = getTransformValue();
  rootStyles.setProperty('--transition', 'transform 1s')
  isInTransition = true
  if(direction === DIRECTION.LEFT){
    rootStyles.setProperty('--slide-transform', `${transformValue + sliderElements[slideCounter].scrollWidth}px`);
    slideCounter --;
  }else if(direction === DIRECTION.RIGHT){
    rootStyles.setProperty('--slide-transform', `${transformValue - sliderElements[slideCounter].scrollWidth}px`);
    slideCounter ++;
  }
};

buttonRight.addEventListener('click', () => moveSlide(DIRECTION.RIGHT))
buttonLeft.addEventListener('click', () => moveSlide(DIRECTION.LEFT))


slider.addEventListener('transitionend', reorderSlider)

reorderSlider();

//   Fin Slider


// Configuración del slider
const intervalTime = 3000; 
let autoSlideInterval;

// Función para mover el slider automáticamente hacia la derecha
const autoSlideRight = () => {
  moveSlide(DIRECTION.RIGHT);
}

// Iniciar el slider automático
const startAutoSlide = () => {
  autoSlideInterval = setInterval(autoSlideRight, intervalTime);
}

// Detener el slider automático
const stopAutoSlide = () => {
  clearInterval(autoSlideInterval);
}

// Agregar listeners para detener el slider automático cuando el mouse está encima del slider
sliderContainer.addEventListener('mouseenter', stopAutoSlide);
sliderContainer.addEventListener('mouseleave', startAutoSlide);

// Iniciar el slider automático
startAutoSlide();





// Slider de videos presentado la pagina

// Eliminar controles de reproduccion
var videos = document.querySelectorAll("video");

videos.forEach(function(video) {
video.addEventListener("play", function() {
    video.removeAttribute("controls");
    video.style.pointerEvents = "none";
});
});

// FinSlider de videos presentado la pagina