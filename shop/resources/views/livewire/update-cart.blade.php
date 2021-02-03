<div class="flex items-start">
    <div>
        <p wire:click='addProduct' class="px-3 text-2xl font-bold rounded-lg cursor-pointer hover:bg-orange-100 transition duration-200">+</p>

        <p wire:click='substractProduct' class="px-3 text-2xl font-bold rounded-lg cursor-pointer hover:bg-orange-100 transition duration-200">-</p>
    </div>

    <p class="py-4 px-4 text-lg rounded border border-gray-200">
        {{ $qtyInCart }}
    </p>
</div>
