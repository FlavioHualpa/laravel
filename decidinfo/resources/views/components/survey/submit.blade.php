@props(['color' => 'blue'])

<button
   type="submit"
   {{ $attributes->merge([ "class" => "py-2 px-4 bg-" . $color . "-800 text-white rounded outline-none hover:bg-" . $color . "-700 focus:ring focus:ring-" . $color . "-300 duration-200" ]) }}
>
   {{ $slot }}
</button>