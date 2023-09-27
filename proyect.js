function redirectToPedirDatos() {
    window.location.href = 'foro/index.php';
  }


//   Slider
document.addEventListener("DOMContentLoaded", function () {
  
let currentIndex = 0;
const sections = document.querySelectorAll('.slider-section');
const totalSections = sections.length;

document.getElementById('prevBtn').addEventListener('click', () => {
  slideLeft();
});

document.getElementById('nextBtn').addEventListener('click', () => {
  slideRight();
});

function slideLeft() {
  currentIndex = (currentIndex - 1 + totalSections) % totalSections;
  updateSlider();
}

function slideRight() {
  currentIndex = (currentIndex + 1) % totalSections;
  updateSlider();
}

function updateSlider() {
  const track = document.querySelector('.slider-track');
  track.style.transform = `translateX(-${currentIndex * 16.6667}%)`;
}
});

//   Fin Slider