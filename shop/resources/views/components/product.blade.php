@props(['product'])

         <article class="bg-gray-100 rounded-lg shadow">
            <img src="{{ $product->photo }}"
               alt="product"
               class="w-full rounded-lg"
            >
            <div class="p-4">
               <div class="h-48">
                  <h3 class="mb-2 text-lg text-center font-bold">
                     {{ $product->name }}
                  </h3>
                  <p class="text-gray-600">
                     Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis vitae aspernatur iusto?
                  </p>
               </div>
               <div class="flex justify-between">
                  <p class="mt-4 text-2xl font-bold">
                     {{ \App\Helpers\NumberFormatter::currency($product->price) }}
                  </p>
                  <livewire:update-cart :productId="$product->id" :key="$product->code" />
                  {{-- <div class="flex items-start">
                     <div>
                        <p class="px-3 text-2xl font-bold rounded-lg cursor-pointer hover:bg-orange-100 transition duration-200">+</p>
                        <p class="px-3 text-2xl font-bold rounded-lg cursor-pointer hover:bg-orange-100 transition duration-200">-</p>
                     </div>

                     @php($user = auth()->user())

                     <p class="py-4 px-4 text-lg rounded border border-gray-200">
                        {{ $user->cart?->item($product->id)?->quantity ?? '0' }}
                     </p>
                  </div> --}}
               </div>
            </div>
         </article>
