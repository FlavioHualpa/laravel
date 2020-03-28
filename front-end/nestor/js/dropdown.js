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