@if ($paginator->hasPages())
    <nav class="my-4">
        <ul class="pagination flex gap-8 text-xl text-lightgreen font-display">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"></span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="hover:text-[#025239]">&lsaquo; Попередня</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="hover:text-[#025239]">Наступна &rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
