@props(['color' => 'yellow'])

<article class="mb-2 py-3 px-6 max-w-2xl bg-{{$color}}-100 border-t border-r border-b border-l-4 border-{{$color}}-400 rounded relative">
   {{ $slot }}
</article>