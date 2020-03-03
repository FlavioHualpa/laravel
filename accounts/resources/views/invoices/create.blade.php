@extends('layouts.fnapp')

@push('styles')
<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endpush

@section('navbar')
@include('partials.navbar')
@endsection

@section('content')

<div class="mb-4">
   <span class="bread-crumb">
      <a href="{{ route('home') }}">
         <h4>Inicio</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Facturación</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Emitir Comprobante</h3>
   </div>

   <form action="{{ route('invoices.store') }}" method="post">

      @csrf

      <div class="form-row">
         <div class="col-4">
            <label for="date" class="mb-1">Fecha</label>
            <input type="date" class="form-control form-control-lg font-weight-bold @error('header.date') is-invalid @enderror" id="date" name="header[date]" value="{{ old('header.date', now()->format('Y-m-d')) }}">
            @error('header.date')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-8">
            <label for="customer" class="mb-1">Cliente</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('header.customer_id') is-invalid @enderror" id="customer" name="header[customer_id]">
               @foreach ($customers as $customer)
                  <option value="{{ $customer->id }}" {{ old('header.customer_id') == $customer->id ? 'selected' : '' }}>
                     {{ $customer->code . ' - ' . $customer->name }}
                  </option>
               @endforeach
            </select>
            @error('header.customer_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-3">
         <div class="col-4">
            <label for="invoice_type" class="mb-1">Comprobante</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('header.invoice_type_id') is-invalid @enderror" id="invoice_type" name="header[invoice_type_id]">
            </select>
            @error('header.invoice_type_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-4">
            <label for="transport" class="mb-1">Transporte</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('header.transport_id') is-invalid @enderror" id="transport" name="header[transport_id]">
               @foreach ($transports as $transport)
                  <option value="{{ $transport->id }}" {{ old('header.transport_id') == $transport->id ? 'selected' : '' }}>
                     {{ $transport->name }}
                  </option>
               @endforeach
            </select>
            @error('header.transport_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-4">
            <label for="price_list" class="mb-1">Lista de precios</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('header.price_list_id') is-invalid @enderror" id="price_list" name="header[price_list_id]">
               @foreach ($price_lists as $price_list)
                  <option value="{{ $price_list->id }}" {{ old('header.price_list_id') == $price_list->id ? 'selected' : '' }}>
                     {{ $price_list->name }}
                  </option>
               @endforeach
            </select>
            @error('header.price_list_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      {{-- el campo oculto company_id necesario para crear el comprobante --}}
      <input type="hidden" name="company_id"
         value="{{ session()->get('active_company')->id }}">

      <hr class="my-4">

      <div class="form-row mt-2">
         <div class="col-3">
            <div class="row">
               <div class="col-3 pr-0">
                  #
               </div>
               <div class="col-9 pl-0">
                  Código
               </div>
            </div>
         </div>

         <div class="col-5">
            Descripción
         </div>

         <div class="col-2">
            Cantidad
         </div>

         <div class="col-2">
            Precio
         </div>
      </div>

      <datalist id="codes_list">
      @foreach ($products as $product)
         <option value="{{ $product->code }}"></option>
      @endforeach
      </datalist>

      <section id="item-rows">

      </section>

      <div class="form-row mt-3">
         <div class="col-3">
         </div>

         <div class="col-5">
         </div>

         <div class="col-2">
            Subtotal
         </div>

         <div class="col-2" id="subtotal">
            $ 0,00
         </div>
      </div>

      <div class="form-row mt-1">
         <div class="col-3">
         </div>

         <div class="col-5">
         </div>

         <div class="col-2">
            IVA
         </div>

         <div class="col-2" id="tax">
            $ 0,00
         </div>
      </div>

      <div class="form-row mt-1">
         <div class="col-3">
         </div>

         <div class="col-5">
         </div>

         <div class="col-2 lead font-weight-bold">
            Total
         </div>

         <div class="col-2 lead font-weight-bold" id="total">
            $ 0,00
         </div>
      </div>

      <template id="item-row-template">
         <div class="form-row mt-2">
            <div class="col-3">
               <div class="row">
                  <div class="col-3 pr-0 inv-row-buttons">
                     <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold inv-item-num" value="##">
                     <i class="fas fa-trash-alt inv-item-delete"></i>
                  </div>
                  <div class="col-9 pl-0">
                     <input type="text" class="form-control form-control-lg font-weight-bold @error('prod_code') is-invalid @enderror" id="prod_code" name="prod_code"{{-- value="old('prod_code')"  --}} list="codes_list">
                     @error('prod_code')
                     <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
               </div>
            </div>

            <input type="hidden" id="item_id" name="item[id]">
            
            <div class="col-5">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.description') is-invalid @enderror" id="item_description" name="item[description]"{{-- value="old('item.description')" --}}>
               @error('item.description')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>

            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.quantity') is-invalid @enderror" id="item_quantity" name="item[quantity]"{{-- value="old('item.quantity')" --}}>
               @error('item.quantity')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>

            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.price') is-invalid @enderror" id="item_price" name="item[price]"{{-- value="old('item.price')" --}}>
               @error('item.price')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
         </div>
      </template>

      <div class="form-row mt-5">
         <div class="col">
            <button type="submit" class="btn btn-primary">
               Generar Comprobante
            </button>
            <a href="{{ route('home') }}" class="btn btn-dark">
               Cancelar
            </a>
            <a href="#" class="btn btn-secondary align-self-end" id="add-btn">
               Agregar un producto
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

@push('scripts')
   <script>
      var invoice_type_id = {{ old('header[invoice_type_id]', 'null') }}
   </script>
   <script src="{{ asset('js/invoice.js') }}"></script>
@endpush
