<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>
      {{ $invoice->invoice_type->name }} - Nro {{ $invoice->number }}
   </title>
   <link rel="stylesheet" href="{{ asset('css/invoice.css') }}">
</head>
<body>
   <div class="container">
      <section class="header">
         <div class="header-left">
            <h1>{{ $invoice->company->name }}</h1>
            <h4>{{ $invoice->company->full_address }}</h4>
            <h5 class="mt-2">CUIT {{ $invoice->company->fiscal_id }}</h5>
         </div>

         <div class="header-center">
            <h1 class="invoice-letter">{{ $invoice->invoice_type->letter }}</h1>
            <p class="invoice-type">{{ $invoice->invoice_type->name }}</p>
         </div>

         <div class="header-right">
            <h2>{{ 'Nº ' . sprintf('%08d', $invoice->number) }}</h2>
            <h4 class="mt-2">
               {{ 'Buenos Aires, ' . app('fmt_date', [ 'value' => $invoice->created_at ]) }}
            </h4>
         </div>
      </section>

      <section class="customer">
         <div class="customer-left">
            <h4>Señores</h4>
            <h3 class="mt-1">{{ $invoice->customer->name }}</h3>
            <h4 class="mt-1">{{ $invoice->customer->full_address }}</h4>
         </div>

         <div class="customer-right">
            <h4>Código: {{ $invoice->customer->code }}</h4>
            <h4 class="mt-4">CUIT: {{ $invoice->customer->fiscal_id }}</h4>
         </div>
      </section>

      <section class="transport">
         <div class="transport-left">
            <h4>
               Transporte
               {{ $invoice->transport->name }}
               &nbsp;&nbsp;-&nbsp;&nbsp;
               {{ $invoice->transport->full_address }}
            </h4>
         </div>
      </section>
   
      <section class="items">
         <table class="items-table">
            <thead>
               <tr class="items-header-row">
                  <th class="items-col-1">#</th>
                  <th class="items-col-2">Código</th>
                  <th class="items-col-3">Descripción</th>
                  <th class="items-col-4">Precio</th>
                  <th class="items-col-5">Cantidad</th>
                  <th class="items-col-6">Subtotal</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($invoice->products as $product)
               <tr class="items-row">
                  <td class="items-col-1">
                     {{ $loop->iteration }}
                  </td>
                  <td class="items-col-2">
                     {{ $product->code }}
                  </td>
                  <td class="items-col-3">
                     {{ $product->item->description }}
                  </td>
                  <td class="items-col-4">
                     {{ LocalFormat::currency($product->item->price) }}
                  </td>
                  <td class="items-col-5">
                     {{ LocalFormat::float($product->item->quantity) }}
                  </td>
                  <td class="items-col-6">
                     {{ LocalFormat::currency($product->item->price * $product->item->quantity) }}
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </section>

      <section class="totals">
         <div class="totals-right">
            <div class="totals-slot">
               <p class="slot-caption">
                  NETO
               </p>
               <p class="slot-amount">
                  {{ LocalFormat::currency($invoice->final_amount()) }}
               </p>
            </div>
            <div class="totals-slot">
               <p class="slot-caption">
                  IVA {{ $invoice->customer->condition->final_tax * 100.0 }}%
               </p>
               <p class="slot-amount">
                  {{ LocalFormat::currency($invoice->final_tax()) }}
               </p>
            </div>
            <div class="totals-slot">
               <p class="slot-caption">
                  TOTAL
               </p>
               <p class="slot-amount">
                  {{ LocalFormat::currency($invoice->final_amount_with_tax()) }}
               </p>
            </div>
         </div>
      </section>
   </div>

   {{-- LocalFormat::date($invoice->created_at) --}}
</body>
</html>