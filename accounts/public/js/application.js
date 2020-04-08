window.onload = function ()
{
   var totalToApply

   const btn = document.querySelector('#saveBtn')
   btn.addEventListener('click', performDataChecks)

   const cust = document.querySelector('#customer')
   cust.addEventListener('change', refreshOptions)

   const applicant = document.querySelector('#applicant_id')
   applicant.addEventListener('change', getApplicantData)

   if (applicant.value) {
      applicant.dispatchEvent(new Event('change'))
   }

   const amountFields = document.querySelectorAll('[id$=amount]')
   amountFields.forEach(el => {
      el.addEventListener(
         'change',
         function () {
            checkFloat()
            updateApplicationTotal()
         }
      )
   })
}

function getApplicantData()
{
   const typeField = document.querySelector('#applicant_type')
   typeField.value = event.target
      .selectedOptions[0]
      .getAttribute('data-applicant-type')
   
   totalToApply = parseFloat(
      event.target
      .selectedOptions[0]
      .getAttribute('data-remaining')
   )

   updateApplicationTotal()
}

function refreshOptions()
{
   const form = document.querySelector('#refresh_form')
   const field = form.querySelector('#query')

   field.value = event.target.value
   form.submit()
}

function performDataChecks()
{
   event.preventDefault()

   const customerField = document.querySelector('#customer')
   if (! customerField.value) {
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

   const applicantField = document.querySelector('#applicant_id')
   if (! applicantField.value) {
      swal({
         title: 'Error de validación',
         text: 'Debes seleccionar el comprobante con el cual aplicar',
         icon: 'error',
         button: 'De acuerdo'
      })
      .then(() => {
         applicantField.focus()
      })
      return
   }

   const total = computeApplicationTotal()
   if (total <= 0.0) {
      swal({
         title: 'Error de validación',
         text: 'Debes aplicar un importe a almenos un comprobante',
         icon: 'error',
         button: 'De acuerdo'
      })
      return
   }

   if (total > totalToApply) {
      swal({
         title: 'Error de validación',
         text: 'El importe total aplicado no puede ser mayor\nal restante por aplicar (' + toCurrencyString(totalToApply) + ')',
         icon: 'error',
         button: 'De acuerdo'
      })
      return
   }

   const form = document.querySelector('#application_form')

   swal({
      title: 'Aplicación de comprobantes',
      text: 'Confirmas la aplicación de los importes?',
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
      if (value) {
         const remField = document.querySelector('#applicant_remaining')
         remField.value = totalToApply
         form.submit()
      }
   })
}

function checkFloat()
{
   const field = event.target
   const num = Number.parseFloat(field.value)

   if (isNaN(num) || num < 0.0)
   {
      field.value = 0
      return
   }
   
   const invoiceRem = field
      .parentElement
      .parentElement
      .querySelector('#remaining')
      .value
   
   if (num > totalToApply)
   {
      swal({
         title: 'Error de validación',
         text: 'No puedes aplicar un importe mayor\nal restante por aplicar (' + toCurrencyString(totalToApply) + ')',
         icon: 'error',
         button: 'De acuerdo'
      })
      .then(() => {
         field.value = Math.min(totalToApply, invoiceRem)
         updateApplicationTotal()
      })
      return
   }

   if (num > invoiceRem) {
      swal({
         title: 'Error de validación',
         text: 'No puedes aplicar un importe mayor\nal restante del comprobante (' + toCurrencyString(invoiceRem) + ')',
         icon: 'error',
         button: 'De acuerdo'
      })
      .then(() => {
         field.value = Math.min(totalToApply, invoiceRem)
         updateApplicationTotal()
      })
      return
   }
}

function computeApplicationTotal()
{
   let rowsSection = document.querySelector('#item-rows')
   let total = 0.0
   let roundUp = 100.0

   for (row of rowsSection.children) {
      total += parseFloat(row.querySelector('[id$=amount]').value)
   }

   return Math.round(total * roundUp) / roundUp
}

function updateApplicationTotal()
{
   if (! totalToApply)
      return
   
   let totalField = document.querySelector('#total')
   let remField = document.querySelector('#remaining_to_apply')
   let totalApplied = computeApplicationTotal()
   let difference = totalToApply - totalApplied

   totalField.innerText = toCurrencyString(totalApplied)
   remField.innerText = toCurrencyString(difference)

   if (totalApplied > totalToApply)
   {
      totalField.classList.add('text-danger')
      remField.classList.add('text-danger')
   }
   else
   {
      totalField.classList.remove('text-danger')
      remField.classList.remove('text-danger')
   }
}

function toCurrencyString(value)
{
   return '$ ' + value.toLocaleString(
      'it', { minimumFractionDigits: 2, maximumFractionDigits: 2 }
   )
}
