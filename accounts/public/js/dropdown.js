function setPaymentsDropDownUp()
{
   const ddBtn = document.querySelector('#dropdownMenuLink')
   const ddMenu = document.querySelector('.dropdown-menu')
   const ddLinks = ddMenu.querySelectorAll('a');

   ddBtn.addEventListener(
      'click',
      function () {
         event.preventDefault()
         ddMenu.style.display =
            ddMenu.style.display == 'block' ? 'none' : 'block';         
      }
   )

   ddLinks.forEach(function (link) {
      const onClickHandler = getMenuItemHandler(link)
      link.addEventListener(
         'click',
         function () {
            event.preventDefault()
            ddMenu.style.display = 'none'
            onClickHandler()
         })
   })

   function getMenuItemHandler(link)
   {
      const methodCode = link.getAttribute('data-method-type-code');

      switch (methodCode)
      {
         case 'cash':
            return addCashRow;
         
         case 'check':
            return addCheckRow;
         
         case 'deposit':
            return addDepositRow;
      }
   }
}
