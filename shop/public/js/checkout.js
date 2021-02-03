document.getElementById('cardNumber').addEventListener('change', guessPaymentMethod);

function guessPaymentMethod(event) {
   let cardnumber = document.getElementById("cardNumber").value;
   if (cardnumber.length >= 6) {
      let bin = cardnumber.substring(0, 6);
      window.Mercadopago.getPaymentMethod({
         "bin": bin
      }, setPaymentMethod);
   }
};

function setPaymentMethod(status, response) {
   if (status == 200) {
      let paymentMethod = response[0];
      document.getElementById('paymentMethodId').value = paymentMethod.id;
      document.getElementById('cardIcon').src = paymentMethod.secure_thumbnail;

      getIssuers(paymentMethod.id);
   } else {
      alert(`payment method info error: ${response}`);
   }
}

function getIssuers(paymentMethodId) {
   window.Mercadopago.getIssuers(
      paymentMethodId,
      setIssuers
   );
}

function setIssuers(status, response) {
   if (status == 200) {
      let issuerSelect = document.getElementById('issuer');
      while (issuerSelect.options.length) { issuerSelect.options[0].remove() }
      response.forEach(issuer => {
         let opt = document.createElement('option');
         opt.text = issuer.name;
         opt.value = issuer.id;
         issuerSelect.appendChild(opt);
      });

      getInstallments(
         document.getElementById('paymentMethodId').value,
         document.getElementById('transactionAmount').value,
         issuerSelect.value
      );
   } else {
      alert(`issuers method info error: ${response}`);
   }
}

function getInstallments(paymentMethodId, transactionAmount, issuerId) {
   window.Mercadopago.getInstallments({
      "payment_method_id": paymentMethodId,
      "amount": parseFloat(transactionAmount),
      "issuer_id": parseInt(issuerId)
   }, setInstallments);
}

function setInstallments(status, response) {
   if (status == 200) {
      document.getElementById('installments').options.length = 0;
      response[0].payer_costs.forEach(payerCost => {
         let opt = document.createElement('option');
         opt.text = payerCost.recommended_message;
         opt.value = payerCost.installments;
         document.getElementById('installments').appendChild(opt);
      });
   } else {
      alert(`installments method info error: ${response}`);
   }
}

doSubmit = false;
document.getElementById('paymentForm')
   .addEventListener('submit', getCardToken);

function getCardToken(event) {
   event.preventDefault();
   if (!doSubmit) {
      let $form = document.getElementById('paymentForm');
      if ($form.elements['paymentMethod'].value != 'card') {
         doSubmit = true;
         $form.submit();
      }
      else {
         window.Mercadopago.createToken($form, setCardTokenAndPay);
         return false;
      }
   }
};

function setCardTokenAndPay(status, response) {
   if (status == 200 || status == 201) {
      let form = document.getElementById('paymentForm');
      let card = document.createElement('input');
      card.setAttribute('name', 'token');
      card.setAttribute('type', 'hidden');
      card.setAttribute('value', response.id);
      form.appendChild(card);
      doSubmit = true;
      form.submit();
   } else {
      showErrors(response)
      // alert("Error en los datos ingresados!\n" + JSON.stringify(response, null, 4));
   }
};

function showErrors(response)
{
   const messages = document.querySelectorAll('[id^=error]')
   messages.forEach(message => message.style.display = 'none')

   response.cause.forEach(error => showMessage(error.code))
}

function showMessage(code)
{
   const errors = [
      {
         code: '205',
         message: 'Ingresa el número de tu tarjeta',
         domElement: document.querySelector('#error_card_number')
      },
      {
         code: ['208', '209'],
         message: 'Completa la fecha de vencimiento',
         domElement: document.querySelector('#error_card_expiration')
      },
      {
         code: ['213', '214'],
         message: 'Ingresa tu número de documento',
         domElement: document.querySelector('#error_doc_number')
      },
      {
         code: '220',
         message: 'Selecciona tu banco',
         domElement: document.querySelector('#error_card_issuer')
      },
      {
         code: '221',
         message: 'Ingresa tu nombre y apellido',
         domElement: document.querySelector('#error_card_holder')
      },
      {
         code: '224',
         message: 'Ingresa el código de seguridad',
         domElement: document.querySelector('#error_security_code')
      },
      {
         code: 'E301',
         message: 'El número de la tarjeta no es válido',
         domElement: document.querySelector('#error_card_number')
      },
      {
         code: 'E302',
         message: 'El código de seguridad no es válido',
         domElement: document.querySelector('#error_security_code')
      },
      {
         code: '316',
         message: 'Ingresa un nombre válido',
         domElement: document.querySelector('#error_card_holder')
      },
      {
         code: ['322', '323', '324'],
         message: 'El número de documento no es válido',
         domElement: document.querySelector('#error_doc_number')
      },
      {
         code: ['325', '326'],
         message: 'La fecha de vencimiento no es válida',
         domElement: document.querySelector('#error_card_expiration')
      },
   ]

   for (let err of errors)
   {
      if (
         (typeof err.code == 'string' && code == err.code)
         || (Array.isArray(err.code) && err.code.find(val => val == code))
      )
      {
         err.domElement.style.display = 'block'
         err.domElement.innerText = err.message
         break
      }
   }
}

function changePaymentMethod(event)
{
   const radio = event.target
   const cardInfo = document.getElementById('cardInfo')
   const pmId = document.getElementById('paymentMethodId')
   const amount = document.getElementById('transactionAmount').value

   cardInfo.style.display = radio.id == 'pm_card' ? 'block' : 'none';

   switch (radio.id)
   {
      case 'pm_card':
         reloadPaymentMethod()
         break
      
      case 'pm_pagofacil':
         pmId.value = 'pagofacil'
         getInstallments('pagofacil', amount, null)
         break
      
      case 'pm_rapipago':
         pmId.value = 'rapipago'
         getInstallments('rapipago', amount, null)
         break
   }
}

function reloadPaymentMethod()
{
   let cardnumber = document.getElementById("cardNumber").value;
   if (cardnumber.length >= 6) {
      let bin = cardnumber.substring(0, 6);
      window.Mercadopago.getPaymentMethod({
         "bin": bin
      }, resetPaymentMethod);
   }
};

function resetPaymentMethod(status, response)
{
   let paymentMethod = response[0];

   document.getElementById('paymentMethodId').value =
      status == 200 ? paymentMethod.id : '';
}
