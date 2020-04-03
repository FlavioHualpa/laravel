var nextItemNum = 1
const cashFields = [ 'comment' ]
const checkFields = [ 'comment', 'bank_id', 'number', 'due_date' ]
const depositFields = [ 'comment', 'account_id', 'number', 'due_date' ]

window.onload = function ()
{
   setPaymentsDropDownUp()
   setSaveButtonHandlerUp()
}

function setSaveButtonHandlerUp()
{
   const btn = document.querySelector('#saveBtn')
   btn.addEventListener('click', performDataChecks)
}

function performDataChecks()
{
   event.preventDefault()

   const total = computePaymentTotal()
   if (total <= 0.0)
   {
      swal({
         title: 'Error de validación',
         text: 'El total del recibo no puede ser cero',
         icon: 'error',
         button: 'De acuerdo'
      })
      return
   }

   const customerField = document.querySelector('#customer')
   if (! customerField.value)
   {
      swal({
         title: 'Error de validación',
         text: 'Debes seleccionar un cliente',
         icon: 'error',
         button: 'De acuerdo'
      })
         .then(() => {
            customerField.focus()
         })
      return
   }
   
   const numberField = document.querySelector('#number')
   if (isNaN(parseInt(numberField.value)))
   {
      swal({
         title: 'Error de validación',
         text: 'Por favor ingresa el número del recibo',
         icon: 'error',
         button: 'De acuerdo'
      })
      .then(() => {
         numberField.focus()
      })
      return
   }

   const query = new XMLHttpRequest()

   query.onreadystatechange = function () {
      if (query.readyState == XMLHttpRequest.DONE && query.status == 200) {
         const exists = JSON.parse(query.response)
         if (exists.response) {
            swal({
               title: 'Error de validación',
               text: 'Ese número de recibo ya fue ingresado',
               icon: 'error',
               button: 'De acuerdo',
            })
            .then(() => {
               numberField.focus()
            })
            return
         }
         confirmSave()
      }
   }

   query.open(
      'GET',
      '/payments/check-number?number=' + numberField.value,
      false // false = llamado síncrono
   )

   query.send()

   function confirmSave()
   {
      const form = document.querySelector('#payment_form')
      
      swal({
         title: 'Ingreso de recibos',
         text: 'Confirmas el ingreso del recibo?',
         icon: 'info',
         buttons: {
            not: {
               text: 'No',
               value: false
            },
            yes: {
               text: 'Sí',
               value: true
            },
         },
      })
      .then((value) => {
         if (value)
            form.submit()
      })
   }
}

function addCheckRow()
{
   addRow('check', checkFields)
}

function addDepositRow()
{
   addRow('deposit', depositFields)
}

function addCashRow()
{
   addRow('cash', cashFields)
}

function addRow(name, fields)
{
   let rowTplt = document.querySelector(`#${name}-row-template`)
   let newRow = rowTplt.content.cloneNode(true)
   let rowsSection = document.querySelector('#item-rows')

   setRowAttributeValues(newRow, fields)
   rowsSection.appendChild(newRow)

   nextItemNum++
}

function setRowAttributeValues(row, fields)
{
   let node = row.querySelector('[id^=item_num]')
   node.setAttribute('value', nextItemNum)

   node = row.querySelector('[id^=method_code]')
   node.setAttribute('id', `method_code.${nextItemNum}`)
   if (! node.getAttribute('value'))
      node.setAttribute(
         'value',
         event.target.getAttribute('data-method-code')
      )

   node = row.querySelector('[id*=method_type_code]')
   node.setAttribute('id', `item.${nextItemNum}.method_type_code`)
   node.setAttribute('name', `item[${nextItemNum}][method_type_code]`)

   node = row.querySelector('i')
   node.addEventListener('click', deleteItemRow)

   node = row.querySelector('[id$=id]')
   node.setAttribute('id', `item.${nextItemNum}.payment_method_id`)
   node.setAttribute('name', `item[${nextItemNum}][payment_method_id]`)
   if (! node.getAttribute('value'))
      node.setAttribute(
         'value',
         event.target.getAttribute('data-method-id')
      )

   node = row.querySelector('[id$=amount]')
   node.setAttribute('id', `item.${nextItemNum}.amount`)
   node.setAttribute('name', `item[${nextItemNum}][amount]`)
   node.addEventListener('change', function () {
      checkFloat()
      updatePaymentTotal()
   })

   for (field of fields)
   {
      node = row.querySelector(`[id$=${field}]`)
      node.setAttribute('id', `item.${nextItemNum}.${field}`)
      node.setAttribute('name', `item[${nextItemNum}][${field}]`)
   }
}

function deleteItemRow()
{
   // el comprobante debe tener al menos un item
   if (nextItemNum == 2)
      return

   node = event.target.parentElement.parentElement.parentElement.parentElement
   // el nodo que queremos borrar (la fila del item)
   // está cuatro niveles hacia arriba en el DOM

   node.remove()
   renumberItemRows()
   updatePaymentTotal()
}

function renumberItemRows()
{
   const rowsSection = document.querySelector('#item-rows')
   let methodField, methodCode

   nextItemNum = 1

   for (row of rowsSection.children) {
      methodField = row.querySelector('[id*=method_type_code]')
      methodCode = methodField.getAttribute('value');
      setRowAttributeValues(row, getRowFields(methodCode))
      nextItemNum++
   }
}

function getRowFields(methodCode)
{
   switch (methodCode)
   {
      case 'cash':
         return cashFields;
      
      case 'check':
         return checkFields;
      
      case 'deposit':
         return depositFields;
   }
}

function checkFloat()
{
   const field = event.target
   const num = Number.parseFloat(field.value)

   field.value = (isNaN(num) || num < 0.0) ? 0.0 : num
}

function computePaymentTotal()
{
   let rowsSection = document.querySelector('#item-rows')
   let total = 0.0

   for (row of rowsSection.children) {
      total += parseFloat(row.querySelector('[id$=amount]').value)
   }

   return total
}

function updatePaymentTotal()
{
   let totalField = document.querySelector('#total')
   let total = computePaymentTotal()

   totalField.innerText = toCurrencyString(total)
}

function toCurrencyString(value)
{
   return '$ ' + value.toLocaleString(
      'it', { minimumFractionDigits: 2, maximumFractionDigits: 2 }
   )
}
