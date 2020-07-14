(function progressBar() {
   const pb = document.querySelector('.bar .progress')
   let listening = false
   let value = 1

   document.body.addEventListener(
      'keypress',
      onKeyPress
   )

   function stepUp() {
      pb.style.width = value + '%';
      if (value < 100) {
         value++
         setTimeout(stepUp, 15)
      }

      // terminó el tiempo de espera
      listening = false
   }

   function onKeyPress() {
      value = 0

      if (listening === false) {
         listening = true
         setTimeout(stepUp, 15)
      }
   }
}
)()
