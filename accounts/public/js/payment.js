var nextItemNum = 1
const cashFields = [ 'comment' ]
const checkFields = [ 'comment', 'bank_id', 'number', 'due_date' ]
const depositFields = [ 'comment', 'account_id', 'number', 'due_date' ]

window.onload = function ()
{
   setPaymentsDropDownUp()
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
   node.setAttribute('value', event.target.getAttribute('data-method-code'))

   node = row.querySelector('i')
   node.addEventListener('click', deleteItemRow)

   node = row.querySelector('[id$=id]')
   node.setAttribute('id', `item.${nextItemNum}.id`)
   node.setAttribute('name', `item[${nextItemNum}][id]`)
   node.setAttribute('value', event.target.getAttribute('data-method-id'))

   node = row.querySelector('[id$=amount]')
   node.setAttribute('id', `item.${nextItemNum}.amount`)
   node.setAttribute('name', `item[${nextItemNum}][amount]`)
   node.addEventListener('change', function () {
      checkFloat()
      computePaymentTotal()
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
   computePaymentTotal()
}

function renumberItemRows()
{
   const rowsSection = document.querySelector('#item-rows')
   let methodField, methodCode

   nextItemNum = 1

   for (row of rowsSection.children) {
      methodField = row.querySelector('#payment_method_type_code')
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

   let totalField = document.querySelector('#total')

   totalField.innerText = toCurrencyString(total)
}

function toCurrencyString(value)
{
   return '$ ' + value.toLocaleString(
      'it', { minimumFractionDigits: 2, maximumFractionDigits: 2 }
   )
}
