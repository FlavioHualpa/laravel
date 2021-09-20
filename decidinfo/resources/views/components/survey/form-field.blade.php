@props(['arrayName', 'dotName', 'label'])

<label for="{{ $dotName }}" class="text-sm block">
   {{ $label }}
</label>

<input
   wire:model.lazy="{{ $dotName }}"
   name="{{ $arrayName }}"
   id="{{ $dotName }}"
   {{ $attributes->merge(["class" => "mt-1 py-1 px-2 w-full border" . ($errors->has($dotName) ? ' border-red-400 ' : ' border-gray-200 ') . "rounded text-lg outline-none focus:ring focus:ring-yellow-200 duration-200"]) }}
>

@error($dotName)
   <p class="text-sm text-red-600">
      {{ $message }}
   </p>
@enderror