@extends('layouts.header')

@section('content')
   <main class="h-screen flex flex-col justify-center items-center">
      <div class="bg-white p-12 w-2/3 md:w-1/2 xl:w-1/3 rounded-lg shadow">
         <div class="mb-8 flex justify-center space-x-4">
            <img
               src="{{ asset('img/site/shopping-cart.png') }}"
               alt="Shop"
               class="w-32"
            >
            <img
               src="{{ asset('img/site/logo-mercadopago.png') }}"
               alt="MercadoPago"
               class="w-32"
            >
         </div>

         <h1 class="text-2xl text-center font-bold mb-8">
            Método de pago
         </h1>

         <form action="{{ route('process.payment') }}" method="post" id="paymentForm">
            @csrf

            <p class="text-lg text-green-600 mb-3">
               Ingresa tu número de documento
            </p>
      
            <div class="mb-8">
               <input
                  type="hidden"
                  id="email"
                  name="email"
                  value="test_user_76607174@testuser.com"
                  {{-- value="{{ $user->email }}" --}}
               >
               <input
                  type="hidden"
                  id="first_name"
                  name="first_name"
                  value="{{ $user->first_name }}"
               >
               <input
                  type="hidden"
                  id="last_name"
                  name="last_name"
                  value="{{ $user->last_name }}"
               >
            </div>

            <div class="mb-10">
               <label for="docType" class="block">
                  Tipo y número de documento
               </label>
               <div class="flex">
                  <select
                     id="docType"
                     name="docType"
                     data-checkout="docType"
                     class="border border-r-0 border-gray-300 focus:border-blue-400 rounded-l p-2 outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-50 transition duration-200"
                  >
                     @foreach ($idTypes as $idType)
                        <option value="{{ $idType['id'] }}">
                           {{ $idType['name'] }}
                        </option>
                     @endforeach
                  </select>
                  <input
                     type="text"
                     id="docNumber"
                     name="docNumber"
                     data-checkout="docNumber"
                     autofocus
                     class="flex-grow border border-gray-300 outline-none focus:border-blue-400 rounded-r p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 transition duration-200"
                  >
               </div>
               <p class="mt-1 text-sm text-red-500 hidden"
                  id="error_doc_number"
               >
                  Error en número de documento
               </p>
            </div>

            <div class="flex items-center mb-8">
               <input type="radio"
                  name="paymentMethod"
                  value="card"
                  id="pm_card"
                  onchange="changePaymentMethod(event)"
                  class="transform scale-125 mr-1"
                  checked
               >
               <label for="pm_card" class="text-lg text-green-600 mr-4">
                  Crédito/Débito
               </label>

               <input type="radio"
                  name="paymentMethod"
                  value="pagofacil"
                  id="pm_pagofacil"
                  onchange="changePaymentMethod(event)"
                  class="transform scale-125 mr-1"
               >
               <label for="pm_pagofacil" class="text-lg text-green-600 mr-4">
                  Pago Fácil
               </label>

               <input type="radio"
                  name="paymentMethod"
                  value="rapipago"
                  id="pm_rapipago"
                  onchange="changePaymentMethod(event)"
                  class="transform scale-125 mr-1"
               >
               <label for="pm_rapipago" class="text-lg text-green-600 mr-4">
                  Rapipago
               </label>
            </div>

            <div id="cardInfo">
               <div class="flex space-x-4">
                  <div class="mb-4 w-2/3">
                     <label for="cardholderName" class="block">
                        Titular de la tarjeta
                     </label>
                     <input
                        type="text"
                        id="cardholderName"
                        name="cardholderName"
                        data-checkout="cardholderName"
                        class="w-full border border-gray-300 outline-none focus:border-blue-400 rounded p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 transition duration-200"
                     >
                     <p class="mt-1 text-sm text-red-500 hidden"
                        id="error_card_holder"
                     >
                        Error en titular de la tarjeta
                     </p>
                  </div>

                  <div class="mb-4 w-1/3">
                     <label for="cardExpirationMonth" class="block">
                        Fecha de vencimiento
                     </label>
                     <input
                        type="text"
                        id="cardExpirationMonth"
                        data-checkout="cardExpirationMonth"
                        placeholder="MM"
                        onselectstart="return false"
                        onpaste="return false"
                        oncopy="return false"
                        oncut="return false"
                        ondrag="return false"
                        ondrop="return false"
                        autocomplete=off
                        class="w-16 border border-gray-300 outline-none focus:border-blue-400 rounded p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 transition duration-200 text-center"
                     >
                     <span class="date-separator">/</span>
                     <input
                        type="text"
                        id="cardExpirationYear"
                        data-checkout="cardExpirationYear"
                        placeholder="AA"
                        onselectstart="return false"
                        onpaste="return false"
                        oncopy="return false"
                        oncut="return false"
                        ondrag="return false"
                        ondrop="return false"
                        autocomplete=off
                        class="w-16 border border-gray-300 outline-none focus:border-blue-400 rounded p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 transition duration-200 text-center"
                     >
                     <p class="mt-1 text-sm text-red-500 hidden"
                        id="error_card_expiration"
                     >
                        Error en fecha de vencimiento
                     </p>
                  </div>
               </div>

               <div class="flex space-x-4">
                  <div class="mb-4 w-2/3">
                     <label for="cardNumber" class="block">
                        Número de la tarjeta
                     </label>
                     <div class="relative">
                        <input
                           type="text"
                           id="cardNumber"
                           data-checkout="cardNumber"
                           onselectstart="return false"
                           onpaste="return false"
                           oncopy="return false"
                           oncut="return false"
                           ondrag="return false"
                           ondrop="return false"
                           autocomplete=off
                           class="w-2/3 w-full border border-gray-300 outline-none focus:border-blue-400 rounded p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 transition duration-200"
                        >
                        <img
                           id="cardIcon"
                           src="" alt=""
                           class="absolute right-2 top-2"
                        >
                        <p class="mt-1 text-sm text-red-500 hidden"
                           id="error_card_number"
                        >
                           Error en número de tarjeta
                        </p>
                     </div>
                  </div>

                  <div class="mb-4 w-1/3">
                     <label for="securityCode" class="block">
                        Código de seguridad
                     </label>
                     <input
                        type="text"
                        id="securityCode"
                        data-checkout="securityCode"
                        onselectstart="return false"
                        onpaste="return false"
                        oncopy="return false"
                        oncut="return false"
                        ondrag="return false"
                        ondrop="return false"
                        autocomplete=off
                        class="w-full border border-gray-300 outline-none focus:border-blue-400 rounded p-2 focus:ring focus:ring-blue-400 focus:ring-opacity-50 transition duration-200 relative"
                     >
                     <p class="mt-1 text-sm text-red-500 hidden"
                        id="error_security_code"
                     >
                        Error en código de tarjeta
                     </p>
                  </div>
               </div>

               <div class="mb-4">
                  <label for="issuer" class="block">
                     Banco emisor
                  </label>
                  <select
                     id="issuer"
                     name="issuer"
                     data-checkout="issuer"
                     class="w-full border border-gray-300 focus:border-blue-400 rounded p-2 outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-50 transition duration-200"
                  >
                  </select>
                  <p class="mt-1 text-sm text-red-500 hidden"
                     id="error_card_issuer"
                  >
                     Error en banco emisor
                  </p>
               </div>
            </div>

            <div class="mb-8">
               <label for="installments" class="block">
                  Cuotas
               </label>
               <select
                  id="installments"
                  name="installments"
                  data-checkout="installments"
                  class="w-full border border-gray-300 focus:border-blue-400 rounded p-2 outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-50 transition duration-200"
               >
               </select>
               <p class="mt-1 text-sm text-red-500 hidden"
                  id="error_installments"
               >
                  Error en el número de cuotas
               </p>
            </div>

            <input type="hidden" name="transactionAmount" id="transactionAmount" value="{{ $totalAmount }}">
            <input type="hidden" name="paymentMethodId" id="paymentMethodId">
            <input type="hidden" name="description" id="description" value="{{ $description }}">

            <button type="submit" class="block mb-8 mx-auto py-2 px-6 bg-orange-600 hover:bg-orange-500 text-white rounded-lg cursor-pointer transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50">
               Confirmar el pago
            </button>
         </form>

         @if (session()->has('status'))
            <p class="w-80 mb-8 mx-auto py-2 px-6 border border-green-400 rounded bg-green-200 text-green-600">
               {{ session('status') }}
            </p>
         @endif
      </div>
   </main>
@endsection

@push('scripts')
<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js">
</script>
<script>
window.Mercadopago.setPublishableKey('{{ config('app.mp_public_key') }}')
</script>
<script src="{{ asset('js/checkout.js') }}">
</script>
@endpush
