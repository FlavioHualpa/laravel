let okBtnText
let cancelBtnText
let questionText

const prepareLinks = function ()
{
   let downloads = document.querySelectorAll('a[data-link]')

   downloads.forEach(el => {
      el.addEventListener(
         'click',
         () => {
            let link = event.target
            event.preventDefault()

            Swal.fire({
               title: link.innerText,
               text: questionText,
               icon: 'question',
               confirmButtonText: okBtnText,
               cancelButtonText: cancelBtnText,
               showCancelButton: true
            })
            .then(function (result) {
               if (result.value) {
                  win = open(link.getAttribute('data-link'))
               }
            })
         }
      )
   })
}

prepareLinks()
