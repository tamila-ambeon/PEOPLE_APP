<div class="pagination-outer">
    @if ($paginator->hasPages())
 
            @if ($paginator->onFirstPage())
                <span class="pagi-btn pagi-disabled">&larr;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pagi-btn pagi-prev">&larr;</a>
            @endif

            @foreach ($elements as $element)

                @if (is_string($element))
                    <span class="pagi-btn pagi-disabled">{{ $element }}</span>
                @endif



                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="pagi-btn pagi-current">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="pagi-btn pagi-link">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach



            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pagi-btn pagi-next">&rarr;</a>
            @else
                <span class="pagi-btn pagi-disabled">&rarr;</span>
            @endif

    @endif
</div>
