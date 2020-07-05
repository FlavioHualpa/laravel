(function initializeTotals()
{
   updateCategoryTotals()
   updateOrderTotals()
})();

(function hookSendButtonHandler()
{
   if (! $('#sendButton'))
      return

   $('#sendButton')
      .on('click',
         (ev) => {
            
            ev.preventDefault()

            Swal.fire({
               title: 'Confirmás el envío del pedido?',
               text: 'Luego no se puede modificar',
               icon: 'question',
               showCancelButton: true,
               confirmButtonText: 'Sí',
               cancelButtonText: 'No'
            })

         }
      )
})();

function updateCategoryTotals()
{
   if (! $('.mariscal-totals-box'))
      return
   
   let token = $('[name=csrf-token]').attr('content')

   let categId = $('#content')[0]
      .getAttribute('data-category-id')

   axios({
      'url': '/app/pedido/totalescategoria',
      'method': 'post',
      'data': { 'id_niv3': categId },
      'headers': { 'X-CSRF-TOKEN': token }
   })
   .then(resp => {
      
      $('.mariscal-totals-box ul li').remove()

      for (key in resp.data) {
         $('.mariscal-totals-box ul').append(
            $('<li>').text(`${key.toUpperCase()}: ${resp.data[key]}`)
         )
      }
   })
}

function updateOrderTotals()
{
   if (! $('.cart-totals'))
      return

   let token = $('[name=csrf-token]').attr('content')

   axios({
      'url': '/app/pedido/totales',
      'method': 'post',
      'headers': { 'X-CSRF-TOKEN': token }
   })
   .then(resp => {
      $('#totalPaquetes').text(resp.data.paquetes)
      $('#totalBultos').text(resp.data.bultos)
   })
}
