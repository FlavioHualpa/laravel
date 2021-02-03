   <section class="container mx-auto p-6">
      <h1 class="text-4xl text-green-700 font-bold mb-6">
         Nuestros productos
      </h1>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">
         @foreach ($products as $product)
            <x-product :product="$product" />
         @endforeach
      </div>
   </section>