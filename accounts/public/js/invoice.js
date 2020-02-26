var nextItemNum = 1

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

      addItemRow()
      addItemRow()
      addItemRow()
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

   node = row.querySelector('#prod_code')
   node.setAttribute('id', `prod_code.${nextItemNum}`)
   node.setAttribute('name', `prod_code[${nextItemNum}]`)
   node.addEventListener('change', getProductData)

   node = row.querySelector('i')
   node.addEventListener('click', deleteItemRow)

   node = row.querySelector('#item_id')
   node.setAttribute('id', `item.${nextItemNum}.id`)
   node.setAttribute('name', `item[${nextItemNum}][id]`)

   node = row.querySelector('#item_description')
   node.setAttribute('id', `item.${nextItemNum}.description`)
   node.setAttribute('name', `item[${nextItemNum}][description]`)

   node = row.querySelector('#item_quantity')
   node.setAttribute('id', `item.${nextItemNum}.quantity`)
   node.setAttribute('name', `item[${nextItemNum}][quantity]`)

   node = row.querySelector('#item_price')
   node.setAttribute('id', `item.${nextItemNum}.price`)
   node.setAttribute('name', `item[${nextItemNum}][price]`)
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
}

function renumberItemRows()
{
   let rowsSection = document.querySelector('#item-rows')
   let node

   nextItemNum = 1

   for (row of rowsSection.children)
   {
      node = row.querySelector('input[readonly]')
      node.setAttribute('value', nextItemNum)
      nextItemNum++;
   }
}

function getProductData()
{
   let code = event.target
   let qString = buildProductQueryString(code.value);

   fetch('/products/get-data' + qString)
      .then(function (response) {
         console.log(response)
         return response.json()
      })
      .then(function (data) {
         console.log(data)
         fillItemFields(code, data)
      })
}

function buildProductQueryString(productCode)
{
   let priceList = document.querySelector('#price_list')
   let qString = `?code=${productCode}`

   if (priceList.value) {
      qString += `&price_list_id=${priceList.value}`
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
   node.value = 1

   node = row.querySelector('[id$=price]')
   node.value = data.price
}
