@extends('layouts.header')

@section('content')
   <main class="h-screen flex flex-col justify-center items-center">
      <div class="bg-white p-12 w-2/3 md:w-1/2 xl:w-1/3 rounded-lg shadow">
         <div class="mb-8">
            <img
               src="{{ asset('img/site/shopping-cart.png') }}"
               alt="Shop"
               class="w-24 mx-auto"
            >
         </div>

         <h1 class="text-2xl font-bold mb-6">
            Todo listo!!
         </h1>

         <h2 class="text-lg text-gray-600 mb-6">
            Pagaste tu compra
         </h2>

         <p class="text-xl font-bold mb-6">
            Detalle de tu pago:
         </p>

         <table class="mb-10">
            <tr>
               <td class="h-4 w-16 font-bold">
                  Id
               </td>
               <td>
                  {{ $purchase->payment_info['id'] }}
               </td>
            </tr>
            <tr>
               <td class="h-4 w-16 font-bold">
                  Tipo de pago
               </td>
               <td>
                  {{ $purchase->payment_info['payment_type_id'] }}
               </td>
            </tr>
            <tr>
               <td class="h-4 w-16 font-bold">
                  Empresa
               </td>
               <td>
                  {{ $purchase->payment_info['payment_method_id'] }}
               </td>
            </tr>
            <tr>
               <td class="h-4 w-16 font-bold">
                  Cuotas
               </td>
               <td>
                  {{ $purchase->payment_info['installments'] }}
               </td>
            </tr>
            <tr>
               <td class="h-4 w-16 font-bold">
                  Importe de la cuota
               </td>
               <td>
                  {{ \App\Helpers\NumberFormatter::currency(
                     $purchase->payment_info['transaction_details']['installment_amount']
                  ) }}
               </td>
            </tr>
            <tr>
               <td class="h-4 w-16 font-bold">
                  Importe total
               </td>
               <td>
                  {{ \App\Helpers\NumberFormatter::currency(
                     $purchase->payment_info['transaction_details']['total_paid_amount']
                  ) }}
               </td>
            </tr>
         </table>

         <a href="{{ route('home') }}" class="py-2 bg-orange-600 hover:bg-orange-500 text-white rounded-lg cursor-pointer transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50">
            Seguir comprando
         </a>

      </div>
   </main>
@endsection
