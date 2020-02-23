window.onload = function () {
   var imagenes = document.querySelector('.frame').children;
   var currentImg = 0;
   var totalImg = imagenes.length;

   for (const img of imagenes) {
      img.style.opacity = 0;
   }

   imagenes[currentImg].style.opacity = 1;
   var trans = setInterval(cambiarDeImagen, 3000);

   function cambiarDeImagen() {
      imagenes[currentImg].style.opacity = 0;
      currentImg++;
      if (currentImg == totalImg) {
         currentImg = 0;
      }
      imagenes[currentImg].style.opacity = 1;
   }
}
