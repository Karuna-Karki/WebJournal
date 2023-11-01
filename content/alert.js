function openPopup() {
    document.getElementById("popup").style.display = "block";
  }
  
  function closePopup() {
    document.getElementById("popup").style.display = "none";

  }
  

  let index = 0;

  function slide(e) {
      index = index + e;
      slideshow(index);
  }
  slideshow(index);
  function slideshow(num) {
      let slides = document.getElementsByClassName("images");

      if (num == slides.length) {
          index = 0;
          num = 0;
      }
      if (num < 0) {
          index = slides.length - 1;
          num = slides.length - 1;

      }

      for (let y of slides) {
          y.style.display = "none";
      }

      slides[num].style.display = "block";

  }

