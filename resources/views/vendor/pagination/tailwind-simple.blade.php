@if ($paginator->hasPages())
    <nav>
        <ul class="pagination flex gap-[1.6rem] text-[1.6rem] text-[#bfba73] font-[Raleway]">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"></span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="py-[0.8rem] px-[1.6rem] hover:text-[#025239]">&lsaquo; Попередня</a>
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
