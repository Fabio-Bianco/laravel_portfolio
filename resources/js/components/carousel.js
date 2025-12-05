// CAROUSEL FUNZIONANTE
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlide(n) {
  slides.forEach(slide => slide.classList.remove('active'));
  if (slides[n]) {
    slides[n].classList.add('active');
  }
}

function changeSlide(direction) {
  currentSlide += direction;
  
  if (currentSlide >= totalSlides) {
    currentSlide = 0;
  }
  if (currentSlide < 0) {
    currentSlide = totalSlides - 1;
  }
  
  showSlide(currentSlide);
}

// Auto scroll
setInterval(() => {
  changeSlide(1);
}, 4000);