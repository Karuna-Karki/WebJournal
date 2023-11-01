// JavaScript to control the image slider

const openSliderButton = document.getElementById("openSlider");
const closeSliderButton = document.getElementById("closeSlider");
const imageSlider = document.getElementById("imageSlider");
const sliderImages = document.querySelectorAll(".slider-img");
let currentSlide = 0;

openSliderButton.addEventListener("click", () => {
    imageSlider.style.display = "block";
    showSlide(currentSlide);
});

closeSliderButton.addEventListener("click", () => {
    imageSlider.style.display = "none";
});

function showSlide(slideIndex) {
    if (slideIndex < 0) {
        currentSlide = sliderImages.length - 1;
    } else if (slideIndex >= sliderImages.length) {
        currentSlide = 0;
    }
    sliderImages.forEach((img) => img.style.display = "none");
    sliderImages[currentSlide].style.display = "block";
    sliderImages[currentSlide].classList.add("fade-in");
}

const prevSlideButton = document.getElementById("prevSlide");
prevSlideButton.addEventListener("click", () => {
    currentSlide--;
    showSlide(currentSlide);
});

const nextSlideButton = document.getElementById("nextSlide");
nextSlideButton.addEventListener("click", () => {
    currentSlide++;
    showSlide(currentSlide);
});
