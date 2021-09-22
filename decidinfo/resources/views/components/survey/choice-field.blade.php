@props([
   'arrayName',
   'dotName',
   'label',
   'deleteAction',
   'addBeforeAction',
   'addAfterAction'
])

<i wire:click="{{$deleteAction}}" class="fas fa-times text-gray-600 hover:text-red-500 cursor-pointer duration-200"></i>

<label for="{{ $dotName }}" class="ml-2 text-sm text-gray-600">
   {{ $label }}
</label>

<input
   wire:model.lazy="{{ $dotName }}"
   name="{{ $arrayName }}"
   id="{{ $dotName }}"
   {{ $attributes->merge(["class" => "ml-2 border-b-2 bg-transparent" . ($errors->has($dotName) ? ' border-red-400 ' : ' border-gray-400 focus:border-blue-500 ') . "text-lg outline-none rounded-none duration-200"]) }}
>

<i wire:click="{{$addBeforeAction}}"
   class="far fa-caret-square-up ml-2 text-blue-700 hover:text-blue-500 duration-200 cursor-pointer">
</i>
<i wire:click="{{$addAfterAction}}"
   class="far fa-caret-square-down text-blue-700 hover:text-blue-500 duration-200 cursor-pointer">
</i>

@error($dotName)
   <p class="text-sm text-red-600">
      {{ $message }}
   </p>
@enderror