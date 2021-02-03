<div class="relative">
    <a href="{{ route('cart.browse') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 24 24" stroke="#006000">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <div class="absolute -top-2 left-4 px-2 rounded-full bg-green-100 bg-opacity-90 text-green-700">
            {{ $itemsCount }}
        </div>
    </a>
</div>
