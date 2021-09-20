@props(['highlight', 'caption'])

<div class="p-2 border border-gray-300 rounded text-center">
   <p class="text-3xl text-yellow-700">
      {{ $highlight }}
   </p>
   <p class="text-xs text-gray-700">
      {{ $caption }}
   </p>
</div>