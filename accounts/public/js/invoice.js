var nextItemNum = 1
var finalTax

window.addEventListener(
   'load',
   function () {
      var customerList = document.querySelector('#customer')
      fillInvoiceTypesList()

      customerList.addEventListener(
         'change',
         function () {
            fillInvoiceTypesList()
            getFinalTax()
         }
      )

      var addRowBtn = document.querySelector('#add-btn')
      addRowBtn.addEventListener(
         'click',
         function () {
            event.preventDefault()
            addItemRow()
         }
      )

      getFinalTax()
      addItemRow()
      addItemRow()
   }
)

function fillInvoiceTypesList()
{
   var typeList = document.querySelector('#invoice_type')
   var customerList = document.querySelector('#customer')
   var customer_id = customerList.value

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
      list.options[0].remove()
}

function addItemRow()
{
   let rowTplt = document.querySelector('#item-row-template')
   let newRow = rowTplt.content.cloneNode(true)
   let rowsSection = document.querySelector('#item-rows')

   setRowAttributeValues(newRow)
   rowsSection.appendChild(newRow)

   nextItemNum++
}

function setRowAttributeValues(row)
{
   let node = row.querySelector('input[readonly]')
   node.setAttribute('value', nextItemNum)

   node = row.querySelector('[id^=prod_code]')
   node.setAttribute('id', `prod_code.${nextItemNum}`)
   node.setAttribute('name', `prod_code[${nextItemNum}]`)
   node.addEventListener('change', getProductData)

   node = row.querySelector('i')
   node.addEventListener('click', deleteItemRow)

   node = row.querySelector('[id$=id]')
   node.setAttribute('id', `item.${nextItemNum}.id`)
   node.setAttribute('name', `item[${nextItemNum}][id]`)

   node = row.querySelector('[id$=description]')
   node.setAttribute('id', `item.${nextItemNum}.description`)
   node.setAttribute('name', `item[${nextItemNum}][description]`)

   node = row.querySelector('[id$=quantity]')
   node.setAttribute('id', `item.${nextItemNum}.quantity`)
   node.setAttribute('name', `item[${nextItemNum}][quantity]`)
   node.addEventListener('change', function () {
      checkFloat()
      computeInvoiceTotal()
   })

   node = row.querySelector('[id$=price]')
   node.setAttribute('id', `item.${nextItemNum}.price`)
   node.setAttribute('name', `item[${nextItemNum}][price]`)
   node.addEventListener('change', function () {
      checkFloat()
      computeInvoiceTotal()
   })
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
   computeInvoiceTotal()
}

function renumberItemRows()
{
   let rowsSection = document.querySelector('#item-rows')
   let node

   nextItemNum = 1

   for (row of rowsSection.children)
   {
      setRowAttributeValues(row)
      nextItemNum++
   }
}

function checkFloat()
{
   const field = event.target
   const num = Number.parseFloat(field.value)
   
   field.value = (isNaN(num) || num < 0.0) ? 0.0 : num
}

function computeInvoiceTotal()
{
   let rowsSection = document.querySelector('#item-rows')
   let subtotal = 0.0

   for (row of rowsSection.children) {
      subtotal += row.querySelector('[id$=quantity]').value * row.querySelector('[id$=price]').value
   }

   let subtotalField = document.querySelector('#subtotal')
   let taxField = document.querySelector('#tax')
   let totalField = document.querySelector('#total')

   subtotalField.innerText = toCurrencyString(subtotal)
   taxField.innerText = toCurrencyString(subtotal * finalTax)
   totalField.innerText = toCurrencyString(subtotal * (1.0 + finalTax))
}

function toCurrencyString(value)
{
   return '$ ' + value.toLocaleString(
      'it', { minimumFractionDigits: 2, maximumFractionDigits: 2 }
   )
}

function getProductData()
{
   let code = event.target
   let qString = buildProductQueryString(code.value);

   fetch('/products/get-data' + qString)
      .then(function (response) {
         return response.json()
      })
      .then(function (data) {
         fillItemFields(code, data)
         computeInvoiceTotal()
      })
}

function getFinalTax()
{
   let customer_id = document.querySelector('#customer').value

   fetch('/conditions/get-final-tax?customer_id=' + customer_id)
      .then(function (response) {
         return response.json()
      })
      .then(function (data) {
         finalTax = data.final_tax
      })
}

function buildProductQueryString(productCode)
{
   let priceList = document.querySelector('#price_list')
   let customer = document.querySelector('#customer')
   let qString = `?code=${productCode}`

   if (priceList.value) {
      qString += `&price_list_id=${priceList.value}`
   }

   if (customer.value) {
      qString += `&customer_id=${customer.value}`
   }

   return qString
}

function fillItemFields(code, data)
{
   let row = code.parentElement.parentElement.parentElement.parentElement
   // la fila del item
   // está cuatro niveles hacia arriba en el DOM

   let node = row.querySelector('[id$=id]')
   node.value = data.id

   node = row.querySelector('[id$=description]')
   node.value = data.description

   node = row.querySelector('[id$=quantity]')
   node.value = data.quantity

   node = row.querySelector('[id$=price]')
   node.value = data.price
}
