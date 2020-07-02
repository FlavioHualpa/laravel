(function hookQuantityEvents()
{
   let oldValue;

   // 
   // Definimos aquí los eventos
   // de las cajas de ingreso de cantidades
   //

   $('.quantity-input')
      
      //=================================//
      .on('change',
         (ev) => {
            
            let custId = $('#content')[0]
               .getAttribute('data-customer-id')
            
            let box = $(ev.target)

            let prodId = box
               .closest('.airi-product')
               .attr('data-product-id')
            
            let qtty = parseInt(box.val())

            let multiplo = parseInt(box.attr('step'))

            if (isNaN(qtty) || qtty < 0)
            {
               toast('error', 'Error!', 'El valor ingresado no es válido')
               box.val(oldValue)
            }
            else if (qtty == 0)
            {
               toast('success', 'Éxito!', 'Producto eliminado del pedido')
               asyncRemoveItem(custId, prodId)
            }
            else if (qtty % multiplo != 0)
            {
               toast('error', 'Error!', `La cantidad debe ser múltiplo de ${multiplo}`)
               box.val(oldValue)
            }
            else
            {
               toast('success', 'Éxito!', 'Producto agregado al pedido')
               asyncAddItem(custId, prodId, qtty)
            }

            // ev.preventDefault()

            // console.log(`Customer id: ${custId}`)
            // console.log(`Product id: ${prodId}`)
            // console.log(`Cantidad: ${qtty}`)
            // console.log(`---------------------------`)
         
         }
      )
         
      //=================================//
      .on('keypress',
         (ev) => {
         
            if (ev.keyCode < 48 || ev.keyCode > 57)
               ev.preventDefault()
         
         }
      )

      //=================================//
      .on('focus',
         (ev) => {

            oldValue = $(ev.target).val();

         }
      )

})()

function toast(icon, headingText, contentText)
{
   $.toast({
      heading: headingText,
      text: contentText,
      showHideTransition: 'slide',
      icon: icon,
      loader: false,
      position: 'bottom-right'
   })
}

function asyncAddItem(custId, prodId, qtty)
{
   let token = $('[name=csrf-token]').attr('content')
   
   axios(
      {
         url: '/app/pedido/agregar',
         headers: { 'X-CSRF-Token': token },
         method: 'post',
         data: {
            _token: token,
            id_cliente: custId,
            id_producto: prodId,
            cantidad: qtty
         }
      }
   )
}

function asyncRemoveItem(custId, prodId)
{
   let token = $('[name=csrf-token]').attr('content')

   axios(
      {
         url: '/app/pedido/quitar',
         headers: { 'X-CSRF-Token': token },
         method: 'post',
         data: {
            _token: token,
            id_cliente: custId,
            id_producto: prodId
         }
      }
   )
}
