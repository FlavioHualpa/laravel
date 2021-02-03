<div class="w-3/4 mx-auto">
   <div class="flex flex-row justify-between items-center border border-gray-300 bg-gray-100 rounded-lg shadow-lg mt-3 py-4 px-8 space-x-6">
      <div class="flex space-x-3 flex-grow">
         <img src="{{ $product->photo }}"
         alt="{{ $product->name }}"
         class="w-32 rounded"
         >
         <div>
            <p class="text-lg font-bold text-gray-800">
               {{ $product->name }}
            </p>
            <p class="mt-2 text-gray-500">
               {{ $product->code }}
            </p>
            <div class="text-lg text-gray-800">
               {{ $this->price }}
            </div>
         </div>
      </div>
      
      <livewire:update-cart :productId="$product->id" :key="$product->code" />
      
      <div class="text-2xl text-gray-800">
         {{ $this->subTotal }}
      </div>
   </div>
</div>
