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




// Slider de videos presentado la pagina

// Eliminar controles de reproduccion
var videos = document.querySelectorAll("video");

videos.forEach(function(video) {
video.addEventListener("play", function() {
    video.removeAttribute("controls");
    video.style.pointerEvents = "none";
});
});



// modificar mouse y convertirlo en una mano que puede scrollear    
const sliderr = document.querySelector(".sliderr");
let isDragging = false;
let startPosition = 0;
let currentTranslate = 0;

sliderr.addEventListener("mousedown", (e) => {
isDragging = true;
startPosition = e.clientX;
currentTranslate = sliderr.scrollLeft;
sliderr.style.cursor = "grabbing";
});

sliderr.addEventListener("mousemove", (e) => {
if (!isDragging) return;
const deltaX = e.clientX - startPosition;
sliderr.scrollLeft = currentTranslate - deltaX;
});

sliderr.addEventListener("mouseup", () => {
isDragging = false;
sliderr.style.cursor = "grab";
});

sliderr.addEventListener("mouseleave", () => {
isDragging = false;
sliderr.style.cursor = "grab";
});


// FinSlider de videos presentado la pagina