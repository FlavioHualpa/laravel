var input = document.querySelector('input[type=file]');
var image = document.querySelector('img');

input.addEventListener(
   'change',
   function () {
      let reader = new FileReader();

      reader.addEventListener(
         'load',
         function () {
            // console.log(reader.result);
            image.src = reader.result;
         }
      );

      let data = reader.readAsDataURL(input.files[0]);
   }
);
