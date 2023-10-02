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


var videos = document.querySelectorAll("video");

videos.forEach(function(video) {
  video.addEventListener("play", function() {
    video.removeAttribute("controls");
  });
});



// Obtén todos los elementos de video
videoss = document.querySelectorAll('.slide video');

// Función para pausar todos los videos
function pauseVideos() {
  videoss.forEach((video) => {
    video.pause();
  });
}

// Función para reproducir un video específico
function playVideo(videoId) {
  const video = document.getElementById(videoId);
  if (video) {
    video.play();
  }
}

// Inicia la animación
const slider = document.getElementById('video-slider');
let currentIndexx = 0;

function animateSlider() {
  pauseVideos(); // Pausa todos los videos antes de avanzar
  currentIndexx = (currentIndexx + 1) % videoss.length;
  playVideo(`video${currentIndexx + 1}`);
  slider.style.transform = `translateX(calc(-500px * ${currentIndexx}))`;

  setTimeout(() => {
    animateSlider();
  }, 5000); // 5 segundos de pausa antes de avanzar nuevamente
}

animateSlider(); // Inicia la animación
