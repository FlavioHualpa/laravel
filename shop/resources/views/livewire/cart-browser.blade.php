@forelse ($cart->products as $product)

   <div>
   <livewire:cart-item :product="$product" :key="'item-code:'.$product->code" />
   </div>

   </div>
   @if ($loop->last)
      <div class="w-3/4 mx-auto text-right">
         <p class="inline-block text-2xl text-gray-800 border border-gray-300 bg-gray-100 rounded-lg shadow-lg mt-3 py-4 px-8">
            Total:
            {{ \App\Helpers\NumberFormatter::currency($total) }}
         </p>
      </div>
      <div class="w-3/4 mt-6 mx-auto flex justify-between">
         <a href="{{ route('home') }}" class="py-2 px-6 bg-orange-600 hover:bg-orange-500 text-white rounded-lg cursor-pointer transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50">
            Seguir comprando
         </a>
         <a href="{{ route('checkout') }}" class="py-2 px-6 bg-green-600 hover:bg-green-500 text-white rounded-lg cursor-pointer transition duration-200 focus:outline-none focus:ring focus:ring-green-500 focus:ring-opacity-50">
            Pagar
         </a>
      </div>
   @endif
   </div>

@empty

   <div class="flex flex-col justify-center items-center border border-gray-300 bg-gray-100 rounded-lg shadow-lg py-12 space-y-6">
      <img src="{{ asset('img/site/shopping-cart.png') }}"
      alt="Shop"
      class="w-32 h-32"
      >
      <h1 class="text-3xl text-gray-700 font-bold">
         Tu carrito está vacío :(
      </h1>
      <h3 class="text-lg text-gray-500 -font-bold">
         Continúa mirando nuestros productos y cuando hayas llenado
         <br>
         tu carrito regresa aquí para realizar la compra
         <span class="text-3xl">👍</span>
      </h3>
      <a href="{{ route('home') }}"
      alt="Shop"
      class="text-orange-600 hover:text-orange-500 transition duration-200"
      >
         Ir a la página de productos
      </a>
   </div>

@endforelse
