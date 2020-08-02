@if ($paginator->hasPages())
    <nav class="pagination-wrap">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="prev page-number" aria-hidden="true">
                       <i class="fa fa-long-arrow-left"></i>
                    </span>
                </li>
            @else
                <li>
                    <a class="prev page-number" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                       <i class="fa fa-long-arrow-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true">
                       <span class="page-number">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                           <li aria-current="page">
                              <span class="page-number current">
                                 {{ $page }}
                              </span>
                           </li>
                        @else
                           <li>
                              <a class="page-number" href="{{ $url }}">
                                 {{ $page }}
                              </a>
                           </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
               <li>
                  <a class="next page-number" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                     <i class="fa fa-long-arrow-right"></i>
                  </a>
               </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-number" aria-hidden="true">
                       <i class="fa fa-long-arrow-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
