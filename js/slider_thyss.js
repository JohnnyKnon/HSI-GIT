// Auto slider
var slideIndex = 0;
showSlidesThyss();

function showSlidesThyss() {
  var i;
  var slides = document.getElementsByClassName("mySlides-thyss");
  var dots = document.getElementsByClassName("dot-thyss");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace("active-thyss", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 3 seconds
}