(function initializeTotals()
{
   updateTotals()
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
            .then( result => {
               if (result.isConfirmed) {
                  closeOrder()
                  showConfirmation()
               }
            })
         }
      )
})();

(function hookDeleteButtonHandler()
{
   if (! $('#deleteButton'))
      return

   $('#deleteButton')
      .on('click',
         (ev) => {
            
            ev.preventDefault()

            Swal.fire({
               title: 'Estás seguro que querés eliminar el pedido?',
               text: 'Luego no se puede recuperar',
               icon: 'question',
               showCancelButton: true,
               confirmButtonText: 'Sí',
               cancelButtonText: 'No'
            })
            .then( result => {
               if (result.isConfirmed) {
                  deleteOrder()
               }
            })
         }
      )
})();

function updateTotals(target)
{
   if ($('.mariscal-totals-box'))
      updateCategoryTotals()

   if ($('.cart-totals')) {
      if (target)
         updateGroupTotals(target)
      
      updateOrderTotals()
   }
}

function updateCategoryTotals()
{
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

function updateGroupTotals(target)
{
   // esta función es para actualizar los totales
   // de la categoría correspondiente a target (input box)
   
   let groupId = target.closest('tr').attr('data-group-id')
   let rows = target.closest('tbody').find(`[data-group-id="${groupId}"]`)
   let totalSpan = rows[0].querySelector('#group-total')
   let total = 0

   rows.each( (index, row) => {
      input = $(row).find('.quantity-input')
      if (input.length)
         total += parseInt(input.val())
   })

   totalSpan.innerText = total
}

function updateOrderTotals()
{
   // esta función es para actualizar los totales
   // generales en el carrito del pedido

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

function closeOrder()
{
   let token = $('[name=csrf-token]').attr('content')
   let idDomicilio = $('#id_domicilio').val()
   let idTransporte = $('#id_transporte').val()
   let mensaje = $('#mensaje').val()

   axios({
      'url': '/app/pedido/cerrar',
      'method': 'post',
      'data': {
         'id_domicilio': idDomicilio,
         'id_transporte': idTransporte,
         'mensaje': mensaje
      },
      'headers': { 'X-CSRF-TOKEN': token }
   })
   // .then (resp => { console.log(resp) })
}

function deleteOrder()
{
   let token = $('[name=csrf-token]').attr('content')

   axios({
      'url': '/app/pedido/eliminar',
      'method': 'post',
      'headers': { 'X-CSRF-TOKEN': token }
   })
   .then (() => { reloadCart() })
}

function showConfirmation()
{
   document.location = '/pedido/enviado'
}

function reloadCart()
{
   document.location = '/carrito'
}
