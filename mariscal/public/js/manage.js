(function hookSendButtonHandler()
{
   $('a[data-rol=state]')
      .on('click',
         (ev) => {

            ev.preventDefault()
            let btn = $(ev.target)
            let orderId = btn.attr('data-order-id')
            let orderNo = btn.attr('data-order-no')
            let state = btn.attr('data-state')
            let token = $('[name=csrf-token]').attr('content')

            Swal.fire({
               title: `Cambiar el estado del pedido #${orderNo}`,
               text: 'Seleccioná el estado',
               input: 'select',
               inputOptions: {
                  'cerrado': 'cerrado',
                  'en preparación': 'en preparación',
                  // 'preparado': 'preparado',
                  'facturado': 'facturado',
                  'despachado': 'despachado',
                  'cancelado': 'cancelado'
               },
               inputValue: state,
               showCancelButton: true,
               confirmButtonText: 'Cambiar',
               cancelButtonText: 'Cancelar'
            })
            .then(result => {
               if (result.isConfirmed) {
                  axios({
                     'url': '/app/pedido/cambiarestado',
                     'method': 'post',
                     'data': {
                        'id_pedido': orderId,
                        'nuevo_estado': result.value
                     },
                     'headers': { 'X-CSRF-TOKEN': token }
                  })
                  .then(resp => {
                     window.location = window.location
                  })
               }
            })
         }
      )
})();
