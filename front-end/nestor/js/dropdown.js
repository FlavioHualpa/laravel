function enableDropDownMenu()
{
   const dropDownButton = document.querySelector('i.fa-bars')
   const dropDownMenu = document.querySelector('.drop-down-menu')
   const body = document.querySelector('body')

   dropDownButton.addEventListener(
      'click',
      function () {
         dropDownMenu.style.display =
            (dropDownMenu.style.display == 'block') ? 'none' : 'block'
         event.stopPropagation()
      }
   )

   body.addEventListener(
      'click',
      function () {
         dropDownMenu.style.display = ''
      }
   )
}

function enableMenuSliding()
{
   const slider = document.querySelector('.slider')
   let sliding = false
   let lastX
   let trans
   let menuWidth
   let minTrans

   slider.style.setProperty('margin-left', '0px')
   menuWidth = 30

   for (li of slider.querySelector('ul').children)
      menuWidth += li.clientWidth
   
   minTrans = Math.min(document.body.clientWidth - menuWidth, 0)

   slider.addEventListener(
      'touchstart',
      (ev) =>
      {
         sliding = true
         lastX = ev.changedTouches[0].clientX
      }
   )

   slider.addEventListener(
      'touchmove',
      (ev) =>
      {
         if (sliding)
         {
            let dx = ev.changedTouches[0].clientX - lastX
            lastX = ev.changedTouches[0].clientX
            trans = parseInt(
               slider.style.getPropertyValue('margin-left')
            )

            if (trans + dx > 0) {
               trans = 0
            }
            else if (trans + dx < minTrans) {
               trans = minTrans
            }
            else {
               trans += dx
            }

            slider.style.setProperty('margin-left', trans + 'px')
         }
      }
   )

   slider.addEventListener(
      'touchend',
      (ev) =>
      {
         sliding = false
      }
   )
}
