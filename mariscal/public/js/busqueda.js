(function searchProducts()
{
   const sb = $('#search2')
   const list = $('.results-box ul')

   let listening = false
   let value = 1

   sb.on('keydown', onKeyDown)
   $('body').on('click', () => { $('.results-box').hide() });

   function stepUp()
   {
      // sb.style.width = value + '%';
      if (value < 100) {
         value++
         setTimeout(stepUp, 7)
         return
      }

      // terminó el tiempo de espera
      listening = false
      fetchResults()
   }

   function onKeyDown()
   {
      value = 0

      if (listening === false) {
         listening = true
         setTimeout(stepUp, 7)
      }
   }

   function fetchResults()
   {
      let keyword = sb.val().trim()

      if (! keyword)
         return
      
      // limpiar la lista
      list.find('li').remove()

      let token = $('[name=csrf-token]').attr('content')

      axios({
         'url': '/search/products',
         'method': 'post',
         'data': { 'keyword': keyword },
         'headers': { 'X-CSRF-TOKEN': token }
      })
      .then(resp => {

         // agregar los resultados a la lista
         if (resp.data.length)
            for (result of resp.data)
               list.append(
                  $('<li>').append(
                     $('<a>')
                        .text(`${result.categoria} ${result.variedad}`)
                        .attr('href', `/productos/${result.url}`)
                  )
               )
         else
         {
            list.append(
               $('<li>').text('-- no encontramos resultados --')
            )
         }

         $('.results-box').show()
      })
   }
}
)()
