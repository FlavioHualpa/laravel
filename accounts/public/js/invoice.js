window.addEventListener(
   'load',
   function () {
      var customerList = document.querySelector('#customer')
      fillInvoiceTypesList()

      customerList.addEventListener(
         'change',
         function () {
            fillInvoiceTypesList()
         }
      )
   }
)

function fillInvoiceTypesList()
{
   var typeList = document.querySelector('#invoice_type')
   var customerList = document.querySelector('#customer')
   var customer_id = customerList.value;

   emptyList(typeList)

   if (customer_id) {
      fetch('/invoice_types/get/' + customer_id)
         .then(
            function (response) {
               return response.json()
         })
         .then(
            function (data) {
               for (type of data) {
                  let option = document.createElement('option')
                  option.setAttribute('value', type.id)
                  if (invoice_type_id == type.id)
                     option.setAttribute('selected', null)

                  let optionText = document.createTextNode(type.name)
                  option.appendChild(optionText)
                  typeList.appendChild(option)
               }
            }
         )
   }
}

function emptyList(list)
{
   while (list.options.length)
      list.options[0].remove();
}
