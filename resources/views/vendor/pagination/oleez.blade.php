@if ($paginator->hasPages())
    <nav class="oleez-pagination wow fadeInUp">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                    <a class="next" aria-hidden="true">&larr;</a>
            @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="next" rel="prev" aria-label="@lang('pagination.previous')">&larr;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a>{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="next" rel="next" aria-label="@lang('pagination.next')">&rarr;</a>
            @else
                    <a class="next" aria-hidden="true">&rarr;</a>
            @endif
    </nav>
@endif
