@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-[1.6rem] py-[1.6rem] text-[1.6rem] text-[#BFBA73] font-medium border">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-[1.6rem] py-[1.6rem] text-[1.6rem] font-medium text-[#bfba73] border border-[#bfba73] hover:text-[#025239] focus:border-[#025239] active:text-[#025239] transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-[1.6rem] py-[1.6rem] ml-3 text-[1.6rem] font-medium text-[#bfba73] border border-[#bfba73] hover:text-[#025239] focus:border-[#025239] active:text-[#025239] transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-[1.6rem] py-[1.6rem] ml-3 text-[1.6rem] font-[Jura] font-medium text-[#bfba73] border border-[#bfba73]">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div class="mr-[1.6rem]">
                <p class="text-[1.6rem] text-[#BFBA73] font-[Jura] font-light">
                    {!! __('Відображено') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('-') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('з') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('публікацій(-ї)') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rtl:flex-row-reverse">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-[1.6rem] py-[1.6rem] text-[1.6rem] font-medium text-[#BFBA73] border border-[#BFBA73] cursor-pointer" aria-hidden="true">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-[1.6rem] py-[1.6rem] text-[1.6rem] font-medium text-[#BFBA73] border border-[#bfba73] hover:text-[#025239] hover:border-[#025239] focus:z-10 focus:outline-none focus:border-[#025239] active:text-[#025239] transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-[1.6rem] py-[1.6rem] text-[1.6rem] font-medium text-[#bfba73] border border-[#bfba73] cursor-default">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex mx-[1.6rem] items-center px-[1.6rem] py-[1.6rem] text-[1.6rem] font-medium text-[#BFBA73] border border-[#BFBA73]">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex mx-[1.6rem] items-center px-[1.6rem] py-[1.6rem] text-[1.6rem] font-medium text-[#BFBA73] border border-[#bfba73] hover:text-[#025239] hover:border-[#025239] focus:border-[#025239] active:text-[#025239] transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-[1.6rem] text-[1.6rem] font-medium text-[#bfba73] border border-[#bfba73] hover:text-[#025239] hover:border-[#025239]  focus:border-[#bfba73] active:bg-[#bfba73] active:text-[#025239] transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-[1.6rem] py-[1.6rem] text-[1.6rem] font-medium text-[#bfba73] border border-[#bfba73]" aria-hidden="true">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
