@props(['page', 'section'])

   @switch($page)

      @case('main')
         <h1 class="text-3xl italic mb-6">
            Principal
         </h1>
         @break

      @case('section')
         <h1 class="text-3xl italic mb-6">
            Sección {{ $section }}
         </h1>
         @break

      @default
   
   @endswitch
