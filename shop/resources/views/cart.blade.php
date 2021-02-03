@extends('layouts.header')

@section('content')

   <section class="container mx-auto p-6">
      <h1 class="text-4xl text-green-700 font-bold mb-6">
         Carrito de compras
      </h1>

      <livewire:cart-browser :cart="$cart" />

   </section>

@endsection