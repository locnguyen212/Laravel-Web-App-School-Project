@if ($paginator->hasPages())
    <div class="col-12 mt-4 pt-2">
        <ul class="pagination justify-content-center mb-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><a class="page-link" aria-label="Previous"><i class="mdi mdi-arrow-left"></i> Prev</a></li>
            @else
                <li class="page-item"><a class="page-link" href="javascript:;" wire:click="previousPage" aria-label="Previous"><i class="mdi mdi-arrow-left"></i> Prev</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><a href="javascript:;" wire:click="gotoPage({{$page}})" class="page-link"><span>{{ $page }}</span></a></li>
                        @else
                            <li class="page-item"><a class="page-link" wire:click="gotoPage({{$page}})" href="javascript:;">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="javascript:;" wire:click="nextPage" aria-label="Next">Next <i class="mdi mdi-arrow-right"></i></a></li>
            @else
                <li class="page-item disabled"><a class="page-link" aria-label="Next">Next <i class="mdi mdi-arrow-right"></i></a></li>
            @endif
        </ul>
    </div>
@endif
