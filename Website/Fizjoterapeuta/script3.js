document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.overlay-text').style.opacity = 1;
    document.querySelector('.overlay-buttons').style.opacity = 1;
  });
  
  
  let currentImage = 0;
  const images = ["gabinetniebieski.png", "gabinetniebieski2.png", "gabinetniebieski3.png", "gabinetniebieski4.png"];
  
  function changeImage() {
      currentImage = (currentImage + 1) % images.length;
      document.getElementById('rotating-image').src = images[currentImage];
  }
  
  setInterval(changeImage, 3000);
  