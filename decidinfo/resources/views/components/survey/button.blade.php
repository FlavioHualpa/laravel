@props(['href', 'color' => 'blue'])

<a href="{{ $href }}"
   class="py-2 px-4 bg-{{$color}}-800 text-white rounded outline-none hover:bg-{{$color}}-700 focus:ring focus:ring-{{$color}}-300 duration-200"
   {{ $attributes }}
>
   {{ $slot }}
</a>