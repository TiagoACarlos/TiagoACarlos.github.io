@if ($paginator->hasPages())
    <div class="flex items-end my-4">
        
        @if ( ! $paginator->onFirstPage())
            {{-- First Page Link --}}
            <a
            class="pgEnd mx-1 px-4 py-2 cor_1_background border-2 font-semibold text-center opacity-80 hover:opacity-100 rounded-lg  cursor-pointer"
            wire:click="gotoPage(1)"
            >
            <i class="fa-solid fa-angles-left"></i>
            </a>
            @if($paginator->currentPage() > 2)
            {{-- Previous Page Link --}}
            <a
                class="pgEnd mx-1 px-4 py-2 cor_1_background border-2 font-semibold text-center opacity-80 hover:opacity-100 rounded-lg  cursor-pointer"
                wire:click="previousPage"
            >
            <i class="fa-solid fa-angle-left"></i>
            </a>
            @endif
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <!--  Use three dots when current page is greater than 3.  -->
                    {{-- @if ($paginator->currentPage() > 3 && $page === 2)
                        <div class="text-blue-800 mx-1">
                            <span class="font-semibold">.</span>
                            <span class="font-semibold">.</span>
                            <span class="font-semibold">.</span>
                        </div>
                    @endif --}}

                    <!--  Show active page two pages before and after it.  -->
                    @if ($page == $paginator->currentPage())
                        <span class="pgAtual mx-1 px-4 py-2 border-2 font-semibold text-center rounded-lg  cursor-pointer">{{ $page }}</span>
                    @elseif (   $page === $paginator->currentPage() + 1 
                            || $page === $paginator->currentPage() + 2 
                            || $page === $paginator->currentPage() - 1 
                            || $page === $paginator->currentPage() - 2)
                        <a class="pgNext mx-1 px-4 py-2 border-2font-semibold text-center rounded-lg  cursor-pointer" wire:click="gotoPage({{$page}})">{{ $page }}</a>
                    @endif

                    <!--  Use three dots when current page is away from end.  -->
                    {{-- @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                        <div class="text-blue-800 mx-1">
                            <span class="font-semibold">.</span>
                            <span class="font-semibold">.</span>
                            <span class="font-semibold">.</span>
                        </div>
                    @endif --}}
                @endforeach
            @endif
        @endforeach
        
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            @if($paginator->lastPage() - $paginator->currentPage() >= 2)
                <a class="pgEnd mx-1 px-4 py-2 cor_1_background border-2 font-semibold text-center opacity-80 hover:opacity-100 rounded-lg  cursor-pointer"
                wire:click="nextPage"
                rel="next">
                <i class="fa-solid fa-angle-right"></i>
                </a>
            @endif
            <a
                class="pgEnd mx-1 px-4 py-2 cor_1_background border-2 font-semibold text-center opacity-80 hover:opacity-100 rounded-lg  cursor-pointer"
                wire:click="gotoPage({{ $paginator->lastPage() }})"
            >
            <i class="fa-solid fa-angles-right"></i>
            </a>
        @endif
    </div>
@endif