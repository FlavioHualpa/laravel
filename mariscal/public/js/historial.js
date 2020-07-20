(function hookSendButtonHandler()
{
   $('a')
      .on('click',
         (ev) => {

            ev.preventDefault()
            let btn = $(ev.target)
            let orderId = btn.attr('data-order-id')
            let orderNo = btn.attr('data-order-no')

            Swal.fire({
               title: 'Repetir el pedido #' + orderNo,
               text: 'Esta acción genera un nuevo pedido que luego vas a poder modificar antes de enviar. Confirmás?',
               icon: 'question',
               showCancelButton: true,
               confirmButtonText: 'Sí',
               cancelButtonText: 'No'
            })
            .then(result => {
               if (result.isConfirmed) {
                  tryToDuplicate(orderId)
               }
            })
         }
      )
})();

async function tryToDuplicate(orderId)
{
   if (await customerHasOpenOrder(orderId))
      return

   let newOrderId = await repeatOrder(orderId)
   showConfirmation(newOrderId)
}

function customerHasOpenOrder(orderId)
{
   let token = $('[name=csrf-token]').attr('content')

   return axios({
      'url': '/app/pedido/clientetieneabierto',
      'method': 'post',
      'data': { 'id_pedido': orderId },
      'headers': { 'X-CSRF-TOKEN': token }
   })
   .then(resp => {
      if (resp.data.hasOpenOrder) {
         showOpenOrderWarning(resp.data.customerName)
      }
      
      return resp.data.hasOpenOrder
   })
}

function showOpenOrderWarning(customerName)
{
   Swal.fire({
      title: 'Atención',
      text: `${customerName} tiene un pedido abierto. Para generar uno nuevo primero enviá o eliminá el actual.`,
      icon: 'warning'
   })
}

function repeatOrder(orderId)
{
   return 99;
}

function showConfirmation(orderId)
{
   Swal.fire({
      title: 'Éxito!',
      text: `Se ha abierto el nuevo pedido #${orderId}.`,
      icon: 'success'
   })
}
